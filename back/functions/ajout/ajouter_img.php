<?php
	session_start();
	require_once('../../db/pdo.php');

	//Récuperation infos image
	$idClient =$_POST['idClient'];

	// Vérification de l'envoi du formulaire (paramètres : présence et non vide)
	if (isset($_POST['title'])
		&& !empty($_POST['title'])
		&& file_exists($_FILES['photo']['tmp_name'])
		&& !empty($_FILES['photo'])) {

		$img_taille = 0;
		$img_taille = $_FILES['photo']['size'];
		$taille_max = 250000;


		// Utilisation de trim(), donc de $post par la suite
		$post = array_map('trim', array_map('strip_tags', $_POST));

		if ($_FILES['photo']['error'] === 0) {
			//pas d'erreur et le fichier n'est pas trop volumineux

			$extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF');
			$fileInfo = pathinfo($_FILES['photo']['name']);
			$extension = $fileInfo['extension'];
			if (in_array($extension, $extensions_autorisees)) {

				if ($extension == 'jpg' or $extension == 'jpeg' or $extension == 'JPEG' or $extension == 'JPG') {
					$newImage = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
				} elseif ($extension == 'png' or $extension == 'PNG') {
					$newImage = imagecreatefrompng($_FILES['photo']['tmp_name']);
				} else {
					$newImage = imagecreatefromgif($_FILES['photo']['tmp_name']);
				}

				$imageWidthFin = imagesx($newImage);
				$imageHeightFin = imagesy($newImage);
				$newWidthFin = 1200;
				$newHeightFin = ($imageHeightFin * $newWidthFin) / $imageWidthFin;
				$imageFinale = imagecreatetruecolor($newWidthFin, $newHeightFin);

				imagecopyresampled($imageFinale, $newImage, 0, 0, 0, 0, $newWidthFin, $newHeightFin, $imageWidthFin, $imageHeightFin);

				$imageWidth = imagesx($newImage);
				$imageHeight = imagesy($newImage);
				$newWidth = 300;
				$newHeight = ($imageHeight * $newWidth) / $imageWidth;
				$miniature = imagecreatetruecolor($newWidth, $newHeight);

				imagecopyresampled($miniature, $newImage, 0, 0, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);

				$nom = $post['title'].'.'.$extension;
				var_dump($nom);
				if ($extension == 'jpg' or $extension == 'jpeg') {
					imagejpeg($miniature, '../../../img/min/' .$nom);
					imagejpeg($imageFinale, '../../../img/' .$nom);
				} elseif ($extension == 'png') {
					imagepng($miniature, '../../../img/min/' .$nom);
					imagepng($imageFinale, '../../../img/' .$nom);
				} else {
					imagegif($miniature, '../../../img/min/' .$nom);
					imagegif($imageFinale, '../../../img/' .$nom);
				}

				move_uploaded_file($_FILES['photo']['tmp_name'], '../../../img/real/' .$nom);


				$reponse = connect()->prepare('INSERT INTO cr_images (img_nom,img_taille, img_id_client) VALUES (:nom, :taille, :id)');
				$reponse->bindValue(':nom', $nom, PDO::PARAM_STR);
				$reponse->bindValue(':taille', $img_taille, PDO::PARAM_STR);
				$reponse->bindValue(':id', $idClient, PDO::PARAM_STR);
				$reponse->execute();

				$stmt = connect()->query("SELECT LAST_INSERT_ID(img_id) FROM cr_images ORDER BY img_id DESC");
				$imgId = $stmt->fetchColumn();

				$sql = connect()->prepare("INSERT INTO cr_central(central_id_img,central_id_client) VALUES (:imgId,:clientId)");
				$sql->bindParam(':imgId', $imgId);
				$sql->bindParam(':clientId', $idClient);
				$sql->execute();

				$_SESSION['successAjoutImg'] = "Photo ajoutée";
				header("Location: ../../../front/public/details.php?idClient=$idClient");


			} else {//problème:
				if ($_FILES['photo']['error'] > 0) {
					$_SESSION['failImg1'] = "Erreur de transfert de fichier";
					header("Location: ../../../front/public/details.php?idClient=$idClient");
				} else {
					$_SESSION['failImg2'] = "Fichier trop volumineux";
					header("Location: ../../../front/public/details.php?idClient=$idClient");
				}
				$_SESSION['failImg2'] = "Un problème est survenu";
				header("Location: ../../../front/public/details.php?idClient=$idClient");
			}
		} else {
			$_SESSION['failImg3'] = "Extension de fichier non valide";
			header("Location: ../../../front/public/details.php?idClient=$idClient");
		}

	} // Dans le cas où un paramètre n'est pas indiqué
	else {
		if (!empty($_POST)) {
			if (empty($_POST['title']) or !file_exists($_FILES['photo']['tmp_name'])) {
				$_SESSION['emptyPost'] = "Vous devez renseigner au moins un titre, un contenu et une photo";

				header("Location: ../../../front/public/details.php?idClient=$idClient");
				require_once ('../../../front/components/footer.php');
				require_once('../../db/close.php');
			}
		}
	}




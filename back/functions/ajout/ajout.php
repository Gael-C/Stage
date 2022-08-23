<?php
	session_start();
	
	use function back\db\connect;

	//Récuperation infos clients
	$nom = htmlspecialchars($_POST['nom']);
	$adr = htmlspecialchars($_POST['adresse']);
	$tel = htmlspecialchars($_POST['telephone']);
	$mail = htmlspecialchars($_POST['mail']);
	$ent = htmlspecialchars($_POST['entreprise']);

	//Récuperation infos entreprise
	$ent_nom = htmlspecialchars($_POST['ent_nom']);
	$ent_adr = htmlspecialchars($_POST['ent_adresse']);
	$ent_tel = htmlspecialchars($_POST['ent_tel']);
	$ent_mail = htmlspecialchars($_POST['ent_mail']);
	$siret = htmlspecialchars($_POST['siret']);
	$null = 'NULL';

	//Récuperation infos connexion
	$cnx_nom = htmlspecialchars($_POST['cnx_nom']);
	$cnx_log = htmlspecialchars($_POST['cnx_log']);
	$cnx_mdp = htmlspecialchars($_POST['cnx_mdp']);
	$cnx_cle = htmlspecialchars($_POST['cnx_cle']);
	$cnx_date_p = htmlspecialchars($_POST['cnx_date_produit']);
	$cnx_tel_ic = htmlspecialchars($_POST['cnx_tel_sec_icloud']);
	$cnx_mail_ic = htmlspecialchars($_POST['cnx_mail_sec_icloud']);
	$cnx_date_ic = htmlspecialchars($_POST['cnx_date_sec_icloud']);


	//Récuperation infos matériel
	$mat_nom = htmlspecialchars($_POST['mat_nom']);
	$modele = htmlspecialchars($_POST['modele']);
	$infos = htmlspecialchars($_POST['infos']);
	$ip = htmlspecialchars($_POST['ip']);
	$iemc = htmlspecialchars($_POST['iemc']);
	$s_n = htmlspecialchars($_POST['s/n']);
	$admin = htmlspecialchars($_POST['admin']);



	//On teste si le client qu'on essaie d'ajouter existe déjà avec la fonction
	$sql = connect()->prepare('SELECT * FROM CR_Clients WHERE client_mail= :mail');
	$sql->bindParam(':mail', $mail);
	$sql->execute();
	$result = $sql->fetch(PDO::FETCH_ASSOC);


	if ($result['mail'] != $mail) {
		$reqClient = connect()->prepare("INSERT INTO CR_Clients(client_nom, client_adresse, client_telephone , client_mail, ent_nom, siret, ent_adresse, ent_mail, ent_tel) VALUE (:nom, :adr, :tel, :mail, :ent_nom,:siret, :ent_adr,:ent_mail,:ent_tel)");
		$reqClient->bindParam(':nom', $nom);
		$reqClient->bindParam(':adr', $adr);
		$reqClient->bindParam(':mail', $mail);
		$reqClient->bindParam(':tel', $tel);
		$reqClient->bindParam(':ent_nom', $ent_nom);
		$reqClient->bindParam(':siret', $siret);
		$reqClient->bindParam(':ent_adr', $ent_adr);
		$reqClient->bindParam(':ent_mail', $ent_mail);
		$reqClient->bindParam(':ent_tel', $ent_tel);
		$reqClient->execute();

		//On récupère le dernier id inséré.
		$stmt = connect()->query("SELECT LAST_INSERT_ID(client_id) FROM CR_Clients ORDER BY client_id DESC");
		$clientId = $stmt->fetchColumn();


		if (!empty($cnx_nom)) {
			$reqCnx = connect()->prepare('INSERT INTO cr_connexion (cnx_nom, login, mdp, cle_produit, date_nais_produit, tel_sec_icloud, mail_sec_icloud, date_nais_icloud, cnx_id_client) VALUES (:nom, :login, :mdp, :cle_p, :date_p, :tel_ic, :mail_ic, :date_ic, :client_id)');
			$reqCnx->bindParam(':nom', $cnx_nom);
			$reqCnx->bindParam(':login', $cnx_log);
			$reqCnx->bindParam(':mdp', $cnx_mdp);
			$reqCnx->bindParam(':cle_p', $cnx_cle);
			$reqCnx->bindParam(':date_p', $cnx_date_p);
			$reqCnx->bindParam(':tel_ic', $cnx_tel_ic);
			$reqCnx->bindParam(':mail_ic', $cnx_mail_ic);
			$reqCnx->bindParam(':date_ic', $cnx_date_ic);
			$reqCnx->bindParam(':client_id', $clientId);
			$reqCnx->execute();

			$reqCnx->debugDumpParams();

			$stmt = connect()->query("SELECT LAST_INSERT_ID(cnx_id) FROM cr_connexion ORDER BY cnx_id DESC");
			$cnxId = $stmt->fetchColumn();
		}


		if (!empty($mat_nom)) {
			$reqMat = connect()->prepare('INSERT INTO cr_materiel(mat_nom, modele, infos, ip, iemc, `s/n`, admin, mat_id_client) VALUES (:mat_nom, :modele, :infos, :ip, :iemc, :s_n, :admin, :client_id)');
			$reqMat->bindParam(':mat_nom', $mat_nom);
			$reqMat->bindParam(':modele', $modele);
			$reqMat->bindParam(':infos', $infos);
			$reqMat->bindParam(':ip', $ip);
			$reqMat->bindParam(':iemc', $iemc);
			$reqMat->bindParam(':s_n', $s_n);
			$reqMat->bindParam(':admin', $admin);
			$reqMat->bindParam(':client_id', $clientId);
			$reqMat->execute();

			$stmt = connect()->query("SELECT LAST_INSERT_ID(mat_id) FROM cr_materiel ORDER BY mat_id DESC");
			$matId = $stmt->fetchColumn();
		}
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

						$nom = $post['title'] . '.' . $extension;
						var_dump($nom);
						if ($extension == 'jpg' or $extension == 'jpeg') {
							imagejpeg($miniature, '../../../img/min/' . $nom);
							imagejpeg($imageFinale, '../../../img/' . $nom);
						} elseif ($extension == 'png') {
							imagepng($miniature, '../../../img/min/' . $nom);
							imagepng($imageFinale, '../../../img/' . $nom);
						} else {
							imagegif($miniature, '../../../img/min/' . $nom);
							imagegif($imageFinale, '../../../img/' . $nom);
						}

						move_uploaded_file($_FILES['photo']['tmp_name'], '../../../img/real/' . $nom);


						$reponse = connect()->prepare('INSERT INTO cr_images (img_nom,img_taille, img_id_client) VALUES (:nom, :taille, :id)');
						$reponse->bindValue(':nom', $nom, PDO::PARAM_STR);
						$reponse->bindValue(':taille', $img_taille, PDO::PARAM_STR);
						$reponse->bindValue(':id', $clientId, PDO::PARAM_STR);
						$reponse->execute();

						$reponse->debugDumpParams();
						$stmt = connect()->query("SELECT LAST_INSERT_ID(img_id) FROM cr_images ORDER BY img_id DESC");
						$imageId = $stmt->fetchColumn();

					}


				}
			}
		}


		if (!empty($cnxId)) {
			$sql = connect()->prepare("INSERT INTO cr_central(central_id_cnx,central_id_client) VALUES (:cnxId,:clientId)");
			$sql->bindParam(':cnxId', $cnxId);
			$sql->bindParam(':clientId', $clientId);
			$sql->execute();
		}

		if (!empty($matId)) {
			$sql = connect()->prepare("INSERT INTO cr_central(central_id_mat,central_id_client) VALUES (:matId,:clientId)");
			$sql->bindParam(':matId', $matId);
			$sql->bindParam(':clientId', $clientId);
			$sql->execute();
		}

		if (!empty($imageId)) {
			$reqimg = connect()->prepare("INSERT INTO cr_central(central_id_img,central_id_client) VALUES (:imgId,:clientId)");
			$reqimg->bindParam(':imgId', $imageId);
			$reqimg->bindParam(':clientId', $clientId);
			$reqimg->execute();


		$_SESSION['successClient'] = "Client créé";
		header("Location: ../../../front/public/details.php?idClient=$clientId");
	} else {

		$_SESSION['failClient'] = "Échec création client";
		header("Location: ../../../front/public/home.php");


	}

	require_once('../../db/close.php');




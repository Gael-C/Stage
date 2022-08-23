<?php
	use function back\db\connect;


	//On empêche une attaque XSS
	$nom = htmlspecialchars($_POST['nom']);
	$adr = htmlspecialchars($_POST['adresse']);
	$tel = htmlspecialchars($_POST['telephone']);
	$mail = htmlspecialchars($_POST['mail']);
	$ent_nom = htmlspecialchars($_POST['ent_nom']);
	$ent_adresse = htmlspecialchars($_POST['ent_adresse']);
	$ent_mail = htmlspecialchars($_POST['ent_mail']);
	$ent_tel = htmlspecialchars($_POST['ent_tel']);
	$siret = htmlspecialchars($_POST['siret']);
	$idClient = htmlspecialchars($_POST['id']);

	if(empty($_POST['nom'])) {
		$_SESSION['failModifClient'] = "Échec modification client";
		header("Location: ../../../front/public/details.php?idClient=$idClient");
	} else {

		$req = connect()->prepare("UPDATE `CR_Clients` SET `client_nom` =:nom, `client_adresse` =:adresse, `client_telephone` =:telephone, `client_mail` =:mail, `ent_nom`=:ent_nom, `ent_adresse`=:ent_adr, `ent_tel`=:ent_tel,`ent_mail`=:ent_mail, `siret`=:siret WHERE `client_id` = :id");
		$req->bindParam(':nom', $nom);
		$req->bindParam(':adresse', $adr);
		$req->bindParam(':telephone', $tel);
		$req->bindParam(':mail', $mail);
		$req->bindParam(':ent_nom', $ent_nom);
		$req->bindParam(':ent_adr', $ent_adresse);
		$req->bindParam(':ent_mail', $ent_mail);
		$req->bindParam(':ent_tel', $ent_tel);
		$req->bindParam(':siret', $siret);
		$req->bindParam(':id', $idClient);
		$req->execute();

		$_SESSION['successModifClient'] = "Modification client effectuée";
		header("Location: ../../../front/public/details.php?idClient=$idClient");
	}
	require_once('../../db/close.php');








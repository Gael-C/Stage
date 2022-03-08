<?php
	session_start();
	require_once('../../db/pdo.php');

		//Récuperation infos connexion
		$idClient =$_POST['idClient'];
		$cnx_nom = htmlspecialchars($_POST['cnx_nom']);
		$cnx_log = htmlspecialchars($_POST['cnx_log']);
		$cnx_mdp = htmlspecialchars($_POST['cnx_mdp']);
		$cnx_cle = htmlspecialchars($_POST['cnx_cle']);
		$cnx_date_p = htmlspecialchars($_POST['cnx_date_produit']);
		$cnx_tel_ic = htmlspecialchars($_POST['cnx_tel_sec_icloud']);
		$cnx_mail_ic = htmlspecialchars($_POST['cnx_mail_sec_icloud']);
		$cnx_date_ic = htmlspecialchars($_POST['cnx_date_sec_icloud']);

	if (isset($cnx_nom)) {
		//Insertion en BDD
		$reqCnx = connect()->prepare('INSERT INTO cr_connexion (cnx_nom, login, mdp, cle_produit, date_nais_produit, tel_sec_icloud, mail_sec_icloud, date_nais_icloud, cnx_id_client) VALUES (:nom, :login, :mdp, :cle_p, :date_p, :tel_ic, :mail_ic, :date_ic, :client_id)');
		$reqCnx->bindParam(':nom', $cnx_nom);
		$reqCnx->bindParam(':login', $cnx_log);
		$reqCnx->bindParam(':mdp', $cnx_mdp);
		$reqCnx->bindParam(':cle_p', $cnx_cle);
		$reqCnx->bindParam(':date_p', $cnx_date_p);
		$reqCnx->bindParam(':tel_ic', $cnx_tel_ic);
		$reqCnx->bindParam(':mail_ic', $cnx_mail_ic);
		$reqCnx->bindParam(':date_ic', $cnx_date_ic);
		$reqCnx->bindParam(':client_id', $idClient);
		$reqCnx->execute();

		//On récupère l'ID de la cnx
		$stmt = connect()->query("SELECT LAST_INSERT_ID(cnx_id) FROM cr_connexion ORDER BY cnx_id DESC");
		$cnxId = $stmt->fetchColumn();

		//Insertion dans la table cr_central
		$sql = connect()->prepare("INSERT INTO cr_central(central_id_cnx,central_id_client) VALUES (:cnxId,:clientId)");
		$sql->bindParam(':cnxId', $cnxId);
		$sql->bindParam(':clientId', $idClient);
		$sql->execute();

	$_SESSION['successAjoutCnx'] = "Nouvelle connexion créée";
	header("Location: ../../../front/public/details.php?idClient=$idClient");
	} else {

	$_SESSION['failAjoutCnx'] = "Échec création connexion";
	header("Location: ../../../front/public/details.php?idClient=$idClient");
	}



	require_once('../../db/close.php');

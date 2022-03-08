<?php
	session_start();
	require_once('../../db/pdo.php');

	//Récuperation infos matériel
	$idClient =$_POST['idClient'];
	$mat_nom = htmlspecialchars($_POST['mat_nom']);
	$modele = htmlspecialchars($_POST['modele']);
	$infos = htmlspecialchars($_POST['infos']);
	$ip = htmlspecialchars($_POST['ip']);
	$iemc = htmlspecialchars($_POST['iemc']);
	$s_n = htmlspecialchars($_POST['s/n']);
	$admin = htmlspecialchars($_POST['admin']);


	if (isset($mat_nom)){
	$reqMat = connect()->prepare('INSERT INTO cr_materiel(mat_nom, modele, infos, ip, iemc, `s/n`, admin, mat_id_client) VALUES (:mat_nom, :modele, :infos, :ip, :iemc, :s_n, :admin, :client_id)');
	$reqMat->bindParam(':mat_nom', $mat_nom);
	$reqMat->bindParam(':modele', $modele);
	$reqMat->bindParam(':infos', $infos);
	$reqMat->bindParam(':ip', $ip);
	$reqMat->bindParam(':iemc', $iemc);
	$reqMat->bindParam(':s_n', $s_n);
	$reqMat->bindParam(':admin', $admin);
	$reqMat->bindParam(':client_id', $idClient);
	$reqMat->execute();

	$stmt = connect()->query("SELECT LAST_INSERT_ID(mat_id) FROM cr_materiel ORDER BY mat_id DESC");
	$matId = $stmt->fetchColumn();

	$sql = connect()->prepare("INSERT INTO cr_central(central_id_mat,central_id_client) VALUES (:matId,:clientId)");
	$sql->bindParam(':matId', $matId);
	$sql->bindParam(':clientId', $idClient);
	$sql->execute();

	$_SESSION['successAjoutMat'] = "Nouveau matériel créé";
	header("Location: ../../../front/public/details.php?idClient=$idClient");
	} else {

	$_SESSION['failAjoutMat'] = "Échec création matériel";
	header("Location: ../../../front/public/details.php?idClient=$idClient");
	}
	require_once('../../db/close.php');
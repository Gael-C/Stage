<?php
	session_start();

	use function back\db\connect;

	$id =$_POST['matId'];


	$sql = connect()->prepare("SELECT client_id FROM cr_materiel cm  INNER JOIN CR_Clients c on cm.mat_id_client = c.client_id  WHERE mat_id =:id");
	$sql->bindParam(':id',$id,PDO::PARAM_INT);
	$sql->execute();
	$result = $sql->fetch(PDO::FETCH_ASSOC);

	$idClient = $result['client_id'];

	//Récuperation infos matériel
	$mat_nom = htmlspecialchars($_POST['mat_nom']);
	$modele = htmlspecialchars($_POST['modele']);
	$infos = htmlspecialchars($_POST['infos']);
	$ip = htmlspecialchars($_POST['ip']);
	$iemc = htmlspecialchars($_POST['iemc']);
	$s_n = htmlspecialchars($_POST['s/n']);
	$admin = htmlspecialchars($_POST['admin']);


	if (empty($_POST['mat_nom'])){

		$_SESSION['failModifMat'] = "Échec modification matériel";
		header("Location: ../../../front/public/details.php?idClient=$idClient");

	} else {

		$reqMat = connect()->prepare("UPDATE `cr_materiel` SET `mat_nom`=:mat_nom, `modele`=:modele, `infos`=:infos, `ip`=:ip, `iemc`=:iemc, `s/n`=:s_n, `admin`=:admin, `mat_id_client`=:client_id  WHERE `mat_id`=:id");
		$reqMat->bindParam(':mat_nom', $mat_nom);
		$reqMat->bindParam(':modele', $modele);
		$reqMat->bindParam(':infos', $infos);
		$reqMat->bindParam(':ip', $ip);
		$reqMat->bindParam(':iemc', $iemc);
		$reqMat->bindParam(':s_n', $s_n);
		$reqMat->bindParam(':admin', $admin);
		$reqMat->bindParam(':client_id', $idClient);
		$reqMat->bindParam(':id', $id);
		$reqMat->execute();

		$_SESSION['successModifMat'] = "Modification matériel effectuée";
		header("Location: ../../../front/public/details.php?idClient=$idClient");
	}
		require_once('../../db/close.php');

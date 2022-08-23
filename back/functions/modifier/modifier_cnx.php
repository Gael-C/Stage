<?php

	session_start();

	use function back\db\connect;

	//On récupère l'Id de connexion...
	$id = $_POST['cnxId'];

	//et grâce à lui, l'Id du client
	$sql = connect()->prepare("SELECT client_id 
	FROM cr_connexion cc  
    INNER JOIN CR_Clients c on cc.cnx_id_client = c.client_id 
	WHERE cnx_id =:id");
	$sql->bindParam(':id',$id,PDO::PARAM_INT);
	$sql->execute();
	$result = $sql->fetch(PDO::FETCH_ASSOC);

	$idClient = $result['client_id'];


	//Récuperation infos connexion

	$cnx_nom = htmlspecialchars($_POST['cnx_nom']);
	$cnx_log = htmlspecialchars($_POST['cnx_log']);
	$cnx_mdp = htmlspecialchars($_POST['cnx_mdp']);
	$cnx_cle = htmlspecialchars($_POST['cnx_cle']);
	$cnx_date_p = htmlspecialchars($_POST['cnx_date_produit']);
	if (empty($cnx_date_p)):
		$cnx_date_p = date('Y-m-d');
	endif;
	$cnx_tel_ic = htmlspecialchars($_POST['cnx_tel_sec_icloud']);
	$cnx_mail_ic = htmlspecialchars($_POST['cnx_mail_sec_icloud']);
	$cnx_date_ic = htmlspecialchars($_POST['cnx_date_sec_icloud']);
	if (empty($cnx_date_ic)):
		$cnx_date_ic = date('Y-m-d');
	endif;


	if (empty($cnx_nom)){
		$_SESSION['failModifCnx'] = "Échec modification connexion";
		header("Location: ../../../front/public/details.php?idClient=$idClient");

	} else {

		//Insertion en BDD
		$reqCnx = connect()->prepare('UPDATE `cr_connexion` 
		SET `cnx_nom` =:nom, `login` =:login, `mdp`=:mdp, `cle_produit`=:cle_p, `date_nais_produit`=:date_p, 
	    `tel_sec_icloud`=:tel_ic, `mail_sec_icloud`=:mail_ic,`date_nais_icloud`=:date_ic, `cnx_id_client` =:client_id 
		WHERE `cnx_id`=:id');
		$reqCnx->bindParam(':nom', $cnx_nom);
		$reqCnx->bindParam(':login', $cnx_log);
		$reqCnx->bindParam(':mdp', $cnx_mdp);
		$reqCnx->bindParam(':cle_p', $cnx_cle);
		$reqCnx->bindParam(':date_p', $cnx_date_p);
		$reqCnx->bindParam(':tel_ic', $cnx_tel_ic);
		$reqCnx->bindParam(':mail_ic', $cnx_mail_ic);
		$reqCnx->bindParam(':date_ic', $cnx_date_ic);
		$reqCnx->bindParam(':client_id', $idClient);
		$reqCnx->bindParam(':id', $id);
		$reqCnx->execute();

		$_SESSION['successModifCnx'] = "Modification connexion effectuée";
		header("Location: ../../../front/public/details.php?idClient=$idClient");

	}
	require_once('../../db/close.php');

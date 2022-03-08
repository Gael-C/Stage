<?php
	require_once("../db/pdo.php");
	$search = htmlspecialchars($_POST['search-client']);

	function search(){

	}
	$sql = connect()->prepare("SELECT *
FROM CR_clients
INNER JOIN cr_entreprise ce on CR_Clients.client_id_entreprise= ce.ent_id
WHERE CR_Clients.client_nom LIKE '%$search%'
OR ent_nom LIKE '%$search%'
");
	$sql->execute();
	$result = $sql->fetch(PDO::FETCH_ASSOC);
	return $result;
	header('Location: ../home.php');




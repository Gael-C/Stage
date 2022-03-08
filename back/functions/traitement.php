<?php
	require_once('../db/pdo.php');

	if ($_POST['password'] !== $_POST['confirmPassword']) {
		header('Location: form.php');
	}
	//On empêche une attaque XSS
	$login = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars($_POST['password']);

	//On test si il y a une correspondance en BDD
	$sql = connect()->prepare('SELECT * FROM cr_log WHERE login = :login');
	$sql->bindParam(':login', $login);
	$sql->execute();
	$result =$sql->fetch(PDO::FETCH_ASSOC);

	if ($result == true) {
		header('Location: ../../front/home.php');
	} else {

		$hash = password_hash($password, PASSWORD_BCRYPT);

		if (isset($_POST['role'])) {
			$role = "ADMIN";
		} else {
			$role = "USER";
		}
		$req = connect()->prepare('INSERT INTO cr_log(login,password,role) VALUE (:login, :password, :role)');
		$req->bindParam(':login',$login );
		$req->bindParam(':password', $hash);
		$req->bindParam(':role', $role);
		$req->execute();

		header("Location: ../../front/home.php");
	}


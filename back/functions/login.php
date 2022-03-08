<?php
	require_once"../db/pdo.php";

	//On test l'envoi du formulaire
	if (isset($_POST['connect'])) {

		//On empêche une attaque XSS
		$login = htmlspecialchars($_POST['login']);
		$password = htmlspecialchars($_POST['password']);

		if (!empty($login) && !empty($password)) {

			$req = connect()->prepare('SELECT * FROM cr_log WHERE login = :login');
			$req->bindParam(':login', $login);
			$req->execute();
			$result = $req->fetch(PDO::FETCH_ASSOC);

			if ($result == true) {
				$hashpass = $result['password'];

				if (password_verify($password, $hashpass)) {

					session_start();
					$_SESSION['login'] = $result['login'];
					$_SESSION['id'] = $result['id'];
					$_SESSION['role'] = $result['role'];


					header("Location: ../../front/public/home.php");

				}

			} else {
				header("Location: ../../front/index.php");
			}
		}
	}

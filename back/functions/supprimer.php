<?php

namespace back\functions;

use function back\db\connect;

	$req = connect()->prepare('DELETE FROM CR_Clients WHERE client_id =:client_id');
	$req->bindParam(':client_id', $_GET['client_id']);
	$req->execute();

	header('Location: ../../front/home.php');


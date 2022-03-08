<?php

	if (!isset($_SESSION['start'])) {
		$_SESSION['start'] = time();
	}

	if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 1800)) {

		session_unset();
		session_destroy();
		header('Location: ../index.php');
	}
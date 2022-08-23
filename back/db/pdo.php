<?php

namespace back\db;

	function connect()
	{
		$dsn = "mysql:host=localhost;port=8889;dbname=cahier_reseau";

		try {
			$db= new \PDO($dsn,"root","root");

		}catch(\PDOException $e) {
			die($e->getMessage());

		}
		return $db;
	}


	



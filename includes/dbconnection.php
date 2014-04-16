<?php
	require_once('config.php');

	//Database connection
	try {
		$conn = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBAUTH);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}

?>
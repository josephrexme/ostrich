<?php

	//Locate the session
	session_start();

	//Unset the session variables
	$_SESSION = array();

	// Destroy the session cookie
	if(isset($COOKIE[session_name()])){
		setcookie(session_name(), '', time()-4200, '/');
	}

	// Destroy the session
	session_destroy();

	header('Location:index.php');
?>

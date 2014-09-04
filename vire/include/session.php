<?php
	// includes
	include 'variables.php';

	// variables
	$name = "";


	// functions
	function setSession($nm) {
		global $name;

		$_SESSION["name"] = $nm;
		$name = $nm;
	}

	function destroySession() {
		session_start();
		session_destroy();
	}

	function getSessionName() {
		global $name;
		if (isset($_SESSION["name"])) {
			return $_SESSION["name"];
		}
		else {
			return $name;	
		}
	}

	session_start();
	if (isset($_SESSION["name"])) {
		$name = $_SESSION["name"];
	}
	else {
		$name = "";	
	}
?>
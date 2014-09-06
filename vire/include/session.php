<?php
	// includes
	include 'variables.php';

	// variables
	$name = "";


	// functions
	function setSession($nm) {
		global $name;

		$_SESSION["username"] = $nm;
		$name = $nm;
	}

	function destroySession() {
		session_start();
		session_destroy();
	}

	function getSessionName() {
		global $name;
		if (isset($_SESSION["username"])) {
			return $_SESSION["username"];
		}
		else {
			return $name;	
		}
	}

	function setAttempt($val) {
		if ($val == 0) {
			$_SESSION["attempts"] = $val;
		}
		else {
			$_SESSION["attempts"] = $_SESSION["attempts"] + 1;
		}
	}

	function getAttempts() {
		if (isset($_SESSION["attempts"])) {
			return $_SESSION["attempts"];
		}
		else {
			return 0;
		}
	}

	function setUserInfo($result) {
		$_SESSION["firstname"] = $result->{"results"}[0]->{"firstname"};
		$_SESSION["lastname"] = $result->{"results"}[0]->{"lastname"};
	}

	function getUserName() {
		return $_SESSION["firstname"] . " " . $_SESSION["lastname"];
	}

	session_start();
	if (isset($_SESSION["username"])) {
		$name = $_SESSION["username"];
	}
	else {
		$name = "";	
	}
?>
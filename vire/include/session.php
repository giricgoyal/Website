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
		setcookie("user",$nm, time()+60*60*24*30);
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

	function setUserInfo($result) {
		$_SESSION["firstname"] = $result->{"results"}[0]->{"firstname"};
		$_SESSION["lastname"] = $result->{"results"}[0]->{"lastname"};
	}

	function getUserName() {
		return $_SESSION["firstname"] . " " . $_SESSION["lastname"];
	}

	function getUser() {
		if (isset($_COOKIE["user"])) {
			return $_COOKIE["user"];
		}
		return "";
	}

	function startSession() {
		session_start();
		if (isset($_SESSION["username"])) {
			$name = $_SESSION["username"];
		}
		else {
			$name = "";	
		}
	}
?>
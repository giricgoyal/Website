<?php
	// includes
	include 'variables.php';

	// variables
	$name = "";
	
	// functions
	function setSession($nm) {
		$_SESSION["uid"] = $nm;
	}

	function destroySession() {
		session_start();
		session_destroy();
	}

	function getSessionId() {
		if (isset($_SESSION["uid"])) {
			return $_SESSION["uid"];
		}
		else {
			return null;	
		}
	}

	session_start();
	if (isset($_SESSION["name"])) {
		$name = $_SESSION["name"];
	}
	else {
		$name = "";	
	}


	function setSignupDetails($fn, $ln, $em, $ps) {
		$val = $fn . ":" . $ln . ":" . $em . ":" . $ps;
		$_SESSION["signupDetails"] = $val;
	}

	function getSignupDetails() {
		$val = $_SESSION["signupDetails"];
		$valArr = explode(":", $val);
		return $valArr;
	}
?>
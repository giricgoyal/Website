<?php
	// includes
	include 'variables.php';

	// functions
	function setSession($nm) {
		$_SESSION["uid"] = $nm;
	}

	function destroySession() {
		//session_start();
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

	function setQueryId($id) {
		$_SESSION["name"] = $id;
	}	

	function getQueryId() {
		if ((isset($_SESSION["name"])) && ($_SESSION["name"] != "")) {
			return $_SESSION["name"];
		}
		else {
			return null;	
		}
	}

	//session_start();
	session_start();
	if (isset($_SESSION["name"])) {

	}
	else {
		$_SESSION["name"] = "";
	}
?>
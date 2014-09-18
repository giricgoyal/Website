<?php
	// includes
	include 'variables.php';

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

	function setQueryId($id) {
		if ($id != "")
			$_SESSION["qid"] = $id;
	}	

	function getQueryId() {
		if ($_SESSION["qid"] != "") {
			return $_SESSION["qid"];
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
		$_SESSION["name"] = "id";
	}
?>
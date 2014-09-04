<?php
	include "../include/variables.php";
	include $SITE_INCLUDE . "/session.php";
	include $SITE_INCLUDE . "/db.php";

	include $SITE_ADMIN_INCLUDE . "/login.php";


	include $SITE_FORMS . "/header.html";
	include $SITE_ADMIN_FORMS . "/header.html";
	include $SITE_ADMIN_FORMS . "/main.html";


	$dbObj = new dbClass();
	
	if ($_POST) {
		if ($_POST["loginName"] != "" && $_POST["loginName"] != "") {
			$name = $_POST["loginName"];
			$pwd = $_POST["loginPassword"];
			$check = updateCreds($dbObj, $name, $pwd);
			if ($check == True) {
				setSession($name);
				setAttempt(0);
			}
			else {
				setAttempt(1);
			}
			header("Location:" . $SITE_ADMIN_BASE_URL . "/index.php");
		}
	}


	function getName() {
		return getSessionName();
	}

	//$dbObj->closeToDB($con);
	include $SITE_FORMS . "/footer.html";
?>
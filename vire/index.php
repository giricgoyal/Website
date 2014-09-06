<?php
	include "include/variables.php";
	include $SITE_INCLUDE . "/session.php";
	include $SITE_INCLUDE . "/db.php";
	include $SITE_INCLUDE . "/login.php";

	
	if (getSessionName() == "") {
		include $SITE_FORMS . "/main.html";	
	}
	else {
		include $SITE_ACCOUNT_FORMS . "/main.html";
	}
	include $SITE_FORMS . "/header.html";
	
	
	$dbObj = new dbClass();
	
	if (isset($_POST['login'])) {
			if ($_POST["loginName"] != "" && $_POST["loginPassword"] != "") {
				$name = $_POST["loginName"];
				$pwd = $_POST["loginPassword"];
				$check = updateCreds($dbObj, $name, $pwd);
				if ($check == True) {
					$result = $dbObj->get("http://127.0.0.1:8000/useraccountinfo/?username=" . $uname);
					setSession($name);
					setUserInfo($result);
					setAttempt(0);
				}
				else {
					setAttempt(1);
				}
				header("Location:" . $SITE_BASE_URL);
			}
		}
	
	if (isset($_POST['logout'])) {
		header("Location:" . $SITE_INCLUDE_URL . "/logout.php");
	}

	include $SITE_FORMS . "/footer.html";
?>


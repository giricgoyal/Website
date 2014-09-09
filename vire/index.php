<?php
	include "include/variables.php";
	include $SITE_INCLUDE . "/session.php";
	include $SITE_INCLUDE . "/db.php";
	include $SITE_INCLUDE . "/login.php";

	startSession();
	
	if (getSessionId() == null) {
		include $SITE_FORMS . "/main.html";
	}
	else {
		include $SITE_ACCOUNT_BASE . "/index.php";
	}

	// include header
	include $SITE_FORMS . "/header.html";

	$dbObj = new dbClass();
	

	if (isset($_POST['login'])) {
			if ($_POST["loginName"] != "" && $_POST["loginPassword"] != "") {
				$name = $_POST["loginName"];
				$pwd = $_POST["loginPassword"];
				$uid = updateCreds($dbObj, $name, $pwd);
				if ($uid != null) {
					$result = $dbObj->get("http://127.0.0.1:8000/useraccountinfo/?userid=" . $uid);
					setSession($uid);
					setUserInfo($result);
					if (isset($_POST['loginRememberMe'])) {

					}

				}
				else {

				}
				header("Location:" . $SITE_BASE_URL);
			}
			if ($_POST["loginName"] == "") {

			}
			if ($_POST["loginPassword"] == "") {

			}
		}
	
	else if (isset($_POST['logout'])) {
		header("Location:" . $SITE_INCLUDE_URL . "/logout.php");
	}

	else if (isset($_POST['signup'])) {
		header("Location:" . $SITE_SIGNUP_BASE_URL);
	}


	// include footer
	include $SITE_FORMS . "/footer.html";
	
?>


<?php
	include "../include/variables.php";
	include $SITE_INCLUDE . "/session.php";
	include $SITE_INCLUDE . "/db.php";
	include $SITE_INCLUDE . "/login.php";

	$currentpage = "login";

	$dbObj = new dbClass();
	

	// for login
	if (isset($_POST['signin'])) {
		if ($_POST["username"] != "" && $_POST["username"] != "") {
			$name = $dbObj->enVal($_POST["username"]);
			$pwd = $dbObj->enVal($_POST["password"]);
			$result = $dbObj->get($USER_ACCOUNT_URL . "?". $dbObj->enKey("username") . "=" . $name);
			$uid = null;
			if ($result != null) {
				$pwrd = $result->{"results"}[0]->{$dbObj->enKey("password")};
				if ($pwrd == $pwd) {
					$uid = $result->{"results"}[0]->{$dbObj->enKey("userid")};
					echo $uid;
				}
			}
			if ($uid != null) {
				$result = $dbObj->get($USER_ACCOUNT_INFO_URL . "?". $dbObj->enKey("userid") . "=" . $uid);
				setSession($uid);
				if (isset($_POST['rememberme'])) {

				}

			}
			else {

			}
			header("Location:" . $SITE_BASE_URL);
		}
	}


	// for sign up
	if (isset($_POST['signup'])) {
		if (($_POST['firstname'] != "") && ($_POST['lastname'] != "") && ($_POST['email'] != "")  && ($_POST['password'] != "")) {
			$fn = $dbObj->enVal($_POST['firstname']);
			$ln = $dbObj->enVal($_POST['lastname']);
			$em = $dbObj->enVal($_POST['email']);
			$ps = $dbObj->enVal($_POST['password']);
			$acc = "c";

			$id = $dbObj->enVal($dbObj->getRandomId());

			$detailsArr = [
						$dbObj->enKey("userid") => $id,
						$dbObj->enKey("username") => $em,
						$dbObj->enKey("password") => $ps,
						$dbObj->enKey("accounttype") => $acc
					];
			$dbObj->post($USER_ACCOUNT_URL, $detailsArr);
			
			$detailsArr = [
						$dbObj->enKey("userid") => $id,
						$dbObj->enKey("firstname") => $fn,
						$dbObj->enKey("lastname") => $ln,
						$dbObj->enKey("email") => $em,
					];
			$dbObj->post($USER_ACCOUNT_INFO_URL, $detailsArr);
			
			header("Location: " . $SITE_SIGNUP_BASE_URL);
		}	
	}


	// include htmls
	include $SITE_FORMS . "/header.html";
	include $SITE_FORMS . "/header2.html";
	include $SITE_FORMS . "/login.html";

	


	include $SITE_FORMS . "/footer.html";
	
?>


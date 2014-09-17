<?php
	include "../include/variables.php";
	include $SITE_INCLUDE . "/session.php";
	include $SITE_INCLUDE . "/db.php";

	$currentpage = "signup";

	$dbObj = new dbClass();

	$details1 = [
				$dbObj->enKey("username") => "",
				$dbObj->enKey("password") => "",
				$dbObj->enKey("accounttype") => "",
				];

	$details2 = [
				$dbObj->enKey("firstname") => "",
				$dbObj->enKey("middlename") => "",
				$dbObj->enKey("lastname") => "",
				$dbObj->enKey("gender") => "",
				$dbObj->enKey("email") => "",
				$dbObj->enKey("phonenumber") => "",
				];
	
	$uid = getSessionId();
	$result1 = $dbObj->get($USER_ACCOUNT_URL . "?". $dbObj->enKey("userid") . "=" . $uid);
	if ($result1 != null) {
		$details1 = $result1->{"results"}[0];
	}
	$result2 = $dbObj->get($USER_ACCOUNT_INFO_URL . "?". $dbObj->enKey("userid") . "=" . $uid);
	if ($result2 != null) {
		$details2 = $result2->{"results"}[0];
	}
		
	include $SITE_FORMS . "/header.html";
	include $SITE_FORMS . "/header2.html";
	include $SITE_FORMS . "/signup.html";
	include $SITE_FORMS . "/footer.html";
	
?>


<?php
	include "../include/variables.php";
	include $SITE_INCLUDE . "/session.php";
	
	$currentpage = "login";
	
	include $SITE_FORMS . "/header.html";
	include $SITE_FORMS . "/header2.html";
	include $SITE_FORMS . "/login.html";

	if (isset($_POST['signup'])) {
		header("Location: " . $SITE_SIGNUP_BASE_URL);
	}


	include $SITE_FORMS . "/footer.html";
	
?>


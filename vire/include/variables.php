
<?php

	$_SESSION 			=	array();

	$SITE_NAME			=	"vire";

	$SITE_IP = "localhost";
	$SITE_ADDR = $SITE_IP . "/" . $SITE_NAME;

	if ($_SERVER['SERVER_NAME'] != "localhost") {
		$SITE_ADDR = $_SERVER['SERVER_NAME'] . "/" . $SITE_NAME;
	}
	
	
	$SITE_BASE 			= 	realpath($_SERVER["DOCUMENT_ROOT"]) . "/" . $SITE_NAME;
	$SITE_INCLUDE 		= 	$SITE_BASE . "/include";
	$SITE_FORMS			=	$SITE_BASE . "/forms";

	$SITE_ACCOUNT_BASE		=	$SITE_BASE . "/account";
	
	$SITE_SIGNUP_BASE		=	$SITE_BASE . "/signup";
	
	// URLs

	$SITE_BASE_URL 		= 	"http://" . $SITE_ADDR;
	$SITE_INCLUDE_URL 	=	$SITE_BASE_URL . "/include";
	$SITE_CSS_URL 		=	$SITE_BASE_URL . "/css";

	$SITE_ACCOUNT_BASE_URL		=	$SITE_BASE_URL . "/account";
	
	$SITE_SIGNUP_BASE_URL		=	$SITE_BASE_URL . "/signup";
?>

<?php

	$_SESSION 			=	array();


	$SITE_NAME			=	"artnartists";

	$SITE_IP = "localhost";
	$SITE_ADDR = $SITE_IP . "/" . $SITE_NAME;

	if ($_SERVER['SERVER_NAME'] != "localhost") {
		$SITE_ADDR = $_SERVER['SERVER_NAME'] . "/" . $SITE_NAME;
	}
	
	
	$SITE_BASE 			= 	realpath($_SERVER["DOCUMENT_ROOT"]) . "/" . $SITE_NAME;
	$SITE_INCLUDE 		= 	$SITE_BASE . "/include";
	$SITE_FORMS			=	$SITE_BASE . "/forms";

	$SITE_ADMIN_BASE		=	$SITE_BASE . $SITE_NAME . "/admin";
	$SITE_ADMIN_INCLUDE		=	"include";
	$SITE_ADMIN_FORMS		=	"forms";


	// URLs

	$SITE_BASE_URL 		= 	"http://" . $SITE_ADDR;
	$SITE_INCLUDE_URL 	=	 $SITE_BASE_URL . "/include";

	$SITE_ADMIN_BASE_URL		=	$SITE_BASE_URL . "/admin";
	$SITE_ADMIN_INCLUDE_URL		=	$SITE_ADMIN_BASE_URL . "/include";


	// db
	$databaseName = "testDB";
	$userTable = "testtable1";

?>
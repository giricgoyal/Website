
<?php

	$_SESSION 			=	array();

	$currentpage		=	"asda";

	$SITE_NAME			=	"artnartistsComingSoon";

	$SITE_IP = "localhost";
	$SITE_ADDR = $SITE_IP . "/" . $SITE_NAME;

	if ($_SERVER['SERVER_NAME'] != "localhost") {
		$SITE_ADDR = $_SERVER['SERVER_NAME'] . "/" . $SITE_NAME;
	}
	
	
	$SITE_BASE 			= 	realpath($_SERVER["DOCUMENT_ROOT"]) . "/" . $SITE_NAME;
	$SITE_INCLUDE 		= 	$SITE_BASE . "/include";
	$SITE_FORMS			=	$SITE_BASE . "/forms";

		

	// URLs

	$SITE_BASE_URL 		= 	"http://" . $SITE_ADDR;
	$SITE_CSS_URL 		=	$SITE_BASE_URL . "/css";
	$SITE_JS_URL 		=	$SITE_BASE_URL . "/js";
	$SITE_IMAGE_URL		=	$SITE_BASE_URL . "/images";


	// db
	$databaseName = "testDB";
	$userTable = "testtable1";

?>
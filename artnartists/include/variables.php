
<?php

	$_SESSION 			=	array();

	$currentpage		=	"asda";

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

	$SITE_ARTIST_BASE	=	$SITE_BASE . "/artist";
	$SITE_SHOP_BASE		=	$SITE_BASE . "/shop";
	$SITE_CONTACTUS_BASE	=	$SITE_BASE . "/ContactUs";
	$SITE_LOGIN_BASE	=	$SITE_BASE . "/login";
		

	// URLs

	$SITE_BASE_URL 		= 	"http://" . $SITE_ADDR;
	$SITE_CSS_URL 		=	$SITE_BASE_URL . "/css";
	$SITE_JS_URL 		=	$SITE_BASE_URL . "/js";
	$SITE_IMAGE_URL		=	$SITE_BASE_URL . "/images";

	$SITE_ADMIN_BASE_URL		=	$SITE_BASE_URL . "/admin";
	$SITE_ARTIST_BASE_URL	=	$SITE_BASE_URL . "/artist";
	$SITE_SHOP_BASE_URL		=	$SITE_BASE_URL . "/shop";
	$SITE_CONTACTUS_BASE_URL		=	$SITE_BASE_URL . "/ContactUs";
	$SITE_LOGIN_BASE_URL		=	$SITE_BASE_URL . "/login";

	

	// db
	$databaseName = "testDB";
	$userTable = "testtable1";

?>
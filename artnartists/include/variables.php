
<?php

	$_SESSION 			=	array();


	$currentpage		=	"";

	$SITE_NAME			=	"artnartists";

	$SITE_IP = "localhost";
	$SITE_ADDR = $SITE_IP . "/" . $SITE_NAME;

	if ($_SERVER['SERVER_NAME'] != "localhost") {
		$SITE_ADDR = $_SERVER['SERVER_NAME'] . "/" . $SITE_NAME;
	}

	$SERVER_ADDR = "http://127.0.0.1:8000";
	$USER_ACCOUNT_URL = $SERVER_ADDR . "/useraccount/";
	$CUSTOMER_ACCOUNT_INFO_URL = $SERVER_ADDR . "/customeraccountinfo/";
	$ARTIST_ACCOUNT_INFO_URL = $SERVER_ADDR . "/artistaccountinfo/";
	$USER_ACCOUNT_INFO_URL = $SERVER_ADDR . "/useraccountinfo/";
	

	
	$SITE_BASE 			= 	realpath($_SERVER["DOCUMENT_ROOT"]) . "/" . $SITE_NAME;
	$SITE_INCLUDE 		= 	$SITE_BASE . "/include";
	$SITE_FORMS			=	$SITE_BASE . "/forms";

	$SITE_ADMIN_BASE		=	$SITE_BASE . $SITE_NAME . "/admin";
	$SITE_ADMIN_INCLUDE		=	"include";
	$SITE_ADMIN_FORMS		=	"forms";

	$SITE_ARTIST_BASE	=	$SITE_BASE . "/artist";
	$SITE_SHOP_BASE		=	$SITE_BASE . "/shop";
	$SITE_CONTACTUS_BASE	=	$SITE_BASE . "/contactus";
	$SITE_LOGIN_BASE	=	$SITE_BASE . "/login";
	$SITE_SIGNUP_BASE	=	$SITE_BASE . "/signup";
		

	// URLs

	$SITE_BASE_URL 		= 	"http://" . $SITE_ADDR;
	$SITE_CSS_URL 		=	$SITE_BASE_URL . "/css";
	$SITE_JS_URL 		=	$SITE_BASE_URL . "/js";
	$SITE_IMAGE_URL		=	$SITE_BASE_URL . "/images";

	$SITE_ADMIN_BASE_URL		=	$SITE_BASE_URL . "/admin";
	$SITE_ARTIST_BASE_URL	=	$SITE_BASE_URL . "/artist";
	$SITE_SHOP_BASE_URL		=	$SITE_BASE_URL . "/shop";
	$SITE_CONTACTUS_BASE_URL		=	$SITE_BASE_URL . "/contactus";
	$SITE_LOGIN_BASE_URL		=	$SITE_BASE_URL . "/login";
	$SITE_SIGNUP_BASE_URL		=	$SITE_BASE_URL . "/signup";

	
	

	// db
	$databaseName = "testDB";
	$userTable = "testtable1";


?>
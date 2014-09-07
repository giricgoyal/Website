<?php
	include "../include/variables.php";
	include $SITE_INCLUDE . "/session.php";

	setcookie("user", "", time()-3600);
	unset($_COOKIE["user"]);
	destroySession();
	
	header("Location:" . $SITE_BASE_URL);
?>
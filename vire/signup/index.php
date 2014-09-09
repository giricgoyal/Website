<?php

	include "../include/variables.php";
	include $SITE_INCLUDE . "/session.php";
	include $SITE_INCLUDE . "/db.php";
	include $SITE_INCLUDE . "/login.php";

	startSession();

	include $SITE_FORMS . "/signup.html";

	// include header
	include $SITE_FORMS . "/header.html";

	// include footer
	include $SITE_FORMS . "/footer.html";

?>


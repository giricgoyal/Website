<?php
	include "../include/variables.php";
	include $SITE_INCLUDE . "/session.php";

	destroySession();

	header("Location:" . $SITE_BASE_URL);
?>
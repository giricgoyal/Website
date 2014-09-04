<?php
	include "../../include/variables.php";
	include $SITE_INCLUDE . "/session.php";

	destroySession();

	header("Location:" . $SITE_ADMIN_BASE_URL . "/index.php");
?>
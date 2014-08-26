<!-- Admin Index.php -->

<?php
	include "../include/variables.php";
	include $SITE_INCLUDE . "/session.php";

	include $SITE_ADMIN_INCLUDE . "/login.php";


	include $SITE_FORMS . "/header.html";
	include $SITE_ADMIN_FORMS . "/header.html";
	include $SITE_ADMIN_FORMS . "/main.html";


	if ($_POST) {
		if ($_POST["loginName"] != "" && $_POST["loginName"] != "") {
			$name = $_POST["loginName"];
			$pwd = $_POST["loginPassword"];
			updateCreds($name, $pwd);
			header("Location:" . $SITE_ADMIN_BASE_URL . "/index.php");
		}
	}

	include $SITE_FORMS . "/footer.html";


	function getName() {
		return getSessionName();
	}
?>
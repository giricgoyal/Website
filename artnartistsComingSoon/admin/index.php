<?php
	include "../include/variables.php";
	include "include/variables.php";
	include $SITE_INCLUDE . "/session.php";
	include $SITE_INCLUDE . "/db.php";

	include $SITE_ADMIN_INCLUDE . "/login.php";

	$dbObj = new dbClass();

	if (getSessionId() == null) {
		include $SITE_ADMIN_FORMS . "/main.html";
	}
	else {
		$result = $dbObj->get($DB_SERVER_USER);
		if ($result != null) {
			$count = $result->{"count"};
			$next = $result->{"next"};
			$prev= $result->{"previous"};
			$resultArr = $result->{"results"};
		}
		include $SITE_ADMIN_FORMS . "/admin.html";
	}

	
	if (isset($_POST["submit"])) {
		if ($_POST["username"] != "" && $_POST["password"] != "") {
			$name = $dbObj->enVal($_POST["username"]);
			$pwd = $dbObj->enVal($_POST["password"]);

			$result = $dbObj->get($DB_SERVER_ADMIN . "?" . $dbObj->enKey("username") . "=" . $name);
			if ($result != null) {
				$upwd = $result->{"results"}[0]->{$dbObj->enKey("password")};
				if ($pwd == $upwd) {
					setSession($dbObj->deVal($result->{"results"}[0]->{$dbObj->enKey("userid")}));
				}
			}
			header("Location:" . $SITE_ADMIN_URL . "/index.php");
		}
	}

	if (isset($_POST["newadmin"])) {
		if ($_POST["username"] != "" && $_POST["password"] != "") {
			$id = $dbObj->enVal($dbObj->getRandomId());
			$name = $dbObj->enVal($_POST["username"]);
			$pwd = $dbObj->enVal($_POST["password"]);
			$details = [
						$dbObj->enKey("userid") => $id,
						$dbObj->enKey("username") => $name,
						$dbObj->enKey("password") => $pwd
						];
			$dbObj->post($DB_SERVER_ADMIN, $details);
			header("Location:" . $SITE_ADMIN_URL . "/index.php");
		}
	}

	if (isset($_POST["deleteall"])) {
		if ($result != null) {
			$url = $DB_SERVER_USER;
			while(true) {
				$res = $dbObj->get($url);
				$i = 0;
				$count = sizeof($res->{"results"});
				while ($i < $count) {
					$surl = $res->{"results"}[$i]->{"url"};
					$dbObj->delete($surl);
					$i++;
				}
				if ($result->{"next"} == null) {
					break;
				}
				else {
					$url = $res->{"next"};
				}
			}
		}
	}

?>
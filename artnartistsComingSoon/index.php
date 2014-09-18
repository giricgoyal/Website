<?php
	include "include/variables.php";
	include $SITE_INCLUDE . "/session.php";
	include $SITE_INCLUDE . "/db.php";
	

	$currentpage = "art";
	$url = $SITE_BASE_URL . "?";
	if (isset($_SESSION['id'])) {
		setQueryId($_SERVER['QUERY_STRING']);
	}

	$dbObj = new dbClass();

	include $SITE_FORMS . "/header.html";
	
	if (isset($_POST["submit"])) {
		if ($_POST["name"] != "" && $_POST["email"] != "") {
			$name = $dbObj->enVal($_POST["name"]);
			$email = $dbObj->enVal($_POST["email"]);
			$friends = 0;
			$result = $dbObj->get($DB_SERVER_USER . "?". $dbObj->enKey("email") . "=" . $email);
			if ($result == null) {

				$requestId = getQueryId();
				if ($requestId != "") {
					$result = $dbObj->get($DB_SERVER_USER . "?" . $dbObj->enKey("userid") . "=" . $requestId);
					if ($result != null) {
						$result->{"results"}[0]->{$dbObj->enKey("friends")} = $dbObj->enVal($dbObj->deVal($result->{"results"}[0]->{$dbObj->enKey("friends")}) + 1);
						$serUrl = $dbObj->deVal($result->{"results"}[0]->{$dbObj->enKey("url")});
						$dbObj->put($serUrl, $result->{"results"}[0]);
					}
				}

				$id = $dbObj->enVal($dbObj->getRandomId());
				$friends = $dbObj->enVal($friends);
				$details = [
							$dbObj->enKey("userid") => $id,
							$dbObj->enKey("email") => $email,
							$dbObj->enKey("name") => $name,
							$dbObj->enKey("friends") => $friends
							];
				$dbObj->post($DB_SERVER_USER, $details);
				$url = $url . $id;
				include $SITE_FORMS . "/signup.html";
			}
			else {
				$id = $dbObj->deVal($result->{"results"}[0]->{$dbObj->enKey("userid")});
				$url = $url . $id;
				include $SITE_FORMS . "/signup.html";
			}
		}
	}
	else {
		include $SITE_FORMS . "/art.html";
	}
	
	include $SITE_FORMS . "/footer.html";
	
?>


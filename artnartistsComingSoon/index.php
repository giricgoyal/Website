<?php
	include "include/variables.php";
	include $SITE_INCLUDE . "/session.php";
	include $SITE_INCLUDE . "/db.php";
	

	$currentpage = "art";
	$url = $SITE_BASE_URL . "?";
	if (isset($_SERVER['QUERY_STRING'])) {
		setQueryId($_SERVER['QUERY_STRING']);
	}

	$dbObj = new dbClass();

	include $SITE_FORMS . "/header.html";
	
	if (isset($_POST["submit"])) {
		if ($_POST["name"] != "" && $_POST["email"] != "") {
			$requestId = getQueryId();
			if ($requestId != "") {
				$result = $dbObj->get($DB_SERVER_USER . "?" . $dbObj->enKey("userid") . "=" . $requestId);
				print_r($result);
				if ($result != null) {
					$friends = $dbObj->enVal($dbObj->deVal($result->{"results"}[0]->{$dbObj->enKey("friends")}) + 1);
					$details = [
								$dbObj->enKey("friends") => $friends 
								];
					$url = $dbObj->deVal($result->{"results"}[0]->{$dbObj->enKey("url")});
					echo $url;
					$dbObj->put($url, $details);
				}
			}
			$name = $dbObj->enVal($_POST["name"]);
			$email = $dbObj->enVal($_POST["email"]);
			$friends = 0;
			$result = $dbObj->get($DB_SERVER_USER . "?". $dbObj->enKey("email") . "=" . $email);
			if ($result == null) {
				$id = $dbObj->enVal($dbObj->getRandomId());
				$friends = $dbObj->enVal($friends);
				$details = [
							$dbObj->enKey("userid") => $id,
							$dbObj->enKey("email") => $email,
							$dbObj->enKey("name") => $name,
							$dbObj->enKey("friends") => $friends
							];
				//$dbObj->post($DB_SERVER_USER, $details);
				$url = $url . $id;
			}
			else {
			}
		}
		include $SITE_FORMS . "/signup.html";
	}
	else {
		include $SITE_FORMS . "/art.html";
	}
	
	include $SITE_FORMS . "/footer.html";
	
?>


<?php
	try {
		include "include/variables.php";
		include $SITE_INCLUDE . "/session.php";
		include $SITE_INCLUDE . "/db.php";
		include $SITE_INCLUDE . "/email.php";
		require_once "Mail.php";
		
		$currentpage = "art";
		$url = $SITE_BASE_URL . "?";
		if ((isset($_SESSION["name"])) && ($_SESSION["name"] == "")) {
			setQueryId($_SERVER['QUERY_STRING']);
		}
		
		$dbObj = new dbClass();
		$emailObj = new EmailClass();

		include $SITE_FORMS . "/header.html";
		
		if (isset($_POST["submit"])) {
			if ($_POST["name"] != "" && $_POST["email"] != "") {
				$name = $dbObj->enVal($_POST["name"], $enK, true);
				$email = $dbObj->enVal($_POST["email"], $enK, true);
				$friends = 0;
				$result = $dbObj->get($DB_SERVER_USER . "?". $dbObj->enKey("email") . "=" . $email);
				if ($result == null) {
					$requestId = getQueryId();
					echo $requestId . "\n";
					if ($requestId != "") {
						$result = $dbObj->get($DB_SERVER_USER . "?" . $dbObj->enKey("userid") . "=" . $requestId);
						if ($result != null) {
							$frnds = intval($dbObj->deVal($result->{"results"}[0]->{$dbObj->enKey("friends")}, $enK, true)) + 1;
							$frnds = strval($frnds);
							echo $frnds . "\n";
							$result->{"results"}[0]->{$dbObj->enKey("friends")} = $dbObj->enVal($frnds, $enK, true);
							$serUrl = $result->{"results"}[0]->{$dbObj->enKey("url")};
							$dbObj->put($serUrl, $result->{"results"}[0]);
						}
					}

					$id = $dbObj->getRandomId();
					$friends = $dbObj->enVal(strval($friends), $enK, true);
					$details = [
								$dbObj->enKey("userid") => $id,
								$dbObj->enKey("email") => $email,
								$dbObj->enKey("name") => $name,
								$dbObj->enKey("friends") => $friends
								];
					$dbObj->post($DB_SERVER_USER, $details);
					$url = $url . $id;
					destroySession();
					include $SITE_FORMS . "/signup.html";
					$emailObj->sendThankYouEmail($dbObj->deVal($email, $enK, true), $dbObj->deVal($name, $enK, true), $url, $sendMail);
				}
				else {
					$id = $result->{"results"}[0]->{$dbObj->enKey("userid")};
					$url = $url . $id;
					include $SITE_FORMS . "/signup.html";
					$emailObj->sendThankYouEmail($dbObj->deVal($email, $enK, true), $dbObj->deVal($name, $enK, true), $url, $sendMail);
				}
			}
		}
		else {
			include $SITE_FORMS . "/art.html";
		}

	
	include $SITE_FORMS . "/footer.html";
	}
	catch (Exception $e) {
		echo "Caught: ", $e->getMessage(), "\n";
	}
?>


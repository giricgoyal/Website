<?php
	try {
		include "include/variables.php";
		include $SITE_INCLUDE . "/session.php";
		include $SITE_INCLUDE . "/db.php";
		include $SITE_INCLUDE . "/email.php";
		
		$currentpage = "art";
		$url = $SITE_BASE_URL . "?";
		if (isset($_SESSION["name"]) && $_SESSION["name"] == "") {
			setQueryId($_SERVER['QUERY_STRING']);
		}
		
		$dbObj = new dbClass();
		$emailObj = new EmailClass();

		include $SITE_FORMS . "/header.html";
		if (isset($_POST["signup"])) {
			if ($_POST["name"] != "" && $_POST["email"] != "") {
				$name = $dbObj->enVal($_POST["name"], $enK, true);
				$email = $dbObj->enVal($_POST["email"], $enK, true);
				$friends = 0;
				$result = $dbObj->get($DB_SERVER_USER . "?". $dbObj->enKey("email") . "=" . $email);
				if ($result == null) {
					$requestId = getQueryId();
					if ($requestId != "") {
						$result = $dbObj->get($DB_SERVER_USER . "?" . $dbObj->enKey("userid") . "=" . $requestId);
						if ($result != null) {
							$frnds = intval($dbObj->deVal($result->{"results"}[0]->{$dbObj->enKey("friends")}, $enK, true)) + 1;
							$frnds = strval($frnds);
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
					$emailObj->sendThankYouEmail($dbObj->deVal($email, $enK, true), $dbObj->deVal($name, $enK, true), $url, $sendMail, $SITE_IMAGE_URL);
				}
				else {
					$id = $result->{"results"}[0]->{$dbObj->enKey("userid")};
					$url = $url . $id;
					include $SITE_FORMS . "/signup.html";
					$emailObj->sendThankYouEmail($dbObj->deVal($email, $enK, true), $dbObj->deVal($name, $enK, true), $url, $sendMail, $SITE_IMAGE_URL);
				}
			}
		}
		else if (isset($_POST["submit"])) {
			if ($_POST["nameC"] != "" && $_POST["emailC"] != "" && $_POST["subjectC"] != "" && $_POST["messageC"] != "") {
				$name = $_POST["nameC"];
				$email = $_POST["emailC"];
				$subject = $_POST["subjectC"];
				$message = $_POST["messageC"];
				$status = $emailObj->sendUsMail($name, $email, $subject, $message, $MAIL_TO);
				if ($status) {
					?>
						<script language="javascript" type="text/javascript">
							alert('Thank you for contacting us. We will contact you shortly.');
							window.location = '<?php echo $SITE_BASE_URL ?>';
						</script>
					<?php
				}
				else {
					?>
						<script language="javascript" type="text/javascript">
							alert('We are experiencing some technical issues. Please contact directly to <?php $MAIL_TO ?>.');
							window.location = '<?php echo $SITE_BASE_URL ?>';
						</script>
					<?php
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


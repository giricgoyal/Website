<?php
	include "variables.php";

	class EmailClass {
		function sendThankYouEmail($to, $name, $url, $send) {
			if ($send) {
				try {
					$subject = "Thank you " . $name . " for signing up!";
					$message = "<html>
									<body>
										<img src='" . $SITE_IMAGE_URL . "/logo.png' alt='logo'/>
									</body>
								</html>
								";
					$headers = array(
						'From' => 'ArtnArtists',
						'To' => $to,
						'Subject' => $subject,
						'MIME-Version' => 1.0,
						'Content-Type' => 'text/html',
						'charset' => 'ISO-8859-1'
						);
					$smtp = Mail::factory('smtp', array(
							'host' => 'ssl://smtp.gmail.com',
							'port' => '465',
							'auth' => true,
							'username' => 'artnartists0713@gmail.com',
							'password' => 'artnartists07'
						));

					$mail = $smtp->send($to, $headers, $message); 
				}
				catch (Exception $e) {
					echo "Caught: " . $e->getMessge() . "\n";
				}
			}
		}
	}
?>
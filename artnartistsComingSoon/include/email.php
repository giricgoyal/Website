<?php
	//include "variables.php";

	class EmailClass {
		function sendThankYouEmail($to, $name, $url, $send, $logoimage) {
			if ($send) {
				try {
					$subject = "Thank you " . $name . " for signing up!";
					$message = "<html >
									<body>
										<img src='" . $logoimage . "/logo.png' alt='logo'/><br>
										<span style='font-size: 2em; color: #101010'>Thank you for signing up, " . $name . "</span><br><br>
										<span style='font-size: 1.2em'>We will be here soon. Till then, share this URL with atleast 3 of your friends to get early access to the wall of fame.</span><br><br>
										<span style='text-align: center'>" . $url . "</span><br><br>
										<span>Regards</span><br>
										<span>ArtinArtist Team</span>
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
		
		function sendUsMail($name, $email, $subject, $message, $mail_to) {
			try {
				$body_message = 'From: ' . $name . "\n";
				$body_message .= 'E-Mail: ' . $email . "\n";
				$body_message .= 'Message: ' . $message;
				$headers = "From: " . $email . "\r\n";
				$headers .= "Reply-To: " . $email . "\r\n";
				$mail_status = mail($mail_to, $subject, $body_message, $headers);
				return $mail_status;
			}
			catch (Exception $e) {
				echo "Caught: " . $e->getMessage() . "\n";
			}
		}
	}
?>
<?php
	
	class EmailClass {
		function sendThankYouEmail($to, $name, $send) {
			if ($send) {
				try {
					$subject = "Thank you " . $name . " for signing up!";
					$message = "testing";
					$headers = array(
						'From' => 'ArtnArtists',
						'To' => $to,
						'Subject' => $subject
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
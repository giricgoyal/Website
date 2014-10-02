<?php

	include 'AES.php';
	include 'hash.php';
	
	class dbClass {
		// variables
		private $user = "admin";
		private $password = "password";
		
		//methods
		//get function
		function get($serviceURL) {
			$curl = curl_init();

			// set HTTP header
			$headers = array(
			    'Content-Type: application/json',
			);

			curl_setopt_array(
				$curl,
				array(
					CURLOPT_URL => $serviceURL,
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_SSL_VERIFYPEER => false,
					CURLOPT_HTTPHEADER => $headers,
					CURLOPT_USERPWD => $this->user . ':' . $this->password
				)
			);

			$response = curl_exec($curl);
			if ($response === false) {
				$info = curl_getinfo($curl);
				curl_close($curl);
    			die('error occured during curl exec. Additioanl info: ' . var_export($info));
			}
			curl_close($curl);

			$decoded = json_decode($response);
			if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
			    die('error occured: ' . $decoded->response->errormessage);
			}
			if ($decoded->{"count"} != 0) {
				return $decoded;	
			}
			return null;
			
		}


		function post($serviceURL, $fields) {
			try {
				$curl = curl_init();

				// set HTTP header
				$headers = array(
				    'Content-Type: application/json'
				);

				// set curl options
				curl_setopt_array(
					$curl,
					array(
						CURLOPT_URL => $serviceURL,
						CURLOPT_POST => true,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_SSL_VERIFYPEER => false,
						CURLOPT_HTTPHEADER => $headers,
						CURLOPT_USERPWD => $this->user . ":" . $this->password,
						CURLOPT_POSTFIELDS => json_encode($fields)
						)
					);

				$response = curl_exec($curl);
				if ($response === false) {
					$info = curl_getinfo($curl);
					curl_close($curl);
	    			die('error occured during curl exec. Additioanl info: ' . var_export($info));
				}
				curl_close($curl);
			}
			catch(Exception $e) {
				echo "Caught: ", $e->getMessage(), "\n";
			}
		}


		function put($serviceURL, $fields) {
			$curl = curl_init();

			// set HTTP header
			$headers = array(
			    'Content-Type: application/json',
			);

			curl_setopt_array(
				$curl,
				array(
					CURLOPT_URL => $serviceURL,
					CURLOPT_CUSTOMREQUEST => "PUT",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_SSL_VERIFYPEER => false,
					CURLOPT_HTTPHEADER => $headers,
					CURLOPT_USERPWD => $this->user . ':' . $this->password,
					CURLOPT_POSTFIELDS => json_encode($fields)
				)
			);

			$response = curl_exec($curl);
			if ($response === false) {
				$info = curl_getinfo($curl);
				curl_close($curl);
    			die('error occured during curl exec. Additioanl info: ' . var_export($info));
			}
			curl_close($curl);

		}

		function delete($serviceURL) {
			$curl = curl_init();

			// set HTTP header
			$headers = array(
			    'Content-Type: application/json',
			);

			curl_setopt_array(
				$curl,
				array(
					CURLOPT_URL => $serviceURL,
					CURLOPT_CUSTOMREQUEST => "DELETE",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_SSL_VERIFYPEER => false,
					CURLOPT_HTTPHEADER => $headers,
					CURLOPT_USERPWD => $this->user . ':' . $this->password,
					CURLOPT_POSTFIELDS => ""
				)
			);

			$response = curl_exec($curl);
			if ($response === false) {
				$info = curl_getinfo($curl);
				curl_close($curl);
    			die('error occured during curl exec. Additioanl info: ' . var_export($info));
			}
			curl_close($curl);
		}


		function generateRandomString($length = 4) {
			$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$start = rand(0,strlen($str) - $length + 1);
			return substr(str_shuffle($str), $start, $length);
		}

		function getRandomId() {
			return uniqid($this->generateRandomString());
		}


		function enVal($val, $key, $enc) {
			if ($enc == True) {
				$imputText = $val;
				$blockSize = 128;
				$aes = new AES($imputText, $key, $blockSize);
				$enc = $aes->encrypt();
				$enc = rtrim(strtr(base64_encode($enc), '+/', '-_'), '=');
				return $enc;
			}
			return $val;
		}

		function deVal($val, $key, $enc) {
			if ($enc == True) {
				$val = base64_decode(str_pad(strtr($val, '-_', '+/'), strlen($val) % 4, '=', STR_PAD_RIGHT)); 
				$imputText = $val;
				$blockSize = 128;
				$aes = new AES($imputText, $key, $blockSize);
				$dec = $aes->decrypt();
				return $dec;
			}
			return $val;
		}

		function enKey($val) {
			return $val;
		}

		function deKey($val) {
			return $val;
		}


	}
?>
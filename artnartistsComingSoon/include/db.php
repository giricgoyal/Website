<?php

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

			print_r($response);

		}


		function generateRandomString($length = 8) {
			$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$start = rand(0,strlen($str) - $length + 1);
			return substr(str_shuffle($str), $start, $length);
		}

		function getRandomId() {
			return uniqid($this->generateRandomString());
		}


		function enKey($val) {
			return $val;
		}

		function deKey($val) {
			return $val;
		}

		function enVal($val) {
			return $val;
		}

		function deVal($val) {
			return $val;
		}


	}
?>
<?php

	class dbClass {
		// variables
		private $user = "admin";
		private $password = "password";

		//methods
		//get function
		function get($serviceURL) {
			$curl = curl_init();

			curl_setopt_array(
				$curl,
				array(
					CURLOPT_URL => $serviceURL,
					CURLOPT_POST => false,
					CURLOPT_RETURNTRANSFER => true,
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


	}
?>
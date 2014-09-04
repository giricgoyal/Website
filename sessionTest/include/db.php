<?php

	class dbClass {
		// variables
		private $user = "admin";
		private $password = "password";

		//methods
		//get function
		function get($serviceURL) {
			$curl = curl_init();

			$url = $serviceURL;

			curl_setopt_array(
				$curl,
				array(
					CURLOPT_URL => $url,
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
			echo 'response ok!';
			echo $decoded->{"results"}[0]->{"username"};
			//var_dump($decoded);
		}


	}
	/*
	class dbClass {
		
		// variables
		private $user  = "admin";
		private $pwd = "VspSmU5eDnzKPVVw";

		// query variables
		private $select = "Select * from";
		
		// create select qury
		function createSelectQuery($tbl, $whr = "", $opc = "") {
			return $this->select . " " . $tbl . " " . $whr . " " . $opc;
		}

		// conect to database
		function connectToDB($host, $dbName) {
			//create connection
			$con = mysqli_connect($host, $this->user, $this->pwd, $dbName);

			// check connection
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MYSQL: " . mysqli_connect_error();
			}
			return $con;
			debugToConsole($con);
		} 

		// get all data from a specified table
		function getAllDataFromTable($con, $tableName) {
			$selectQuery = $this->createSelectQuery($tableName);
			$result = mysqli_query($con, $selectQuery);
			return $result;
		}

		// get particular data from a specified table
		function getSomeDataFromTable($con, $tableName, $whr) {
			$selectQuery = $this->createSelectQuery($tableName, $whr);
			$result = mysqli_query($con, $selectQuery);
			return $result;
		}

		// disconnect from a database
		function closeToDB($con) {
			mysqli_close($con);
		}

	}	
	*/
?>
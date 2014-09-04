<?php
	// variables
	

	// functions
	/*
	function updateCreds($uName, $pWord, $dbObj, $con, $databaseName, $userTable) {
		
		$result = $dbObj->getSomeDataFromTable($con, $userTable, "where u_name = '" . $uName . "';");
		while ($row = mysqli_fetch_array($result)) {
			if (($row['u_name'] == $uName) && ($row['u_pwd'] == $pWord)) {
				return True;
			}
		}	
		return False;
	}
	*/
	function updateCreds($dbObj) {
		$result = $dbObj->get("http://127.0.0.1:8000/artistaccount/");
		
	}
?>
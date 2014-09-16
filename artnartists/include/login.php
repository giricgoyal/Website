<?php

	include "variables.php";
	// variables
	
	function updateCreds($dbObj, $uname, $upwd) {
		$result = $dbObj->get($USER_ACCOUNT_URL . "/?". $dbObj->enKey("username") . "=" . $uname);
		if ($result != null) {
			$pwd = $result->{"results"}[0]->{$dbObj->enKey("password")};
			if ($pwd == $upwd) {
				return $result->{"results"}[0]->{$dbObj->enKey("userid")};
			}
		}
		return null;
	}
?>
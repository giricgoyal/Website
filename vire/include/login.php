<?php
	// variables
	
	function updateCreds($dbObj, $uname, $upwd) {
		$result = $dbObj->get("http://127.0.0.1:8000/useraccount/?username=" . $uname);
		if ($result != null) {
			$pwd = $result->{"results"}[0]->{"password"};
			if ($pwd == $upwd) {
				return $result->{"results"}[0]->{"userid"};
			}
		}
		return null;
	}
?>
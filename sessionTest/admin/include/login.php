<!-- Admin login.php -->

<?php
	// variables
	

	// functions
	function updateCreds($un, $pw) {
		$uName = $un;
		$pWord = $pw;
		setSession($uName);
	}

?>
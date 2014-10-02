<?php
	class Hash {
		function sha256($val) {
			return hash('sha256', $val);
		}
	}
?>
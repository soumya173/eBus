<?php
	ob_start();
	session_start();
	$referer = $_SERVER['HTTP_REFERER'];
	session_destroy();
	header("Location: $referer");
?>
<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
		//user not logged in, return to login
		header("Location: index.php");
	}
?>


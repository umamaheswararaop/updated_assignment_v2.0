<?php
ob_start();
session_start();
if(isset($_SESSION['username_admin'])) {
	session_destroy();
//	unset($_SESSION['username_admin']);
//	unset($_SESSION['user_name']);
//	unset($_SESSION['user_password']);
	header("Location: login.php");
} else {
	header("Location: login.php");
}
?>
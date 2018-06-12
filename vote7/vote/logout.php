<?php
session_start();
if (isset($_SESSION['member_id'])) {
		unset($_SESSION['member_id']);
		unset($_SESSION['type']);
		unset($_SESSION['user_name']);
		session_destroy();
	}
	if (isset($_SESSION['member_id'])) {
		unset($_SESSION['member_id']);
		unset($_SESSION['type']);
		unset($_SESSION['user_name']);
		session_destroy();
	}
	header('Location: ./index.php');
	exit;
	?>
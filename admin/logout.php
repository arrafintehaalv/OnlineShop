<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/E/core/init.php';
	unset($_SESSION['SBUser']);
	header('Loaction: login.php');
 
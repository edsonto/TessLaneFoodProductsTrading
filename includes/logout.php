<?php
	session_start();
	require 'db_connection.php';
	session_unset();
	session_destroy();
	header('location: ../');
?>
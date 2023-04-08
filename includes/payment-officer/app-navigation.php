<?php
	session_start();
	$method = $_POST['method'];
	$method();
	function fetch_name() {
		require '../db_connection.php';
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM tbl_user_secretary WHERE id = '$id'";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query);
		echo $row['lastname'];
	}
?>
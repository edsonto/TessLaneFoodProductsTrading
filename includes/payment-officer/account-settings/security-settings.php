<?php
	session_start();
	$method = $_POST['method'];
	$method();
	function fetch_username() {
		require '../../db_connection.php';
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM tbl_payment_officers WHERE id = '$id'";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query);
		echo $row['username'];
	}
	function update_username() {
		require '../../db_connection.php';
		$id = $_SESSION['id'];
		$username = $_POST['username'];
		$sql = "UPDATE tbl_payment_officers SET username = '$username' WHERE id = '$id'";
		mysqli_query($conn, $sql);
		$conn->close();
		exit();
	}
?>
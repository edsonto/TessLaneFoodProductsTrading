<?php
	session_start();
	$method = $_POST['method'];
	$method();
	function fetch_personal() {
		require '../../db_connection.php';
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM tbl_payment_officers WHERE id = '$id'";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query);
		$data = array(
			'firstname' => $row['firstname'],
			'middlename' => $row['middlename'],
			'lastname' => $row['lastname'],
			'name_extension' => $row['name_extension'],
			'gender' => $row['gender'],
			'phone' => $row['contact'],
			'email' => $row['email'],
			'address' => $row['address']
		);
		echo json_encode($data);
	}
	function update_personal() {
		require '../../db_connection.php';
		$id = $_SESSION['id'];
		$firstname = strtoupper($_POST['firstname']);
		$middlename = strtoupper($_POST['middlename']);
		$lastname = strtoupper($_POST['lastname']);
		$name_extension = strtoupper($_POST['name_extension']);
		$gender = strtoupper($_POST['gender']);
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = strtoupper($_POST['address']);
		$sql = "UPDATE tbl_payment_officers SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', name_extension = '$name_extension', gender = '$gender', contact = '$phone', email = '$email', address = '$address' WHERE id = '$id'";
		mysqli_query($conn, $sql);
		$conn->close();
		exit();
	}
?>
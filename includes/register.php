<?php
	$method = $_POST['method'];
	$method();
	function register() {
		require 'db_connection.php';
		$user_type = $_POST['user_type'];
		$firstname = strtoupper($_POST['firstname']);
		$middlename = strtoupper($_POST['middlename']);
		$lastname = strtoupper($_POST['lastname']);
		$name_suffix = strtoupper($_POST['name_suffix']);
		$gender = strtoupper($_POST['gender']);
		$birthday = $_POST['birthday'];
		$contact = $_POST['contact'];
		$address = strtoupper($_POST['address']);
		$username = $_POST['username'];
		$password = base64_encode($_POST['password']);
		$sql = '';
		if ($user_type == 'DOCTOR') {
			$sql = "INSERT INTO tbl_user_doctor (firstname, middlename, lastname, name_suffix, gender, birthday, contact, address, username, password) VALUES('$firstname', '$middlename', '$lastname', '$name_suffix', '$gender', '$birthday', '$contact', '$address', '$username', '$password')";
		} else if ($user_type == 'SECRETARY') {
			$sql = "INSERT INTO tbl_user_secretary (firstname, middlename, lastname, name_suffix, gender, birthday, contact, address, username, password) VALUES('$firstname', '$middlename', '$lastname', '$name_suffix', '$gender', '$birthday', '$contact', '$address', '$username', '$password')";
		}
		$query = mysqli_query($conn, $sql);
		$conn->close();
	}
?>
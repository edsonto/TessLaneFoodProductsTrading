<?php
	$method = $_POST['method'];
	$method();
	function login() {
		require 'db_connection.php';
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$sql1 = "SELECT * FROM tbl_payment_officers WHERE username='$user'";
		$query1 = mysqli_query($conn, $sql1);
		$location = '';
		$result = '';
		if (mysqli_num_rows($query1) > 0) {
			while($row = mysqli_fetch_assoc($query1))
			{
				$username = $row['username'];
				$password = $row['password'];
				$pwd = base64_decode($password);
				if($pass == $pwd)
				{
					$doc_id = $row['id'];
					$activity = 'LOGGED IN';
					$created_at = date('Y-m-d H:i:s');
					session_start();
					$_SESSION['guest'] = 'true';
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$result = 'success';
					$location = 'payment-officer/';
				}
				else
				{
					$result = 'failed';
					$location = '';
				}
			}
		} else {
			$result = 'failed';
			$location = '';
		}
		$data = array(
			'result' => $result,
			'location' => $location
		);
		echo json_encode($data);
	}
?>
<?php 
	session_start();
	if (isset($_SESSION['doc_guest'])) {
		header('Location: doctor/patients.php');
	} else if (isset($_SESSION['sec_guest'])) {
		header('Location: secretary/patients.php');
	}
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<title>TessLane FDT</title>
	<?php include 'layouts/app-header.php'; ?>
	<script type="text/javascript" src="js/signup.js"></script>
</head>
<body>
	<div class="col-lg-12 register-form">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 text-center">
			<h1><strong>Register</strong></h1>
			<select class="user-type">
				<option value="">User Type</option>
				<option value="DOCTOR">DOCTOR</option>
				<option value="SECRETARY">SECRETARY</option>
			</select><br><br>
			<p class="error-user-type"></p>
			<input type="text" name="firstname" class="firstname" placeholder="First Name"><br><br>
			<p class="error-firstname"></p>
			<input type="text" name="middlename" class="middlename" placeholder="Middle Name"><br><br>
			<input type="text" name="lastname" class="lastname" placeholder="Last Name"><br><br>
			<p class="error-lastname"></p>
			<input type="text" name="name_suffix" class="name-suffix" placeholder="Name Suffix (Jr, II, III)"><br><br>
			<select class="gender">
				<option value="">Gender</option>
				<option value="MALE">MALE</option>
				<option value="FEMALE">FEMALE</option>
			</select><br><br>
			<p class="error-gender"></p>
			<input type="date" name="birthday" class="birthday" placeholder="Birthday"><br><br>
			<p class="error-birthday"></p>
			<input type="number" name="contact" class="contact" placeholder="Contact"><br><br>
			<input type="text" name="address" class="address" placeholder="Address"><br><br>
			<p class="error-address"></p>
			<input type="text" name="username" class="username" placeholder="Username"><br><br>
			<p class="error-username"></p>
			<input type="password" name="password" class="password" placeholder="Password"><br><br>
			<p class="error-password"></p>
			<input type="password" name="confirm_password" class="confirm-password" placeholder="Confirm Password"><br><br>
			<p class="error-confirm-password"></p>
			<button class="register-submit">Register</button><br><br>
			<a href="./" class="btn-signup">Sign In</a><br><br>
			<div class="error"></div>
		</div>
		<div class="col-lg-3"></div>
	</div>
	<div class="circle1"></div>
	<div class="circle2"></div>
	<div class="circle3"></div>
	<div class="circle4"></div>
	<div class="circle5"></div>
	<div class="circle6"></div>
</body>
</html>
<?php 
	session_start();
	if (isset($_SESSION['auth'])) {
		header('Location: doctor/patients.php');
	} else if (isset($_SESSION['guest'])) {
		header('Location: payment-officer/');
	}
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>TessLane FDT</title>
	<?php include 'layouts/app-header.php'; ?>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
	<div class="col-lg-12 text-center company-name">
		<h1><strong>TESS-LANE FOOD PRODUCTS TRADING</strong></h1>
	</div>
	<div class="col-lg-12 login-form">
		<div class="col-lg-4"></div>
		<div class="col-lg-4 text-center">
			<div class="col-lg-12 form-group">
				<h1><strong>Welcome</strong></h1>
			</div>
			<div class="col-lg-12 form-group">
				<center><input type="text" name="username" class="form-control input-lg username" placeholder="Username"></center>
			</div>
			<div class="col-lg-12 form-group">
				<center><input type="password" name="password" class="form-control input-lg password" placeholder="Password"></center>
			</div>
			<div class="col-lg-12 form-group">
				<button class="btn btn-lg login-submit">Log In</button>
			</div>
			<div class="col-lg-12 form-group">
				<div class="error"></div>
			</div>
		</div>
		<div class="col-lg-4"></div>
	</div>
	<div class="circle1"></div>
	<div class="circle2"></div>
	<div class="circle3"></div>
	<div class="circle4"></div>
	<div class="circle5"></div>
	<div class="circle6"></div>
</body>
</html>
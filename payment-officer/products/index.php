<?php
	session_start();
	if(!isset($_SESSION['guest']))
	{
		header('Location: ../');
	}
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<html>
<head>
	<title>Products</title>
	<?php include '../../layouts/payment-officer/point-of-sales/app-header.php'; ?>
	<script type="text/javascript" src="../../js/payment-officer/products/products.js"></script>
	<script type="text/javascript" src="../../js/sweetalert/sweetalert2.all.min.js"></script>
</head>
<style type="text/css">
	html, body {
		margin: 0;
		padding: 0;
	}
</style>
<body>
	<?php include '../../layouts/payment-officer/point-of-sales/products-navigation.php'; ?>
	<div class="form-group content-data"></div>
</body>
</html>
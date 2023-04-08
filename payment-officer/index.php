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
	<title>TESS-LANE - POS</title>
</head>
<?php include '../layouts/payment-officer/app-header.php'; ?>
<script type="text/javascript" src="../js/payment-officer/point-of-sales.js"></script>
<script type="text/javascript" src="../js/sweetalert/sweetalert2.all.min.js"></script>
<style type="text/css">
	html, body {
		margin: 0;
		padding: 0;
		background-color: #57595D;
	}
	.header {
		padding: 5px;
		height: auto;
		color: #fff;
	}
	.header img {
		width: 230px;
	}
	.header .table thead tr th, .header .table tbody tr td {
		border: none;
		color: #b83a2e
	}
	.table .item-list .selected-item:hover {
		background-color: #57595D;
		cursor: pointer;
		transition: .3s;
	}
</style>
<body>
	<div class="col-lg-12 form-group header">
		<div class="col-lg-7">
			<div class="row">
				<div class="col-lg-5">
					<img src="../images/Tess-Lane.png">
				</div>
				<div class="col-lg-7">
					<div class="row">
						<div class="col-lg-6">
							<h4>User Logged on:</h4>
						</div>
						<div class="col-lg-6">
							<h4><i class="glyphicon glyphicon-user"></i> <span class="user-name"></span></h4>
						</div>
						<div class="col-lg-6">
							<h4>Date:</h4>
						</div>
						<div class="col-lg-6">
							<h4><i class="glyphicon glyphicon-calendar"></i> <span class="current-date"></span></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-5" style="background-color: #000; height: 125px; border: 2px solid #6c6d71;">
			<table class="table" style="border: none;">
				<thead>
					<tr>
						<th><h4>Grand Total</h4></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="text-align: right;"><h1><span>₱</span> <span class="grand-total" data-id="0">0.00</span></h1></td>
					</tr>
				</tbody>
			</table>		
		</div>
	</div>

	<div class="col-lg-12 form-group">
		<div class="col-lg-5 form-group">
			<div class="col-lg-12">
				<div class="row">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="glyphicon glyphicon-search"></i>
						</div>
						<input type="text" name="item" class="form-control input-lg item">
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="row">
					<h3 style="color: #fff;"><span>Quantity: </span><span class="quantity">1</span></h3>
				</div>
			</div>
			<div class="col-lg-12 form-group" style="background-color: #fff; height: 458px; border: 2px solid #000; overflow: scroll;">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Prod ID</th>
							<th>Prod Name</th>
							<th>Weight</th>
							<th>Type</th>
							<th>Price</th>
							<th>Quantity</th>
						</tr>
					</thead>
					<tbody class="item-list">
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-lg-7 form-group" style="background-color: #fff; height: 561px; border: 2px solid #000; overflow: scroll;">
			<table class="table table-default order-table">
				<thead>
					<tr>
						<th>Prod ID</th>
						<th>Prod Name</th>
						<th>Weight</th>
						<th>Type</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Sub. Total</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="order-list">
						
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-lg-12" style="margin-bottom: 50px;">
		<div class="row">
			<div class="col-lg-4 form-group">
				<button class="btn btn-default form-control btn-finish-order" style="height: 50px; background-color: #8d9096; color: #fff;"><i class="fa fa-handshake"></i> Finish</button>
			</div>
			<div class="col-lg-4 form-group" style="text-align: center; color: #fff;">
				<h4><span>Grand Total: ₱</span> <span class="grand-total">0.00</span></h4>
			</div>
			<div class="col-lg-4 form-group">
				<button class="btn btn-default form-control btn-cancel-order" style="height: 50px; background-color: #8d9096; color: #fff;"><i class="fas fa-ban"></i> Cancel</button>
			</div>
		</div>
	</div>
	<div class="col-lg-12 form-group">
		<div class="row">
			<div class="col-lg-3">
				<a href="products/" class="btn btn-default form-control" style="height: 50px; background-color: #8d9096; color: #fff; padding-top: 13px;" target="_blank"><i class="fas fa-box-open"></i> Product</a>
			</div>
			<div class="col-lg-3">
				<a href="sales" class="btn btn-default form-control" style="height: 50px; background-color: #8d9096; color: #fff; padding-top: 13px;" target="_blank"><i class="fas fa-shopping-cart"></i> Sales</a>
			</div>
			<div class="col-lg-3">
				<a href="account-settings" class="btn btn-default form-control" style="height: 50px; background-color: #8d9096; color: #fff; padding-top: 13px;" target="_blank"><i class="fas fa-user-cog"></i> Account Settings</a>
			</div>
			<div class="col-lg-3">
				<a href="../includes/logout.php" class="btn btn-default form-control" style="height: 50px; background-color: #b15050; color: #fff; padding-top: 13px;"><i class="fas fa-sign-out-alt"></i> Log Out</a>
			</div>
		</div>
	</div>
</body>
</html>
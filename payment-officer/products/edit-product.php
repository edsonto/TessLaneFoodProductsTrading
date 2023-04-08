<?php
	require '../../includes/db_connection.php';
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_products WHERE id = '$id'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);
?>
<style type="text/css">
	.form-control {
		border-left: 0;
		border-right: 0;
		border-top: 0;
		border-bottom: 2px solid gray;
		box-shadow: none;
		border-radius: 0;
	}
</style>
<script type="text/javascript" src="../../js/payment-officer/products/products-list.js"></script>
<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-lg-12">
			<div class="col-lg-12 form-group">
				<h4>Edit Product</h4>
			</div>
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4 form-group">
						<label>Product ID:</label>
						<input type="text" name="product_id" class="form-control edit-product-id input-lg" value="<?php echo $row['product_id']; ?>">
					</div>
					<div class="col-lg-4 form-group">
						<label>Product Name:</label>
						<input type="text" name="product_name" class="form-control edit-product-name input-lg" value="<?php echo $row['product_name']; ?>">
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4 form-group">
						<label>Weight(g):</label>
						<input type="number" name="weight" class="form-control edit-weight input-lg" value="<?php echo $row['weight']; ?>">
					</div>
					<div class="col-lg-4 form-group">
						<label>Type:</label>
						<input type="text" name="type" class="form-control edit-type input-lg" value="<?php echo $row['type']; ?>">
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4 form-group">
						<label>Price:</label>
						<input type="number" name="price" class="form-control edit-price input-lg" value="<?php echo $row['price']; ?>">
					</div>
					<div class="col-lg-4 form-group">
						<label>Quantity:</label>
						<input type="number" name="quantity" class="form-control edit-quantity input-lg" value="<?php echo $row['quantity']; ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-4"></div>
				<div class="col-lg-4 text-right">
					<button class="btn btn-primary btn-update" data-id="<?php echo $row['id']; ?>">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
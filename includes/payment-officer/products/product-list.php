<?php
	session_start();
	$method = $_POST['method'];
	$method();
	function fetch() {
		require '../../db_connection.php';
		$name = $_POST['name'];
		$sql = '';
		if ($name == '') {
			$sql = "SELECT * FROM tbl_products ORDER BY id DESC";
		} else {
			$sql = "SELECT * FROM tbl_products WHERE product_name LIKE '%".$name."%' OR product_id LIKE '%".$name."%' ORDER BY id DESC";
		}
		$query = mysqli_query($conn, $sql);
		$html = '<table class="table table-bordered">
			<thead>
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Weight(g)</th>
					<th>Type</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Action</th>
			</thead>
			<tbody>
		';
		while ($row = mysqli_fetch_assoc($query)) {
			if ($row['quantity'] == 0) {
				$html .= '
					<tr style="background-color: #cc3300;">
						<td class="product-id'.$row['id'].'" data-id="'.$row['product_id'].'">'.$row['product_id'].'</td>
						<td class="product-name'.$row['id'].'" data-id="'.$row['product_name'].'">'.$row['product_name'].'</td>
						<td class="weight'.$row['id'].'" data-id="'.$row['weight'].'">'.$row['weight'].'</td>
						<td class="type'.$row['id'].'" data-id="'.$row['type'].'">'.$row['type'].'</td>
						<td class="price'.$row['id'].'" data-id="'.$row['price'].'" style="text-align: right;">'.number_format($row['price'], 2).'</td>
						<td class="quantity'.$row['id'].'" data-id="'.$row['quantity'].'">Out of stock</td>
						<td class="text-center">
							<button class="btn btn-primary btn-edit-product" data-id="'.$row['id'].'"><i class="fa fa-edit"></i></button>
							<button class="btn btn-danger btn-delete-product" data-id="'.$row['id'].'"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
				';
			} else if ($row['quantity'] <= 20) {
				$html .= '
					<tr style="background-color: #ff9966;">
						<td class="product-id'.$row['id'].'" data-id="'.$row['product_id'].'">'.$row['product_id'].'</td>
						<td class="product-name'.$row['id'].'" data-id="'.$row['product_name'].'">'.$row['product_name'].'</td>
						<td class="weight'.$row['id'].'" data-id="'.$row['weight'].'">'.$row['weight'].'</td>
						<td class="type'.$row['id'].'" data-id="'.$row['type'].'">'.$row['type'].'</td>
						<td class="price'.$row['id'].'" data-id="'.$row['price'].'" style="text-align: right;">'.number_format($row['price'], 2).'</td>
						<td class="quantity'.$row['id'].'" data-id="'.$row['quantity'].'">'.$row['quantity'].'</td>
						<td class="text-center">
							<button class="btn btn-primary btn-edit-product" data-id="'.$row['id'].'"><i class="fa fa-edit"></i></button>
							<button class="btn btn-danger btn-delete-product" data-id="'.$row['id'].'"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
				';
			} else {
				$html .= '
					<tr>
						<td class="product-id'.$row['id'].'" data-id="'.$row['product_id'].'">'.$row['product_id'].'</td>
						<td class="product-name'.$row['id'].'" data-id="'.$row['product_name'].'">'.$row['product_name'].'</td>
						<td class="weight'.$row['id'].'" data-id="'.$row['weight'].'">'.$row['weight'].'</td>
						<td class="type'.$row['id'].'" data-id="'.$row['type'].'">'.$row['type'].'</td>
						<td class="price'.$row['id'].'" data-id="'.$row['price'].'" style="text-align: right;">'.number_format($row['price'], 2).'</td>
						<td class="quantity'.$row['id'].'" data-id="'.$row['quantity'].'">'.$row['quantity'].'</td>
						<td class="text-center">
							<button class="btn btn-primary btn-edit-product" data-id="'.$row['id'].'"><i class="fa fa-edit"></i></button>
							<button class="btn btn-danger btn-delete-product" data-id="'.$row['id'].'"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
				';
			}
		}
		$html .= '
			</tbody>
		</table>';
		echo $html;
	}
	
	function save() {
		require '../../db_connection.php';
		$product_id = $_POST['product_id'];
		$product_name = strtoupper($_POST['product_name']);
		$weight = $_POST['weight'];
		$type = strtoupper($_POST['type']);
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$sql = "INSERT INTO tbl_products(product_id, product_name, weight, type, price, quantity) VALUES ('$product_id', '$product_name', '$weight', '$type', '$price', '$quantity')";
		$query = mysqli_query($conn, $sql);
		$conn->close();
		exit();
	}
	function update() {
		require '../../db_connection.php';
		$id = $_POST['id'];
		$product_id = $_POST['product_id'];
		$product_name = strtoupper($_POST['product_name']);
		$weight = $_POST['weight'];
		$type = strtoupper($_POST['type']);
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$sql = "UPDATE tbl_products SET product_id = '$product_id', product_name = '$product_name', weight = '$weight', type = '$type', price = '$price', quantity = '$quantity' WHERE id = $id";
		$query = mysqli_query($conn, $sql);
		$conn->close();
		exit();
	}
	function remove() {
		require '../../db_connection.php';
		$id = $_POST['id'];
		$sql = "DELETE FROM tbl_products WHERE id = '$id'";
		$query = mysqli_query($conn, $sql);
		$conn->close();
		exit();
	}
?>
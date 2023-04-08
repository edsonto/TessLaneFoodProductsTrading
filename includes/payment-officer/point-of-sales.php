<?php
	session_start();
	$method = $_POST['method'];
	$method();
	function fetch_user() {
		require '../db_connection.php';
		date_default_timezone_set("Asia/Manila");
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM tbl_payment_officers WHERE id = '$id'";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query);
		$name = $row['firstname'].' '.$row['lastname'].' '.$row['name_extension'];
		$currentDate = date('M d, Y h:i A');
		$data = array(
			'name' => $name,
			'currentDate' => $currentDate
		);
		echo json_encode($data);
		$conn->close();
	}
	function search_products() {
		require '../db_connection.php';
		$item = $_POST['item'];
		$sql = "SELECT * FROM tbl_products WHERE product_id LIKE '%".$item."%' OR product_name LIKE '%".$item."%' ORDER BY product_name ASC";
		$query = mysqli_query($conn, $sql);
		$html = '';
		if (mysqli_num_rows($query) > 0) {
			while($row = mysqli_fetch_assoc($query)) {
				$html .= '
				<tr class="selected-item" data-id1="'.$row['id'].'" data-id2="'.$row['product_id'].'" data-id3="'.$row['product_name'].'" data-id4="'.$row['weight'].'" data-id5="'.$row['type'].'" data-id6="'.$row['price'].'" data-id7="'.$row['quantity'].'">
					<td>'.$row['product_id'].'</td>
					<td>'.$row['product_name'].'</td>
					<td>'.$row['weight'].'</td>
					<td>'.$row['type'].'</td>
					<td>'.$row['price'].'</td>
					<td>'.$row['quantity'].'</td>
				</tr>';
			}
		} else {
			$html = '<tr>
				<td colspan="6">NO DATA FOUND.</td>
			</tr>';
		}
		echo $html;
		$conn->close();
	}
	function save_order() {
		require '../db_connection.php';
		$id = $_POST['id'];
		$product_id = $_POST['product_id'];
		$product_name = $_POST['product_name'];
		$weight = $_POST['weight'];
		$type = $_POST['type'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$subTotal = $_POST['subTotal'];
		$cash = $_POST['cash'];
		$transaction_date = date('Y-m-d');
		$error = 0;

		if ($conn->connect_error) {
			die('Database connection failed: '.$conn->connect_error);
			$error = 1;
		} else {
			$sql = "SELECT receipt_number FROM tbl_sales ORDER BY receipt_number DESC";
			$query = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($query);
			$receipt_number = '';
			if(mysqli_num_rows($query) > 0)
			{
				$receipt_row = mysqli_fetch_assoc($query);
				$receipt_number = floatval($row['receipt_number'])+1;
			}
			else
			{
				$receipt_number = 100001;
			}

			for($count = 0; $count < count($product_name); $count ++) {
				$clean_id = mysqli_real_escape_string($conn, strtoupper($id[$count]));
				$clean_product_id = mysqli_real_escape_string($conn, strtoupper($product_id[$count]));
				$clean_product_name = mysqli_real_escape_string($conn, strtoupper($product_name[$count]));
				$clean_weight = mysqli_real_escape_string($conn, strtoupper($weight[$count]));
				$clean_type = mysqli_real_escape_string($conn, strtoupper($type[$count]));
				$clean_price = mysqli_real_escape_string($conn, strtoupper($price[$count]));
				$clean_quantity = mysqli_real_escape_string($conn, strtoupper($quantity[$count]));
				$clean_subTotal = mysqli_real_escape_string($conn, strtoupper($subTotal[$count]));
				$clean_cash = mysqli_real_escape_string($conn, $cash);
				$clean_receipt_number = mysqli_real_escape_string($conn, $receipt_number);
				$sql2 = "INSERT INTO tbl_sales(prd_id, transaction_date, product_id, product_name, weight, type, price, quantity, subTotal, cash, receipt_number) VALUES('$clean_id', '$transaction_date', '$clean_product_id', '$clean_product_name', '$clean_weight', '$clean_type', '$clean_price', '$clean_quantity', '$clean_subTotal', '$clean_cash', '$clean_receipt_number')";
				$query2 = mysqli_query($conn, $sql2);

				$sql3 = "UPDATE tbl_products SET quantity = quantity - '$clean_quantity' WHERE id = '$clean_id'";
				$query3 = mysqli_query($conn, $sql3);
				$error = 0;
			}
			$conn->close();
		}
		echo $error;
	}
?>
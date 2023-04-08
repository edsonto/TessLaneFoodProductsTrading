<?php
	session_start();
	$method = $_POST['method'];
	$method();
	function fetch() {
		require '../../db_connection.php';
		$rno = $_POST['rno'];
		$sql = "SELECT DISTINCT(receipt_number), (created_at), (cash) FROM tbl_sales WHERE receipt_number = '$rno'";
		$query = mysqli_query($conn, $sql);

		$sql3 = "SELECT SUM(subtotal) AS grand_total FROM tbl_sales WHERE receipt_number = '$rno'";
		$query3 = mysqli_query($conn, $sql3);
		$row3 = mysqli_fetch_assoc($query3);

		$html = '';
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_assoc($query);
			$date = strtotime($row['created_at']);
			$html .= '
				<div class="col-lg-12">
				<h4>Receipt No.: '.$row['receipt_number'].'</h4>
				<h4>Date: '.date('d M Y, h:i A', $date).'</h4>
				<h4>Cash: ₱ '.number_format($row['cash'], 2).'</h4>
				<h4>Grand Total: ₱ '.number_format($row3['grand_total'], 2).'</h4>
			';
			$html .= '<table class="table">
				<thead>
					<tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Weight</th>
						<th>Type</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
			';
			$sql2 = "SELECT * FROM tbl_sales WHERE receipt_number = '$rno'";
			$query2 = mysqli_query($conn, $sql2);
			while ($row2 = mysqli_fetch_assoc($query2)) {
				$html .= '
					<tr>
						<td>'.$row2['product_id'].'</td>
						<td>'.$row2['product_name'].'</td>
						<td>'.$row2['weight'].'</td>
						<td>'.$row2['type'].'</td>
						<td style="text-align: right;">₱ '.number_format($row2['price'], 2).'</td>
						<td>'.$row2['quantity'].'</td>
						<td style="text-align: right;">₱ '.number_format($row2['subtotal'], 2).'</td>
					<tr>
				';
			}
			$html .= '
					<tr>
						<td style="text-align: right;" colspan="6">Grand Total:</td>
						<td style="text-align: right;">₱ '.number_format($row3['grand_total'], 2).'</td>
					</tr>
				</tbody>
				</table>
				</div>
			';
		}
		echo $html;
	}
?>
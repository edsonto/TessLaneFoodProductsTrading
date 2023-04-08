<?php
	session_start();
	$method = $_POST['method'];
	$method();
	function fetch() {
		require '../../db_connection.php';
		$date_from = $_POST['date_from'];
		$date_to = $_POST['date_to'];
		$sql = '';
		if ($date_from == '' AND $date_to == '') {
			$sql = "SELECT DISTINCT (receipt_number) FROM tbl_sales ORDER BY id DESC";
		} else {
			$sql = "SELECT DISTINCT(receipt_number) FROM tbl_sales WHERE date(transaction_date) BETWEEN '$date_from' AND '$date_to' ORDER BY id DESC";
		}
		$query = mysqli_query($conn, $sql);
		$html = '
			<h4><span class="dFrom" data-id=""></span> All Records <span class="dTo" data-id=""></span></h4>
			<table class="table table-bordered">
			<thead>
				<tr>
					<th>Receipt No.</th>
					<th>Total Value</th>
					<th>Date</th>
			</thead>
			<tbody>
		';
		while($row = mysqli_fetch_assoc($query)) {
			$rno = $row['receipt_number'];
			$sql1 = "SELECT DISTINCT(created_at) FROM tbl_sales WHERE receipt_number = '$rno'";
			$query1 = mysqli_query($conn, $sql1);
			$row1 = mysqli_fetch_assoc($query1);
			$date = strtotime($row1['created_at']);
			$sql2 = "SELECT SUM(subtotal) AS grand_total FROM tbl_sales WHERE receipt_number='$rno'";
			$query2 = mysqli_query($conn, $sql2);
			$row2 = mysqli_fetch_assoc($query2); 
			$html .= '
				<tr>
					<td><button class="btn btn-link btn-view-transaction" data-id="'.$row['receipt_number'].'">'.$row['receipt_number'].'</button></td>
					<td>₱ '.number_format($row2['grand_total'], 2).'</td>
					<td>'.date('d M Y, h:i A', $date).'</td>
				</tr>
			';
		}
		$html .= '
			</tbody>
		</table>';
		echo $html;
	}
	function fetch_statistics() {
		require '../../db_connection.php';
		$title = 'All Sales';
		$num = 0;
		$xsum = 0;
		$ysum = 0;
		$xysum = 0;
		$month = 0;
		$counter = 0;
		$xsquaredsum = 0;
		$monthName = '';
		$html = '';
		$html2 = '';
		$html3 = '';
		$sql = "SELECT * FROM tbl_sales";
		$query = mysqli_query($conn, $sql);
		if (mysqli_num_rows($query) > 0) {
				$sql2 = "SELECT DISTINCT MONTH(transaction_date) AS month FROM tbl_sales";
				$query2 = mysqli_query($conn, $sql2);
				if (mysqli_num_rows($query2) > 1) {
					$html .= '
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>Month (x)</td>
									<td>Data (y)</td>
								</tr>
							</thead>
							<tbody>
					';
					$html2 .= '
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>Month (x)</td>
									<td>Data (y)</td>
								</tr>
							</thead>
							<tbody>
					';
					$html3 .= '
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>Month (x)</td>
									<td>Data (y)</td>
								</tr>
							</thead>
							<tbody>
					';
					while ($row2 = mysqli_fetch_assoc($query2)) {
						$month = $row2['month'];
						if ($row2['month'] == 1) {
							$monthName = 'January';
						} else if ($row2['month'] == 2) {
							$monthName = 'February';
						} else if ($row2['month'] == 3) {
							$monthName = 'March';
						} else if ($row2['month'] == 4) {
							$monthName = 'April';
						} else if ($row2['month'] == 5) {
							$monthName = 'May';
						} else if ($row2['month'] == 6) {
							$monthName = 'June';
						} else if ($row2['month'] == 7) {
							$monthName = 'July';
						} else if ($row2['month'] == 8) {
							$monthName = 'August';
						} else if ($row2['month'] == 9) {
							$monthName = 'September';
						} else if ($row2['month'] == 10) {
							$monthName = 'October';
						} else if ($row2['month'] == 11) {
							$monthName = 'November';
						} else if ($row2['month'] == 12){
							$monthName = 'December';
						}
						$sql3 = "SELECT SUM(price) AS prc FROM tbl_sales WHERE MONTH(transaction_date) = '$month'";
						$query3 = mysqli_query($conn, $sql3);
						$row3 = mysqli_fetch_assoc($query3);
						$num = $num + 1;
						$labels[] = $monthName;
						$count[] = $row3['prc'];

						// xy
						$xy = $num * $row3['prc'];
						// xsquared
						$xsquared = $num * $num;
						// sum of x
						$xsum = $xsum + $num;
						// x bar
						$xbar = $xsum / $num;
						// sum of y
						$ysum = $ysum + $row3['prc'];
						// y bar
						$ybar = $ysum / $num;

						$xysum = $xysum + $xy;

						$xsquaredsum = $xsquaredsum + $xsquared;
						$html .= '
							<tr>
								<td>'.$monthName.'</td>
								<td>'.$row3['prc'].'</td>
							</tr>
						';

					}
					
				$b1 = $num * $xbar * $ybar;
				$b2 = $xysum - $b1;

				$b3 = $xbar * $xbar;
				$b4 = $num * $b3;
				$b5 = $xsquaredsum - $b4;

				$b = $b2 / $b5;

				$a1 = $b * $xbar;

				$a = $ybar - $a1;
				$num2 = 0;
				$num3 = 0;
				if ($month == 1) {
					$counter = 11;
				} else if ($month == 2) {
					$counter = 10;
				} else if ($month == 3) {
					$counter = 9;
				} else if ($month == 4) {
					$counter = 8;
				} else if ($month == 5) {
					$counter = 7;
				} else if ($month == 6) {
					$counter = 6;
				} else if ($month == 7) {
					$counter = 5;
				} else if ($month == 8) {
					$counter = 4;
				} else if ($month == 9) {
					$counter = 3;
				} else if ($month == 10) {
					$counter = 2;
				} else if ($month == 11) {
					$counter = 1;
				} else if ($month == 12) {
					$counter = 0;
				}
				if ($counter != 0) {
					for ($i=0; $i < $counter; $i++) {
						$num = $num + 1;
						$num2 = $num2 + 1;
						$month2 = $month + $num2;

						if ($month2 > 12) {
							$month = 1;
							$num2 = 0;
							$month2 = $month;
						}
						
						// $monthName2 = '';
						if ($month2 == 1) {
							$monthName2 = '(Jan)';
						} else if ($month2 == 2) {
							$monthName2 = '(Feb)';
						} else if ($month2 == 3) {
							$monthName2 = '(Mar)';
						} else if ($month2 == 4) {
							$monthName2 = '(Apr)';
						} else if ($month2 == 5) {
							$monthName2 = '(May)';
						} else if ($month2 == 6) {
							$monthName2 = '(Jun)';
						} else if ($month2 == 7) {
							$monthName2 = '(Jul)';
						} else if ($month2 == 8) {
							$monthName2 = '(Aug)';
						} else if ($month2 == 9) {
							$monthName2 = '(Sep)';
						} else if ($month2 == 10) {
							$monthName2 = '(Oct)';
						} else if ($month2 == 11) {
							$monthName2 = '(Nov)';
						} else if ($month2 == 12){
							$monthName2 = '(Dec)';
						}

						$y1 = $b * $num;
						$y = $a + $y1;
						$html2 .= '
								<tr>
									<td>'.$num.' '.$monthName2.'</td>
									<td>'.$y.'</td>
								</tr>
						';
					}
				}
				for ($j=0; $j < 12; $j++) {
					$num = $num + 1;
					$num2 = $num2 + 1;
					$month2 = $month + $num2;

					if ($month2 > 12) {
						$month = 1;
						$num2 = 0;
						$month2 = $month;
					}
					
					// $monthName2 = '';
					if ($month2 == 1) {
						$monthName2 = '(Jan)';
					} else if ($month2 == 2) {
						$monthName2 = '(Feb)';
					} else if ($month2 == 3) {
						$monthName2 = '(Mar)';
					} else if ($month2 == 4) {
						$monthName2 = '(Apr)';
					} else if ($month2 == 5) {
						$monthName2 = '(May)';
					} else if ($month2 == 6) {
						$monthName2 = '(Jun)';
					} else if ($month2 == 7) {
						$monthName2 = '(Jul)';
					} else if ($month2 == 8) {
						$monthName2 = '(Aug)';
					} else if ($month2 == 9) {
						$monthName2 = '(Sep)';
					} else if ($month2 == 10) {
						$monthName2 = '(Oct)';
					} else if ($month2 == 11) {
						$monthName2 = '(Nov)';
					} else if ($month2 == 12){
						$monthName2 = '(Dec)';
					}

					$y1 = $b * $num;
					$y = $a + $y1;
					$html3 .= '
							<tr>
								<td>'.$num.' '.$monthName2.'</td>
								<td>'.$y.'</td>
							</tr>
					';
				}
				$html .= '
						</tbody>
					</table>
				';
				$html2 .= '
						</tbody>
					</table>
				';
				$html3 .= '
						</tbody>
					</table>
				';
				} else {
					$title = 'Sales cannot predict';
					$labels[] = (0);
					$count[] = (0);
				}
			
		} else {
			$title = 'Sales cannot predict';
			$labels[] = (0);
			$count[] = (0);
		}
		$data = array(
			'title' => $title,
			'labels' => $labels,
			'count' => $count,
			'html' => $html,
			'html2' => $html2,
			'html3' => $html3
		);		
		echo json_encode($data);
	}
?>
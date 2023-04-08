<?php
	require '../../plugins/fpdf/fpdf.php';
	class myPDF extends FPDF {
		function header() {
			
		}
		function headerTable() {
			$dfrom = $_GET['dfrom'];
			$dto = $_GET['dto'];

			$this->Image('../../images/logo.png',93,5,25);
			$this->SetFont('Arial','B', 15);
			$this->Text(65, 35,'Tess-Lane Food Product Trading');
			$this->SetFont('Arial','', 10);
			$this->text(85, 40, 'San Jose del Monte, Bulacan');
			$this->SetFont('Arial','B', 15);
			$this->text(87, 50, 'SALES REPORT');

			$this->Ln(55);
			if ($dfrom == '' AND $dto == '') {
				$this->SetFont('Arial','B', 15);
				$this->cell(190, 10, 'Overall Sales', 1, 0, 'C');
			} else {
				$this->SetFont('Arial','B', 15);
				$this->cell(190, 10, date('M d, Y', strtotime($dfrom)).' to '.date('M d, Y', strtotime($dto)), 1, 0, 'C');
			}
			$this->Ln();
			$this->SetFont('Arial', '', 8);
			$this->Cell(20, 10, 'Receipt No.', 1, 0, 'C');
			$this->Cell(20, 10, 'Product ID', 1, 0, 'C');
			$this->Cell(48, 10, 'Product Name', 1, 0, 'C');
			$this->Cell(12, 10, 'Weight', 1, 0, 'C');
			$this->Cell(30, 10, 'Type', 1, 0, 'C');
			$this->Cell(20, 10, 'Price', 1, 0, 'C');
			$this->Cell(15, 10, 'Quantity', 1, 0, 'C');
			$this->Cell(25, 10, 'Subtotal', 1, 0, 'C');
			$this->Ln();
		}
		function viewTable() {
			require '../../includes/db_connection.php';
			$this->SetFont('Arial', '', 8);
			$dfrom = $_GET['dfrom'];
			$dto = $_GET['dto'];
			$sql = '';
			$total = 0;
			if ($dfrom == '' && $dto == '') {
				$sql = "SELECT * FROM tbl_sales ORDER BY id DESC";
			} else {
				$sql = "SELECT * FROM tbl_sales WHERE date(transaction_date) BETWEEN '$dfrom' AND '$dto' ORDER BY id DESC";
			}
			$query = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$total = $total + $row['subtotal'];
				$this->SetFont('Arial', '', 8);
				$this->Cell(20, 10, $row['receipt_number'], 1, 0, 'C');
				$this->Cell(20, 10, $row['product_id'], 1, 0, 'C');
				$this->Cell(48, 10, $row['product_name'], 1, 0, 'C');
				$this->Cell(12, 10, $row['weight'], 1, 0, 'C');
				$this->Cell(30, 10, $row['type'], 1, 0, 'C');
				$this->Cell(20, 10, number_format($row['price'], 2), 1, 0, 'R');
				$this->Cell(15, 10, $row['quantity'], 1, 0, 'C');
				$this->Cell(25, 10, number_format($row['subtotal'], 2), 1, 0, 'R');
				$this->Ln();
			}
			$this->SetFont('Arial', 'B', 15);
			$this->Cell(165, 15,'Total:', '', 0, 'L');
			$this->Cell(25, 15, 'Php '.number_format($total, 2), '', 0, 'R');
		}
	}
	
	

	$pdf = new myPDF();
	$pdf->AddPage();
	
	$pdf->headerTable();
	$pdf->viewTable();
	$pdf->SetTitle('Sales Report', 1);
	$pdf->Output();
?>
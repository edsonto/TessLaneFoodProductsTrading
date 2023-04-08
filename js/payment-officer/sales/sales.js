$(document).ready(function() {
	$('.content-data').load('sales-list.php');
	$(document).on('click', '.btn-view-transaction', function() {
		var rno = $(this).data('id');
		$('.content-data').load('view-transaction.php?rno='+rno);
	})
	$(document).on('click', '.btn-sales-list', function() {
		$('.content-data').load('sales-list.php');
	})
})
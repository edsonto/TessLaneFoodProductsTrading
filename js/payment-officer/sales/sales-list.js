$(document).ready(function() {
	function fetch(date_from='', date_to='') {
		var method = 'fetch'
		$.ajax({
			type: 'POST',
			data: {
				method: method,
				date_from: date_from,
				date_to: date_to
			},
			url: '../../includes/payment-officer/sales/sales-list.php',
			success: function(data) {
				$('.sales-list').html(data)
			}
		})
	}
	fetch()
	function search_record() {
		$(document).on('click', '.btn-search', function() {
			var date_from = $('.date-from').val()
			var date_to = $('.date-to').val()
			if (date_from == '' || date_to == '') {

			} else {
				fetch(date_from, date_to)
			}
		})
	} search_record()
	function print_sales() {
		$(document).on('click', '.btn-print-record', function() {
			var method = 'print_sales'
			var date_from = $('.date-from').val()
			var date_to = $('.date-to').val()
			window.open('print-sales.php?dfrom='+date_from+'&dto='+date_to, '_blank')
		})
	} print_sales()
	function fetchStatistics() {
		$(document).on('click', '.btn-statistics', function() {
			$('.content-data').load('statistics.php');
		})
	} fetchStatistics()
})
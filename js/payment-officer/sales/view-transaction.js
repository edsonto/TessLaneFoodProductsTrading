$(document).ready(function() {
	function fetch() {
		var method = 'fetch'
		var rno = $('.rno').data('id')
		$.ajax({
			type: 'POST',
			data: {
				method: method,
				rno: rno
			},
			url: '../../includes/payment-officer/sales/view-transaction.php',
			success: function(data) {
				$('.transaction-details').html(data)
			}
		})
	} fetch()
})
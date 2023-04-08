$(document).ready(function() {
	function fetch_name() {
		var method = 'fetch_name'
		var id = $('.name').data('id')
		$.ajax({
			type: 'POST',
			data: {
				method: method,
				id: id
			},
			url: '../includes/payment-officer/app-navigation.php',
			success: function(data) {
				$('.name').html(data);
			}
		})
	}
	fetch_name()
})
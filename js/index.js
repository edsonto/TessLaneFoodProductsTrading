$(document).ready(function() {
	function login() {
		$('.login-submit').click(function() {
			var method = 'login'
			var username = $('.username').val()
			var password = $('.password').val()
			$.ajax({
				type: 'POST',
				data: {
					method: method,
					username: username,
					password: password
				},
				url: 'includes/login.php',
				dataType: 'JSON',
				success: function(data) {
					if (data.result == 'success') {
						window.location.href = data.location;
					} else {
						$('.error').html('<div class="alert alert-danger">'+
			 			'<strong>Denied!</strong> Invalid username or password.'+
						'</div>')
					}
				}
			})
		})
	}	
	login()
	$('input').focus(function() {
		$('.error').html('');
	})
})
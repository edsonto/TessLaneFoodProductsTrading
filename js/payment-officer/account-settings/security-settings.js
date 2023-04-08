$(document).ready(function() {
	function fetch_username() {
		var method = 'fetch_username';
		$.ajax({
			type: 'POST',
			data: {
				method: method
			},
			url: '../../includes/payment-officer/account-settings/security-settings.php',
			success: function(data) {
				$('.username').val(data);
			}
		})
	} fetch_username();
	function update_username() {
		var error_username = false;
		$('.username').focusout(function() {
			check_username()
		})
		function check_username() {
			var username = $('.username').val();
			if (username == '') {
				$('.username').css('border-bottom', 'solid 3px red');
				error_username = true;
			} else {
				$('.username').css('border-bottom', 'solid 3px green');
				error_username = false;
			}
		}
		$('.btn-update-username').click(function() {
			var username = $('.username').val();
			var method = 'update_username'
			check_username()
			if (error_username === false) {
				$.ajax({
					type: 'POST',
					data: {
						method: method,
						username: username
					},
					url: '../../includes/payment-officer/account-settings/security-settings.php',
					success: function(data) {
					},
					error: function() {
						Swal.fire({
							type: 'error',
							title: 'Error...',
							text: 'Unexpected error'
						});
					},
					complete: function() {
						fetch_username()
						Swal.fire(
						  'Good job!',
						  'Username Updated!',
						  'success'
						)
					}
				})
			}
		})
	} update_username();

	// function update_personal() {
	// 	var error_firstname = false;
	// 	var error_lastname = false;
	// 	var error_gender = false;
	// 	var error_phone = false;
	// 	var error_email = false;
	// 	var error_address = false;

	// 	$('.firstname').focusout(function() {
	// 		check_firstname()
	// 	})
	// 	function check_firstname() {
	// 		var firstname = $('.firstname').val();
	// 		if (firstname == '') {
	// 			$('.firstname').css('border-bottom', 'solid 3px red');
	// 			error_firstname = true;
	// 		} else {
	// 			$('.firstname').css('border-bottom', 'solid 3px green');
	// 			error_firstname = false;
	// 		}
	// 	}
	// 	$('.lastname').focusout(function() {
	// 		check_lastname()
	// 	})
	// 	function check_lastname() {
	// 		var lastname = $('.lastname').val();
	// 		if (lastname == '') {
	// 			$('.lastname').css('border-bottom', 'solid 3px red');
	// 			error_lastname = true;
	// 		} else {
	// 			$('.lastname').css('border-bottom', 'solid 3px green');
	// 			error_lastname = false;
	// 		}
	// 	}
	// 	$('.gender').focusout(function() {
	// 		check_gender()
	// 	})
	// 	function check_gender() {
	// 		var gender = $('.gender').val();
	// 		if (gender == '') {
	// 			$('.gender').css('border-bottom', 'solid 3px red');
	// 			error_gender = true;
	// 		} else {
	// 			$('.gender').css('border-bottom', 'solid 3px green');
	// 			error_gender = false;
	// 		}
	// 	}
	// 	$('.phone').focusout(function() {
	// 		check_phone()
	// 	})
	// 	function check_phone() {
	// 		var phone = $('.phone').val();
	// 		if (phone == '') {
	// 			$('.phone').css('border-bottom', 'solid 3px red');
	// 			error_phone = true;
	// 		} else {
	// 			$('.phone').css('border-bottom', 'solid 3px green');
	// 			error_phone = false;
	// 		}
	// 	}
	// 	$('.email').focusout(function() {
	// 		check_email()
	// 	})
	// 	function check_email() {
	// 		var email = $('.email').val();
	// 		if (email == '') {
	// 			$('.email').css('border-bottom', 'solid 3px red');
	// 			error_email = true;
	// 		} else {
	// 			$('.email').css('border-bottom', 'solid 3px green');
	// 			error_email = false;
	// 		}
	// 	}
	// 	$('.address').focusout(function() {
	// 		check_address()
	// 	})
	// 	function check_address() {
	// 		var address = $('.address').val();
	// 		if (address == '') {
	// 			$('.address').css('border-bottom', 'solid 3px red');
	// 			error_address = true;
	// 		} else {
	// 			$('.address').css('border-bottom', 'solid 3px green');
	// 			error_address = false;
	// 		}
	// 	}
	// 	$('.btn-update').click(function() {
	// 		var firstname = $('.firstname').val();
	// 		var middlename = $('.middlename').val();
	// 		var lastname = $('.lastname').val();
	// 		var name_extension = $('.name-extension').val();
	// 		var gender = $('.gender').val();
	// 		var phone = $('.phone').val();
	// 		var email = $('.email').val();
	// 		var address = $('.address').val();
	// 		var method = 'update_personal'
	// 		check_firstname()
	// 		check_lastname()
	// 		check_gender()
	// 		check_phone()
	// 		check_email()
	// 		check_address()
	// 		if (error_firstname === false && error_lastname === false && error_gender === false && error_phone === false && error_email === false && error_address === false) {
	// 			$.ajax({
	// 				type: 'POST',
	// 				data: {
	// 					method: method,
	// 					firstname: firstname,
	// 					middlename: middlename,
	// 					lastname: lastname,
	// 					name_extension: name_extension,
	// 					gender: gender,
	// 					phone: phone,
	// 					email: email,
	// 					address: address
	// 				},
	// 				url: '../../includes/payment-officer/account-settings/personal-settings.php',
	// 				success: function(data) {
	// 				},
	// 				error: function() {
	// 					Swal.fire({
	// 						type: 'error',
	// 						title: 'Error...',
	// 						text: 'Unexpected error'
	// 					});
	// 				},
	// 				complete: function() {
	// 					fetch_personal()
	// 					Swal.fire(
	// 					  'Good job!',
	// 					  'Personal Information Updated!',
	// 					  'success'
	// 					)
	// 				}
	// 			})
	// 		}
	// 	})
	// } update_personal();
	function fetch_security() {
		$('.btn-security').click(function() {
			$('.content-data').load('security-settings.php');
		})
	} fetch_security()
})
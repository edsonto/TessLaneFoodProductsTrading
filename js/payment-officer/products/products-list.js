$(document).ready(function() {
	function fetch(name='') {
		var method = 'fetch'
		$.ajax({
			type: 'POST',
			data: {
				method: method,
				name: name
			},
			url: '../../includes/payment-officer/products/product-list.php',
			success: function(data) {
				$('.product-list').html(data)
			}
		})
	}
	fetch()
	function search() {
		$('.product').keyup(function() {
			var name = $(this).val()
			fetch(name)
		})
	}
	search()

	$('.btn-add-product').on('click', function() {
		$('.content-data').load('new-product.php');
	})
	$(document).on('click', '.btn-edit-product', function() {
		var id = $(this).data('id');
		$('.content-data').load('edit-product.php?id='+id);
	})
	$('.btn-product-list').on('click', function() {
		$('.content-data').load('product-list.php');
	})

	function save() {
		var error_product_id = false;
		var error_product_name = false;
		var error_weight = false;
		var error_type = false;
		var error_price = false;
		var error_quantity = false;

		$('.product-id').focusout(function() {
			check_product_id()
		})
		function check_product_id() {
			var product_id = $('.product-id').val();
			if (product_id == '') {
				$('.product-id').css('border-bottom', 'solid 3px red');
				error_product_id = true;
			} else {
				$('.product-id').css('border-bottom', 'solid 3px green');
				error_product_id = false;
			}
		}

		$('.product-name').focusout(function() {
			check_product_name()
		})
		function check_product_name() {
			var product_name = $('.product-name').val();
			if (product_name == '') {
				$('.product-name').css('border-bottom', 'solid 3px red');
				error_product_name = true;
			} else {
				$('.product-name').css('border-bottom', 'solid 3px green');
				error_product_name = false;
			}
		}
		
		$('.weight').focusout(function() {
			check_weight();
		})
		function check_weight() {
			var weight = $('.weight').val();
			if (weight == '') {
				$('.weight').css('border-bottom', 'solid 3px red');
				error_weight = true;
			} else {
				$('.weight').css('border-bottom', 'solid 3px green');
				error_weight = false;
			}
		}
		
		$('.type').focusout(function() {
			check_type();
		})
		function check_type() {
			var type = $('.type').val();
			if (type == '') {
				$('.type').css('border-bottom', 'solid 3px red');
				error_type = true;
			} else {
				$('.type').css('border-bottom', 'solid 3px green');
				error_type = false;
			}
		}

		$('.price').focusout(function() {
			check_price();
		})
		function check_price() {
			var price = $('.price').val();
			if (price == '') {
				$('.price').css('border-bottom', 'solid 3px red');
				error_price = true;
			} else {
				$('.price').css('border-bottom', 'solid 3px green');
				error_price = false;
			}
		}
		
		$('.quantity').focusout(function() {
			check_quantity();
		})
		function check_quantity() {
			var quantity = $('.quantity').val();
			if (quantity == '') {
				$('.quantity').css('border-bottom', 'solid 3px red');
				error_quantity = true;
			} else {
				$('.quantity').css('border-bottom', 'solid 3px green');
				error_quantity = false;
			}
		}
		$('.btn-save').click(function() {
			var method = 'save';
			var product_id = $('.product-id').val()
			var product_name = $('.product-name').val()
			var weight = $('.weight').val()
			var type = $('.type').val()
			var price = $('.price').val()
			var quantity = $('.quantity').val()
			check_product_id()
			check_product_name()
			check_weight()
			check_type()
			check_price()
			check_quantity()
			if (error_product_id === false && error_product_name === false && error_weight === false &&
				error_type === false && error_price === false && error_quantity === false) {
				$.ajax({
					type: 'POST',
					data: {
						method: method,
						product_id: product_id,
						product_name: product_name,
						weight: weight,
						type: type,
						price: price,
						quantity: quantity
					},
					url: '../../includes/payment-officer/products/product-list.php',
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
						$('.product-id').val('')
						$('.product-name').val('')
						$('.weight').val('')
						$('.type').val('')
						$('.price').val('')
						$('.quantity').val('')

						$('.product-id').css('border-bottom', '')
						$('.product-name').css('border-bottom', '')
						$('.weight').css('border-bottom', '')
						$('.type').css('border-bottom', '')
						$('.price').css('border-bottom', '')
						$('.quantity').css('border-bottom', '')
						Swal.fire(
						  'Good job!',
						  'Product Created!',
						  'success'
						)
					}
				})
			} else {
				Swal.fire({
					type: 'error',
					title: 'Product did not save',
					text: 'Please complete all the fields'
				});
			}
		})
	}
	save()

	function update() {
		var error_product_id = false;
		var error_product_name = false;
		var error_weight = false;
		var error_type = false;
		var error_price = false;
		var error_quantity = false;

		$('.edit-edit-product-id').focusout(function() {
			check_product_id()
		})
		function check_product_id() {
			var product_id = $('.edit-product-id').val();
			if (product_id == '') {
				$('.edit-product-id').css('border-bottom', 'solid 3px red');
				error_product_id = true;
			} else {
				$('.edit-product-id').css('border-bottom', 'solid 3px green');
				error_product_id = false;
			}
		}

		$('.edit-product-name').focusout(function() {
			check_product_name()
		})
		function check_product_name() {
			var product_name = $('.edit-product-name').val();
			if (product_name == '') {
				$('.edit-product-name').css('border-bottom', 'solid 3px red');
				error_product_name = true;
			} else {
				$('.edit-product-name').css('border-bottom', 'solid 3px green');
				error_product_name = false;
			}
		}
		
		$('.edit-weight').focusout(function() {
			check_weight();
		})
		function check_weight() {
			var weight = $('.edit-weight').val();
			if (weight == '') {
				$('.edit-weight').css('border-bottom', 'solid 3px red');
				error_weight = true;
			} else {
				$('.edit-weight').css('border-bottom', 'solid 3px green');
				error_weight = false;
			}
		}
		
		$('.edit-type').focusout(function() {
			check_type();
		})
		function check_type() {
			var type = $('.edit-type').val();
			if (type == '') {
				$('.edit-type').css('border-bottom', 'solid 3px red');
				error_type = true;
			} else {
				$('.edit-type').css('border-bottom', 'solid 3px green');
				error_type = false;
			}
		}

		$('.edit-price').focusout(function() {
			check_price();
		})
		function check_price() {
			var price = $('.edit-price').val();
			if (price == '') {
				$('.edit-price').css('border-bottom', 'solid 3px red');
				error_price = true;
			} else {
				$('.edit-price').css('border-bottom', 'solid 3px green');
				error_price = false;
			}
		}
		
		$('.edit-quantity').focusout(function() {
			check_quantity();
		})
		function check_quantity() {
			var quantity = $('.edit-quantity').val();
			if (quantity == '') {
				$('.edit-quantity').css('border-bottom', 'solid 3px red');
				error_quantity = true;
			} else {
				$('.edit-quantity').css('border-bottom', 'solid 3px green');
				error_quantity = false;
			}
		}
		$(document).on('click', '.btn-update', function() {
			var method = 'update';
			var id = $(this).data('id');
			var product_id = $('.edit-product-id').val()
			var product_name = $('.edit-product-name').val()
			var weight = $('.edit-weight').val()
			var type = $('.edit-type').val()
			var price = $('.edit-price').val()
			var quantity = $('.edit-quantity').val()
			check_product_id()
			check_product_name()
			check_weight()
			check_type()
			check_price()
			check_quantity()
			if (error_product_id === false && error_product_name === false && error_weight === false &&
				error_type === false && error_price === false && error_quantity === false) {
				$.ajax({
					type: 'POST',
					data: {
						method: method,
						id: id,
						product_id: product_id,
						product_name: product_name,
						weight: weight,
						type: type,
						price: price,
						quantity: quantity
					},
					url: '../../includes/payment-officer/products/product-list.php',
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
						$('.content-data').load('product-list.php');
						Swal.fire(
						  'Good job!',
						  'Product Updated!',
						  'success'
						)
					}
				})
			} else {
				Swal.fire({
					type: 'error',
					title: 'Product did not save',
					text: 'Please complete all the fields'
				});
			}
		})
	}
	update()

	function remove() {
		$(document).on('click', '.btn-delete-product', function() {
			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if(result.value) {
			  	var id = $(this).data('id');
			  	var method = 'remove';
			  	$.ajax({
			  		type: 'POST',
			  		data: {
			  			id: id,
			  			method: method
			  		},
			  		url: '../../includes/payment-officer/products/product-list.php',
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
						var name = $('.product').val();
						fetch(name);
						 Swal.fire(
					      'Deleted!',
					      'Product has been deleted.',
					      'success'
					    )
					}
			  	});
			  }	
			})
		})
	}
	remove()
})
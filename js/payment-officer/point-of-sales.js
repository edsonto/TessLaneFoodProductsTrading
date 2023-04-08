$(document).ready(function() {
	function fetch_user() {
		var method = 'fetch_user'
		$.ajax({
			type: 'POST',
			data: {method: method},
			url: '../includes/payment-officer/point-of-sales.php',
			dataType: 'json',
			success: function(data) {
				$('.user-name').text(data.name)
				$('.current-date').text(data.currentDate)
			}
		})
	}
	fetch_user()
	setInterval(function(){
		fetch_user()
	}, 1000)

	$('.item').keyup(function() {
		var item = $(this).val()
		if (item == '') {
			$('.item-list').html('');
		} else {
			search_products()
		}
	})
	function search_products() {
		var method = 'search_products'
		var item = $('.item').val()
		$.ajax({
			type: 'POST',
			data: {
				method: method,
				item: item
			},
			url: '../includes/payment-officer/point-of-sales.php',
			success: function(data) {
				$('.item-list').html(data);
			}
		})
	}
	function add_order() {
		var count = 0;
		$(document).on('click', '.selected-item', function() {
			count = count + 1;
			var row_id = $(this).data('id1')
			var product_id = $(this).data('id2')
			var product_name = $(this).data('id3')
			var weight = $(this).data('id4')
			var type = $(this).data('id5')
			var price = $(this).data('id6')
			var quantity = parseFloat($('.quantity').text())
			var stocks = $(this).data('id7')
			var subTotal = quantity * price
			var grandTotalValue = parseFloat($('.grand-total').data('id'))
			var grandTotal = grandTotalValue + subTotal
			$('.grand-total').data('id', grandTotal)
			$('.grand-total').text(grandTotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'))
			if (quantity == 0) {
				Swal.fire({
					type: 'warning',
					title: 'Oops...',
					text: 'Stock is empty!'
				});
			} else if (quantity > stocks) {
				Swal.fire({
					type: 'warning',
					title: 'Oops...',
					text: 'Insufficient stock! '
				});
			} else {
				$(".order-table tbody:last-child").prepend(
					'<tr class="order" id="'+count+'">'+
						'<td class="order-product-id" id="order-product-id'+count+'" data-id="'+row_id+'">'+product_id+'</td>'+
						'<td class="order-product-name" id="order-product-name'+count+'">'+product_name+'</td>'+
						'<td class="order-weight" id="order-weight'+count+'">'+weight+'</td>'+
						'<td class="order-type" id="order-type'+count+'">'+type+'</td>'+
						'<td class="order-price" id="order-price'+count+'">'+price+'</td>'+
						'<td class="order-quantity" id="order-quantity'+count+'">'+quantity+'</td>'+
						'<td class="order-subTotal" id="order-subTotal'+count+'" data-id="'+subTotal+'">'+subTotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td>'+
						'<td><button class="btn btn-danger btn-remove" data-row="'+count+'"><i class="glyphicon glyphicon-remove"></id></button></td>'+
					'</tr>'
				)
				$('.quantity').text('1')
			}
		})

		$(document).on("click", ".btn-remove", function() {	
			var delete_row = $(this).data("row")
			var grandTotalValue = parseFloat($('.grand-total').data('id'))
			var subTotal = parseFloat($('#order-subTotal'+delete_row).data('id'))
			var grandTotal = grandTotalValue - subTotal
			$('.grand-total').data('id', grandTotal)
			$('.grand-total').text(grandTotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'))
			$("#"+delete_row).remove();
		});
	}
	add_order()

	function edit_quantity() {
		$(document).keydown(function(event) {
		    if (event.altKey && event.which === 112)
		    {
		       swal.fire({
					title: 'Enter Quantity',
					html: '<input type="number" class="form-control input-lg input-quantity" style="text-align: center;">'+
					'<script>$(".input-quantity").focus()</script>',  
					showCancelButton: true,
					confirmButtonColor: '#005196',
					cancelButtonColor: '#ccc',
					confirmButtonText: 'Ok'
				}).then((result) => {
					if(result.value) {
						var quantity = $('.input-quantity').val()
						if (quantity == 0 || quantity == '') {
							Swal.fire({
								type: 'error',
								title: 'Oops...',
								text: 'Invalid Input'
							});
						} else  {
							$('.quantity').text($('.input-quantity').val())
						}
					}
				});
		        event.preventDefault();
		    }
		});
	}
	edit_quantity()
	function save_order() {
		$('.btn-finish-order').click(function() {
			var grandTotal = $('.grand-total').data('id')
			if (grandTotal == 0) {
				Swal.fire({
					type: 'error',
					title: 'Oops...',
					text: 'Please choose an item'
				});
			} else {
				swal.fire({
					title: 'Enter Cash',
					html: '<input type="number" class="form-control input-lg input-cash" style="text-align: center;">',
					showCancelButton: true,
					confirmButtonColor: '#005196',
					cancelButtonColor: '#ccc',
					confirmButtonText: 'Ok'
				}).then((result) => {
					if(result.value) {
						var cash = $('.input-cash').val()
						var grandTotal = $('.grand-total').data('id')
						if (cash == 0 || cash == '') {
							Swal.fire({
								type: 'error',
								title: 'Oops...',
								text: 'Invalid Input'
							});
						} else if (cash < grandTotal)  {
							Swal.fire({
								type: 'error',
								title: 'Oops...',
								text: 'Invalid Input'
							});
						} else {
							var method = 'save_order'
							var id = [];
							$('.order-product-id').each(function(){
								id.push($(this).data('id'));
							});
							var product_id = [];
							$('.order-product-id').each(function(){
								product_id.push($(this).text());
							});
							var product_name = [];
							$('.order-product-name').each(function(){
								product_name.push($(this).text());
							});
							var weight = [];
							$('.order-weight').each(function(){
								weight.push($(this).text());
							});
							var type = [];
							$('.order-type').each(function(){
								type.push($(this).text());
							});
							var price = [];
							$('.order-price').each(function(){
								price.push($(this).text());
							});
							var quantity = [];
							$('.order-quantity').each(function(){
								quantity.push($(this).text());
							});
							var subTotal = [];
							$('.order-subTotal').each(function(){
								subTotal.push($(this).data('id'));
							});
							var cash = $('.input-cash').val()
							$.ajax({
								type: 'POST',
								data: {
									id: id,
									product_id: product_id,
									product_name: product_name,
									weight: weight,
									type: type,
									price: price,
									quantity: quantity,
									subTotal: subTotal,
									cash: cash,
									method: method
								},
								url: '../includes/payment-officer/point-of-sales.php',
								success: function(data) {
									if (data == 1) {
										Swal.fire({
											type: 'error',
											title: 'Oops...',
											text: 'Database connection failed!'
										});
									} else if (data == 0) {
										var change = cash - grandTotal;
										Swal.fire({
											type: 'info',
											title: 'Transaction Completed!',
											html: '<h2>Change</h2><h2>₱ '+change.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</h2>',
										});
										$('.order-table tbody').html('')
										$('.item-list').html('')
										$('.grand-total').data('id', 0)
										$('.grand-total').text('0.00')
									}
								}
							})
						}
					}
				});
		        event.preventDefault();
			}
		})
	}
	save_order()
	function cancel_order() {
		$('.btn-cancel-order').click(function() {
			$('.order-table tbody').html('')
			$('.item-list').html('')
			$('.grand-total').data('id', 0)
			$('.grand-total').text('0.00')
		})
	}
	cancel_order();
})
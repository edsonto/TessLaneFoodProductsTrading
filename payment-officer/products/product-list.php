<script type="text/javascript" src="../../js/payment-officer/products/products-list.js"></script>
<div class="panel panel-default">
	<div class="panel-body" style="background: #b9bcc1;">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-4">
					<label>Product</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fas fa-box-open"></i>
						</div>
						<input type="text" name="product" class="form-control product">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="col-lg-12">
			<div class="col-lg-12">
					<h4>Product List</h4>
			</div>
			<div class="col-lg-12 table-responsive product-list"></div>
		</div>
	</div>
	<!-- modal create -->
	<div class="modal fade modal-create" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalCenterTitle"><strong>New Product</strong></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
	      		</div>
	      		<div class="modal-body">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="form-group">
								<label>Product ID:</label>
								<input type="text" name="product_id" class="form-control product-id input-lg">
							</div>
							<div class="form-group">
								<label>Product Name:</label>
								<input type="text" name="product_name" class="form-control product-name input-lg">
							</div>
							<div class="form-group">
								<label>Weight(g):</label>
								<input type="number" name="weight" class="form-control weight input-lg">
							</div>
							<div class="form-group">
								<label>Type:</label>
								<input type="text" name="type" class="form-control type input-lg">
							</div>
							<div class="form-group">
								<label>Price:</label>
								<input type="number" name="price" class="form-control price input-lg">
							</div>
							<div class="form-group">
								<label>Quantity:</label>
								<input type="number" name="quantity" class="form-control quantity input-lg">
							</div>
						</div>
					</div>
	      		</div>
	      		<div class="modal-footer">
	      			<button class="btn btn-primary btn-save">Save</button>
	      			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<!-- modal edit -->
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalCenterTitle"><strong>Edit Medicine</strong></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
	      		</div>
	      		<div class="modal-body">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-12 form-group">
										<label for="edit-barcode">Barcode:</label>
										<input type="text" name="barcode" class="form-control edit-barcode">
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="edit-generic-name">Generic Name:</label>
										<input type="text" name="generic_name" class="form-control edit-generic-name">
									</div>
									<div class="col-sm-6 form-group">
										<label for="edit-brand-name">Brand Name:</label>
										<input type="text" name="brand_name" class="form-control edit-brand-name">
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="edit-classification">Classification:</label>
										<input type="text" name="classification" class="form-control edit-classification">
									</div>
									<div class="col-sm-6 form-group">
										<label for="edit-dosage">Dosage:</label>
										<input type="text" name="dosage" class="form-control edit-dosage">
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="edit-appearance">Unit Dosage:</label>
										<input type="text" name="appearance" class="form-control edit-appearance">
									</div>
									<div class="col-sm-6 form-group">
										<label for="edit-expiration">Expiration:</label>
										<input type="date" name="expiration" class="form-control edit-expiration">
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="edit-price">Price:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<b style="font-size: 20px;">₱</b>
											</div>
											<input type="number" name="price" class="form-control edit-price">
										</div>									</div>
									<div class="col-sm-6 form-group">
										<label for="edit-manufacturer">Company/Manufacturer:</label>
										<input type="text" name="manufacturer" class="form-control edit-manufacturer">
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-12 form-group" style="text-align: center;">
										<label for="edit-quantity">Quantity:</label>
										<input type="number" name="quantity" class="form-control input-lg edit-quantity" style="text-align: center;">
									</div>
								</div>
							</div>
						</div>
					</div>
	      		</div>
	      		<div class="modal-footer">
	      			<button class="btn btn-primary btn-update" data-id="">Update</button>
	      			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
</div>
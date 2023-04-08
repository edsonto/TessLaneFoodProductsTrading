<style type="text/css">
	.form-control {
		border-left: 0;
		border-right: 0;
		border-top: 0;
		border-bottom: 2px solid gray;
		box-shadow: none;
		border-radius: 0;
	}
	.input-group-addon {
		border-left: 0;
		border-right: 0;
		border-top: 0;
		border-bottom: 2px solid gray;
		box-shadow: none;
		border-radius: 0;
		background-color: transparent;
	}
</style>
<script type="text/javascript" src="../../js/payment-officer/account-settings/personal-settings.js"></script>
<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-lg-12">
			<div class="col-lg-12 form-group">
				<h4><i class="fa fa-user-cog"></i> Personal Settings</h4>
			</div>
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4 form-group">
						<label>First Name:</label>
						<input type="text" name="firstname" class="form-control firstname input-lg">
					</div>
					<div class="col-lg-3 form-group">
						<label>Middle Name:</label>
						<input type="text" name="middlename" class="form-control middlename input-lg">
					</div>
					<div class="col-lg-3 form-group">
						<label>Last Name:</label>
						<input type="text" name="lastname" class="form-control lastname input-lg">
					</div>
					<div class="col-lg-2 form-group">
						<label>Name Extension:</label>
						<input type="text" name="name_extension" class="form-control name-extension input-lg">
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4 form-group">
						<label>Gender:</label>
						<select class="form-control gender input-lg">
							<option value="">Choose Gender</option>
							<option value="MALE">Male</option>
							<option value="FEMALE">Female</option>
						</select>
					</div>
					<div class="col-lg-4 form-group">
						<label>Phone #:</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i>+63</i>
							</div>
							<input type="number" name="type" class="form-control phone input-lg">
						</div>
					</div>
					<div class="col-lg-4 form-group">
						<label>E-mail:</label>
						<input type="email" name="type" class="form-control email input-lg">
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<label>Complete Address:</label>
				<input type="text" name="address" class="form-control address input-lg">
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-12">
					<div class="col-lg-12">
						<button class="btn btn-primary btn-update">Update</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
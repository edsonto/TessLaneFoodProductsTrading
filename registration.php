<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-free-5.12.0-web/css/all.css">
	<title>Tesslane FDT - Registration</title>
	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/patient-history.js"></script>
</head>
<style type="text/css">
	html body {
		background-color: #fff;
	}
	* {
		margin: 0;
		padding: 0;
	}
	.navbar {
		background-color: #20bf55;
		background-image: linear-gradient(315deg, #20bf55 0%, #01baef 74%);
	}
	.navbar .navbar-header a span, .navbar .collapse ul li a {
		color: #fff;
	}
	/*.panel-heading h3 {
		color: #fff;
	}
	.panel-body {
		border-width: 5px;
		border-style: solid;
		border-image: linear-gradient(315deg, #20bf55 0%, #01baef 74%) 1 40%;*/
		/*border-image: linear-gradient(to top, #20bf55, rgba(0, 0, 0, 0)) 1 100%;*/
	/*}
	.modal-header {
		background-color: #20bf55;
		background-image: linear-gradient(315deg, #20bf55 0%, #01baef 74%);
	}
	.modal-body h4, .modal-body legend {
		color: #01baef;
	}
	.modal-header h4 {
		color: #fff;
	}
	.modal-footer {
		background-color: #20bf55;
		background-image: linear-gradient(315deg, #20bf55 0%, #01baef 74%);
	}*/
</style>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	        <a class="navbar-brand" href="/">
	            <img src="images/clinic logo.png" style="float: left; width: 35px; height: 40px; margin-top: -10px;">
	            <span>Saint Adela Medical and Diagnostic Clinic</span>
	         </a>
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="index.php" style="color: #fff;">PATIENTS</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalCenterTitle"><strong>Create</strong></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
	      		</div>
	      		<div class="modal-body">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-3 form-group">
										<label for="firstname">First Name:</label>
										<input type="text" name="firstname" class="form-control firstname">
									</div>
									<div class="col-sm-3 form-group">
										<label for="middlename">Middle Name:</label>
										<input type="text" name="middlename" class="form-control middlename">
									</div>
									<div class="col-sm-3 form-group">
										<label for="lastname">Last Name:</label>
										<input type="text" name="lastname" class="form-control lastname">
									</div>
									<div class="col-sm-3 form-group">
										<label for="name-suffix">Name Suffix:</label>
										<input type="text" name="name-suffix" class="form-control name-suffix">
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-3 form-group">
										<label for="gender">Gender:</label>
										<select name="gender" class="form-control gender">
											<option value=""></option>
											<option value="MALE">Male</option>
											<option value="FEMALE">Female</option>
										</select>
									</div>
									<div class="col-sm-3 form-group">
										<label for="birthday">Birthday:</label>
										<input type="date" name="birthday" class="form-control birthday">
									</div>
									<div class="col-sm-3 form-group">
										<label for="age">Age:</label>
										<input type="number" name="age" class="form-control age">
									</div>
									<div class="col-sm-3 form-group">
										<label for="contact">Contact Number:</label>
										<input type="number" name="contact" class="form-control contact">
									</div>
								</div>
							</div>
							<div class="col-sm-12 form-group">
								<div class="row">
									<div class="col-sm-6">
										<label for="temp">Temp:</label>
										<input type="text" name="temp" class="form-control temp">
									</div>
									<div class="col-sm-6">
										<label for="pr">PR:</label>
										<input type="text" name="pr" class="form-control pr">
									</div>
									<div class="col-sm-6">
										<label for="hr">HR:</label>
										<input type="text" name="hr" class="form-control hr">
									</div>
									<div class="col-sm-6">
										<label for="bp">BP:</label>
										<input type="text" name="bp" class="form-control bp">
									</div>
									<div class="col-sm-6">
										<label for="height">Height:</label>
										<input type="text" name="height" class="form-control height">
									</div>
									<div class="col-sm-6">
										<label for="weight">Weight:</label>
										<input type="text" name="weight" class="form-control weight">
									</div>
								</div>
							</div>
							<div class="col-sm-12 form-group">
								<label for="chief-comp">Chief Complaint</label>
								<textarea name="chief_comp" class="form-control chief-comp" rows="10"></textarea>
							</div>
							<div class="col-sm-12 form-group">
								<label for="diagnosis">Diagnosis</label>
								<textarea name="diagnosis" class="form-control diagnosis" rows="10"></textarea>
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
	<div class="col-sm-12 history-list" style="margin-top: 200px;">
		<div class="col-sm-12 form-group">
			<button class="btn btn-primary btn-create">Create</button>
		</div>
		<div class="col-sm-12 form-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><strong>Patients</strong></h3>
				</div>
				<div class="panel-body table-responsive"></div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalCenterTitle"><strong>View Patient History</strong></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
	      		</div>
	      		<div class="modal-body"></div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.btn-create').on('click', function() {
				$('#modal-create').modal('show')
			})
		})
	</script>
</body>
</html>
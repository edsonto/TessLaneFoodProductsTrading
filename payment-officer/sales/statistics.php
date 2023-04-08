<script type="text/javascript" src="../../js/payment-officer/sales/statistics.js"></script>
<div class="panel panel-default">
	<div class="panel-body" style="background: #b9bcc1;">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-3">
					<label>Date From:</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fas fa-calendar"></i>
						</div>
						<input type="date" name="date_from" class="form-control date-from">
					</div>
				</div>
				<div class="col-lg-3">
					<label>Date To:</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fas fa-calendar"></i>
						</div>
						<input type="date" name="date_to" class="form-control date-to">
					</div>
				</div>
				<div class="col-lg-3">
					<button class="btn btn-search" style="margin-top: 24px;"><i class="fa fa-search"></i> Search</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-8">
					<div class="col-lg-12">
						<h4><i class="fas fa-chart-line"></i> Statistics</h4>
					</div>
					<div class="col-lg-12">
						<canvas id="myChart" style="width:100%;max-width:100%"></canvas>	
					</div>
				</div>
				<div class="col-lg-4">
					<div class="col-lg-12">
						<h4><i class=""></i> Sales</h4>
					</div>
					<div class="col-lg-12 table-responsive sales-list"></div>
					<div class="col-lg-12">
						<h4><i class=""></i> Sales Prediction (Next Month)</h4>
					</div>
					<div class="col-lg-12 table-responsive sales-prediction-month"></div>
					<div class="col-lg-12">
						<h4><i class=""></i> Sales Prediction (Next Year)</h4>
					</div>
					<div class="col-lg-12 table-responsive sales-prediction-year"></div>
				</div>
			</div>
		</div>
	</div>
</div>
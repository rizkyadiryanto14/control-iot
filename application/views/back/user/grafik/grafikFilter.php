<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Chart Filter</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Chart Filter</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>

	<div class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-body">
					<div class="row">
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Field1</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<canvas id="field1Chart"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Field2</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<canvas id="field2Chart"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Field3</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<canvas id="field3Chart"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Field4</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<canvas id="field4Chart"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Field5</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<canvas id="field5Chart"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Field6</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<canvas id="field6Chart"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Field7</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<canvas id="field7Chart"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Field8</h3>
									</div>
									<div class="card-body">
										<div class="form-group">
											<canvas id="field8Chart"></canvas>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>


<script>
	const charts = [];

	function createChart(canvasId, label, backgroundColor, borderColor) {
		const ctx = document.getElementById(canvasId).getContext('2d');
		const gradient = ctx.createLinearGradient(0, 0, 0, 400);
		gradient.addColorStop(0, 'rgba(75, 192, 192, 0.2)');
		gradient.addColorStop(1, 'rgba(255, 0, 0, 0.2)');

		const chart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [], // Labels akan diisi saat pembaruan
				datasets: [{
					label: label,
					data: [], // Data akan diisi saat pembaruan
					backgroundColor: backgroundColor,
					borderColor: borderColor,
					pointRadius: false,
					pointColor: '#3b8bba',
					pointStrokeColor: borderColor,
					pointHighlightFill: '#fff',
					pointHighlightStroke: borderColor,
				}],
			},
			options: salesChartOptions,
		});

		var salesChartOptions = {
			maintainAspectRatio: false,
			responsive: true,
			legend: {
				display: false
			},
			scales: {
				xAxes: [{
					gridLines: {
						display: false
					}
				}],
				yAxes: [{
					gridLines: {
						display: false
					}
				}]
			}
		}
		charts.push(chart);
	}

	createChart('field1Chart', 'Field 1', 'rgba(60,141,188,0.9)', 'rgba(60,141,188,0.8)');
	createChart('field2Chart', 'Field 2', 'rgba(255,0,0,0.9)', 'rgba(255,0,0,0.8)');
	createChart('field3Chart', 'Field 3', 'rgba(0,255,0,0.9)', 'rgba(0,255,0,0.8)');
	createChart('field4Chart', 'Field 4', 'rgba(255,255,0,0.9)', 'rgba(255,255,0,0.8)');
	createChart('field5Chart', 'Field 5', 'rgba(0,0,255,0.9)', 'rgba(0,0,255,0.8)');
	createChart('field6Chart', 'Field 6', 'rgba(255,0,255,0.9)', 'rgba(255,0,255,0.8)');
	createChart('field7Chart', 'Field 7', 'rgba(0,255,255,0.9)', 'rgba(0,255,255,0.8)');
	createChart('field8Chart', 'Field 8', 'rgba(128,128,128,0.9)', 'rgba(128,128,128,0.8)');

	function updateAllCharts() {
		const filteredData = <?php if (!empty($filterGrafik)) {
			echo json_encode($filterGrafik);
		} ?>;
		const timeLabel = []; // Label waktu
		const fieldData = []; // Data field
		filteredData.forEach(function(data) {
			const createdDate = new Date(data.created_at);
			const label = `${createdDate.getHours()}:${createdDate.getMinutes()}`;
			const fields = [
				parseFloat(data.field1),
				parseFloat(data.field2),
				parseFloat(data.field3),
				parseFloat(data.field4),
				parseFloat(data.field5),
				parseFloat(data.field6),
				parseFloat(data.field7),
				parseFloat(data.field8)
			];
			timeLabel.push(label);
			fieldData.push(fields);
		});

		charts.forEach((chart, index) => {
			chart.data.labels = timeLabel;
			chart.data.datasets[0].data = fieldData.map(function(fields) {
				return fields[index];
			});
			chart.update();
		});
	}

	setInterval(updateAllCharts, 1500);

</script>

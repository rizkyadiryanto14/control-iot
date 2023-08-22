
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Dashboard</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-info">
							<div class="inner">
								<h3><div class="total_entry"></div></h3>
								<p>Entry Data</p>
							</div>
							<div class="icon">
								<i class="fas fa-sort-amount-asc"></i>
							</div>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-success">
							<div class="inner">
								<h3><div class="heartRateChar"></div></h3>
								<p>heartRateChar</p>
							</div>
							<div class="icon">
								<i class="fas fa-air-freshener"></i>
							</div>

						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-warning">
							<div class="inner">
								<h3><div class="temperatureChar"></div></h3>
								<p>temperatureChar</p>
							</div>
							<div class="icon">
								<i class="fas fa-temperature-high"></i>
							</div>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-danger">
							<div class="inner">
								<h3><div class="oxygen"></div></h3>

								<p>Oxygen</p>
							</div>
							<div class="icon">
								<i class="ion ion-pie-graph"></i>
							</div>
						</div>
					</div>
					<!-- ./col -->
				</div>
				<!-- /.row -->
				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-6 col-lg-6">
						<div class="card shadow mb-4">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Temperature</h6>

							</div>
							<!-- Card Body -->
							<div class="card-body">
								<div class="chart-area">
									<!-- Chart_temperature -->
									<div class="temperature">
										<canvas id="temperatureChart"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Area Chart -->
					<div class="col-xl-6 col-lg-6">
						<div class="card shadow mb-4">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">hearRateChart</h6>
							</div>
							<!-- Card Body -->
							<div class="card-body">
								<div class="chart-area">
									<!-- Chart_humidity -->
									<div class="HeartRateChart">
										<canvas id="heartRateChart"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script>
		$(document).ready(function () {
			setInterval(function () {
				$.getJSON('https://api.thingspeak.com/channels/2244680/feeds/last.json?', function(data) {
					$(".total_entry").html(data.entry_id);
					$(".heartRateChar").html(data.field2);
					$(".temperatureChar").html(data.field3);
					$(".oxygen").html(data.field1);
				});

				// $.getJSON('https://api.thingspeak.com/channels/2244680/feeds/last.json?api_key=QE9WPKO0SVJK17BO', function(data) {
				// 	$(".temperature").html(data.field1);
				// });
			}, 100);
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		const ctx = document.getElementById('temperatureChart').getContext('2d');
		const temperatureChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [],
				datasets: [{
					label: "Temperature",
					data: [],
					backgroundColor: "rgba(75, 192, 192, 0.2)",
					borderColor: "rgba(75, 192, 192, 1)",
					borderWidth: 2,
				}],
			},
			options: {
				scales: {
					y: {
						beginAtZero: true,
					},
				},
			},
		});

		function updateChart1() {
			const apiUrl = 'https://api.thingspeak.com/channels/2244680/feeds/last.json';

			fetch(apiUrl)
				.then(response => response.json())
				.then(data => {
					const temperature = parseFloat(data.field3); // Mengambil data temperatur dari field1

					// Mendapatkan waktu dari created_at
					const createdDate = new Date(data.created_at);
					const timeLabel = `${createdDate.getHours()}:${createdDate.getMinutes()}`;

					temperatureChart.data.labels.push(timeLabel);
					temperatureChart.data.datasets[0].data.push(temperature);
					temperatureChart.update();
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
		}

		// Panggil fungsi updateChart setiap 10 detik
		setInterval(updateChart1, 1500);
	</script>

	<script>
		const ctx = document.getElementById('heartRateChart').getContext('2d');
		const heartRateChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [],
				datasets: [{
					label: "Heart Rate",
					data: [],
					backgroundColor: "rgba(75, 192, 192, 0.2)",
					borderColor: "rgba(75, 192, 192, 1)",
					borderWidth: 2,
				}],
			},
			options: {
				scales: {
					y: {
						beginAtZero: true,
					},
				},
			},
		});

		function updateChart() {
			const apiUrl = 'https://api.thingspeak.com/channels/2244680/feeds/last.json';
			fetch(apiUrl)
				.then(response => response.json())
				.then(data => {
					const heartRate = parseFloat(data.field2);
					const createdDate = new Date(data.created_at);
					const timeLabel = `${createdDate.getHours()}:${createdDate.getMinutes()}`;
					heartRateChart.data.labels.push(timeLabel);
					heartRateChart.data.datasets[0].data.push(heartRate);
					heartRateChart.update();
				})
				.catch(error => {
					console.error('Error fetching data:', error);
				});
		}
		setInterval(updateChart, 10000);
	</script>




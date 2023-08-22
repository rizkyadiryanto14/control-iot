<style>
	.responsive-iframe {
		position: relative;
		padding-bottom: 56.25%; /* 16:9 aspect ratio */
		height: 0;
		overflow: hidden;
	}

	.responsive-iframe iframe {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		border: 1px solid #cccccc;
	}
</style>

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
							<h3>
								<div class="total_entry"></div>
							</h3>
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
							<h3>
								<div class="heartRateChar"></div>
							</h3>
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
							<h3>
								<div class="temperatureChar"></div>
							</h3>
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
							<h3>
								<div class="oxygen"></div>
							</h3>

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
					<div class="card shadow-lg">
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

				<div class="col-xl-6 col-lg-6">
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Heart Rate Chart</h6>
						</div>
						<!-- Card Body -->
						<div class="card-body">
							<div class="chart-area">
								<!-- Heart Rate Chart -->
								<div class="heartRateChart">
									<canvas id="heartRateChartCanvas"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-6 col-lg-6">
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Oxygen</h6>
						</div>
						<!-- Card Body -->
						<div class="card-body">
							<div class="chart-area">
								<!-- Heart Rate Chart -->
								<div class="oxygenChartCanvas">
									<canvas id="oxygenChart"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-6 col-lg-5">
					<div class="card shadow mb-4">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Channel Location</h6>
						</div>
						<div class="card-body">
							<div class="chart-area responsive-iframe">
								<iframe
									src="https://thingspeak.com/channels/2244680/maps/channel_show"
									allowfullscreen
								></iframe>
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
			$.getJSON('https://api.thingspeak.com/channels/2244680/feeds/last.json?', function (data) {
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
	const temperatureCtx = document.getElementById('temperatureChart').getContext('2d');
	const temperatureGradient = temperatureCtx.createLinearGradient(0, 0, 0, 400);
	temperatureGradient.addColorStop(0, 'rgba(75, 192, 192, 0.2)'); // Warna transparan biru
	temperatureGradient.addColorStop(1, 'rgba(255, 0, 0, 0.2)'); // Warna transparan merah

	const temperatureChart = new Chart(temperatureCtx, {
		type: 'line',
		data: {
			labels: [],
			datasets: [{
				label: "Temperature",
				data: [],
				backgroundColor: temperatureGradient,
				borderColor: "rgba(75, 192, 192, 1)", // Warna garis biru
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

	function updateTemperatureChart() {
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

	setInterval(updateTemperatureChart, 1500);
</script>


<script>
	const ekgCanvas = document.getElementById('heartRateChartCanvas');
	const ekgCtx = ekgCanvas.getContext('2d');
	const ekgChart = new Chart(ekgCtx, {
		type: 'line',
		data: {
			labels: [],
			datasets: [{
				label: "Heart Rate",
				data: [],
				backgroundColor: "transparent",
				borderColor: "red",
				borderWidth: 2,
				pointRadius: 0, // Tidak ada titik pada setiap data
				borderJoinStyle: 'miter', // Tidak ada penjajaran di sudut titik
				tension: 0.1 // Tegangan kurva yang rendah
			}],
		},
		options: {
			animation: false, // Nonaktifkan animasi untuk tampilan yang lebih cepat
			scales: {
				y: {
					beginAtZero: false, // Biarkan skala Y mulai dari angka yang lebih realistis
				},
			},
			plugins: {
				legend: {
					display: false // Nonaktifkan keterangan di sudut kanan atas
				}
			}
		},
	});

	function updateHeartRateChart() {
		const apiUrl = 'https://api.thingspeak.com/channels/2244680/feeds/last.json';
		fetch(apiUrl)
			.then(response => response.json())
			.then(data => {
				const heartRate = parseFloat(data.field2);
				const createdDate = new Date(data.created_at);
				const timeLabel = createdDate.getSeconds(); // Gunakan detik sebagai label

				ekgChart.data.labels.push(timeLabel);
				ekgChart.data.datasets[0].data.push(heartRate);
				ekgChart.update();
			})
			.catch(error => {
				console.error('Error fetching data:', error);
			});
	}

	setInterval(updateHeartRateChart, 1000); // Ubah interval ke 1 detik
</script>

<script>
	const oxygenCtx = document.getElementById('oxygenChart').getContext('2d');
	const oxygenGradient = oxygenCtx.createLinearGradient(0, 0, 0, 400);
	oxygenGradient.addColorStop(0, 'rgba(0, 255, 0, 0.2)'); // Warna transparan hijau

	const oxygenChart = new Chart(oxygenCtx, {
		type: 'line',
		data: {
			labels: [],
			datasets: [{
				label: "Oxygen",
				data: [],
				backgroundColor: oxygenGradient,
				borderColor: "rgba(0, 255, 0, 1)", // Warna garis hijau
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

	function updateOxygenChart() {
		const apiUrl = 'https://api.thingspeak.com/channels/2244680/feeds/last.json';

		fetch(apiUrl)
			.then(response => response.json())
			.then(data => {
				const oxygen = parseFloat(data.field1); // Mengambil data oxygen dari field1

				// Mendapatkan waktu dari created_at
				const createdDate = new Date(data.created_at);
				const timeLabel = `${createdDate.getHours()}:${createdDate.getMinutes()}`;

				oxygenChart.data.labels.push(timeLabel);
				oxygenChart.data.datasets[0].data.push(oxygen);
				oxygenChart.update();
			})
			.catch(error => {
				console.error('Error fetching data:', error);
			});
	}

	setInterval(updateOxygenChart, 1500);
</script>







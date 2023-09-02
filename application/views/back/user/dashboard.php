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

	@keyframes ekgAnimation {
		0% {
			background-position: 100% 50%;
		}
		50% {
			background-position: 0% 50%;
		}
		100% {
			background-position: 100% 50%;
		}
	}

	.ekg-animation {
		animation: ekgAnimation 1s linear infinite;
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
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Total Entry</span>
							<span class="info-box-number">
							 	<div class="total_entry"></div>
                			</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users-cog"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">heartRateChar</span>
							<span class="info-box-number">
								<div class="heartRateChar"></div>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-pencil-alt"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">temperatureChar</span>
							<span class="info-box-number">
								<div class="temperatureChar"></div>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-pencil-ruler"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Oxygen</span>
							<span class="info-box-number">
								<div class="oxygen"></div>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<!-- Area Chart -->
				<div class="col-xl-4 col-lg-4">
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
									<canvas id="temperatureChart" class="ekg-animation"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4">
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
				<div class="col-xl-4 col-lg-4">
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
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h6>Location</h6>
						</div>
						<div class="card-body">
							<div class="chart-area">
								<div class="location">
									<iframe style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/2244680/maps/channel_show"></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
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

		}, 100);
	});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	const temperatureCtx = document.getElementById('temperatureChart').getContext('2d');
	temperatureCtx.canvas.classList.add('ekg-animation');
	const temperatureGradient = temperatureCtx.createLinearGradient(0, 0, 0, 400);
	temperatureGradient.addColorStop(0, 'rgba(75, 192, 192, 0.2)');
	temperatureGradient.addColorStop(1, 'rgba(255, 0, 0, 0.2)');

	const temperatureChart = new Chart(temperatureCtx, {
		type: 'line',
		data: {
			labels: [],
			datasets: [{
				label: "Temperature",
				data: [],
				backgroundColor: 'rgba(60,141,188,0.9)',
				borderColor: 'rgba(60,141,188,0.8)',
				pointRadius: false,
				pointColor: '#3b8bba',
				pointStrokeColor: 'rgba(60,141,188,1)',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgba(60,141,188,1)',
			}],
		},
		options: {
			salesChartOptions
		},
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

	function updateTemperatureChart() {
		const apiUrl = 'https://api.thingspeak.com/channels/2244680/feeds/last.json';

		fetch(apiUrl)
			.then(response => response.json())
			.then(data => {
				const temperature = parseFloat(data.field3);

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
				backgroundColor: 'rgb(255,9,132)',
				borderColor: "red",
				borderWidth: 2,
				pointRadius: 0,
				borderJoinStyle: 'miter',
				tension: 0.1
			}],
		},
		options: {
			animation: true,
			scales: {
				y: {
					beginAtZero: false,
				},
			},
			plugins: {
				legend: {
					display: false
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
				const timeLabel = createdDate.getSeconds();

				ekgChart.data.labels.push(timeLabel);
				ekgChart.data.datasets[0].data.push(heartRate);
				ekgChart.update();
			})
			.catch(error => {
				console.error('Error fetching data:', error);
			});
	}

	setInterval(updateHeartRateChart, 1000);
</script>

<script>
	const oxygenCtx = document.getElementById('oxygenChart').getContext('2d');
	const oxygenGradient = oxygenCtx.createLinearGradient(0, 0, 0, 400);
	oxygenGradient.addColorStop(0, 'rgba(0, 255, 0, 0.2)');

	const oxygenChart = new Chart(oxygenCtx, {
		type: 'line',
		data: {
			labels: [],
			datasets: [{
				label: "Oxygen",
				data: [],
				backgroundColor: oxygenGradient,
				borderColor: "rgba(0, 255, 0, 1)",
				pointRadius: 0,
				borderJoinStyle: 'miter',
				tension: 0.1
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
				const oxygen = parseFloat(data.field1);

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







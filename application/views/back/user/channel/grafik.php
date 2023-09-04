<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Grafik</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Grafik</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
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
			</div>
		</div>
	</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	const temperatureCtx = document.getElementById('field1Chart').getContext('2d');
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
		const apiUrl = 'http://localhost/control-iot/getchanel?id_chanel=14&token=FZQUG1M3LYQZFIU5';

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

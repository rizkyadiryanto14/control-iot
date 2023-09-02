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
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Total Users</span>
							<span class="info-box-number">
							  <?php if (!empty($users)) {
								  echo $users;
							  } ?>
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
							<span class="info-box-text">Total Chanel</span>
							<span class="info-box-number">
								<?php if (!empty($chanel)) {
									echo $chanel;
								} ?>
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
							<span class="info-box-text">Token Write</span>
							<span class="info-box-number">
								<?php if (!empty($token_write)) {
									echo $token_write;
								} ?>
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
							<span class="info-box-text">Token Read</span>
							<span class="info-box-number">
								<?php if (!empty($token_read)) {
									echo $token_read;
								}else { ?>
									0
								<?php } ?>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Report</h5>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-8">
									<p class="text-center">
										<strong>Waktu Report : <?php echo date('Y-m-d H:i:s')?></strong>
									</p>
									<div class="chart">
										<!-- Sales Chart Canvas -->
										<canvas id="salesChart"></canvas>
									</div>
									<!-- /.chart-responsive -->
								</div>
								<!-- /.col -->
								<div class="col-md-4">
									<p class="text-center">
										<strong>Total</strong>
									</p>
									<div class="progress-group">
										Users
										<span class="float-right"><b><?php echo $users ?></span>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary" style="width: <?= $users/100?>%">
											</div>
										</div>
									</div>
									<!-- /.progress-group -->
									<div class="progress-group">
										Chanel
										<span class="float-right"><b><?php echo $chanel?></span>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger" style="width: <?= $chanel/100?>%"></div>
										</div>
									</div>
									<!-- /.progress-group -->
									<div class="progress-group">
										<span class="progress-text">Token Read</span>
										<span class="float-right"><?php echo $token_read?></span>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success" style="width: <?= $token_read/100?>%"></div>
										</div>
									</div>
									<!-- /.progress-group -->
									<div class="progress-group">
										Token Write
										<span class="float-right"><?= $token_write ?></span>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning" style="width: <?= $token_write/100?>%"></div>
										</div>
									</div>
									<!-- /.progress-group -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
						<!-- ./card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Get canvas element
const ctx = document.getElementById('salesChart').getContext('2d');
const gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, 'rgba(135, 206, 250, 0.5)');
gradient.addColorStop(1, 'rgba(0, 0, 128, 0.5)');

// Chart.js setup
const chart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Users', 'Channels', 'Write Tokens', 'Read Tokens'],
    datasets: [{
      data: [],
		backgroundColor: gradient,
      	borderColor: '#1e90ff',
      	borderWidth: 2
    }]
  },
  options: {
    scales: {
      x: {
        title: {
          display: true,
          text: 'Metrics'
        }
      },
      y: {
        title: {
          display: true,
          text: 'Value'
        }
      }
    }
  }
});

// Fetch data and update chart
async function updateChart() {

  const response = await fetch('http://localhost/control-iot/chart_data');
  const data = await response.json();

  chart.data.datasets[0].data = [
    data.users,
    data.chanel,
    data.token_write,
    data.token_read
  ];

  chart.update();
}

// Update every 5 seconds
setInterval(updateChart, 1000);
</script>





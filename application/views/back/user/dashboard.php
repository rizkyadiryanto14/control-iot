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
				<div id="alert" class="col-md-12">
					<div class="alert alert-success" role="alert">
						Selamat Datang <?= $this->session->userdata('username') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<div class="col-md-12 pb-2">
					<form action="<?= base_url('bazzerStatus') ?>" method="post">
						<input type="hidden" name="id" id="id" value="<?= $bazzer_status['id'] ?>">
						<button class="btn btn-primary <?= $var = $bazzer_status['status'] == 1 ? 'btn btn-primary ' : 'btn btn-danger' ?>">Button Danger</button>
					</form>
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-gradient-gray elevation-1"><i class="fas fa-users-cog"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Total Chanel</span>
							<span class="info-box-number">
								<?= /** @var TYPE_NAME $chanelByUser */
								$chanelByUser ?>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>
				<!-- fix for small devices only -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-pencil-alt"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Hit API</span>
							<span class="info-box-number">
								<div class="temperatureChar"></div>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon <?= $var = $bazzer_status['status'] == 1 ? 'bg-primary ' : 'bg-danger' ?> elevation-1"><i class="fas fa-pencil-alt"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Help</span>
							<span class="info-box-number">
								<button class="btn btn-primary btn-sm">Help</button>
							</span>
						</div>
					</div>

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

<script>
	// Menghilangkan alert setelah 15 detik
	setTimeout(function() {
		$('#alert').fadeOut('slow');
	}, 1500);
</script>










<style>
	.pagination {
		display: flex;
		padding: 1em 0;
	}

	.pagination a,
	.pagination strong {
		border: 1px solid silver;
		border-radius: 8px;
		color: black;
		padding: 0.5em;
		margin-right: 0.5em;
		text-decoration: none;
	}

	.pagination a:hover,
	.pagination strong {
		border: 1px solid #008cba;
		background-color: #008cba;
		color: white;
	}
</style>

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
							<span class="info-box-text"><?= $chanel['field1'] ?></span>
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
							<span class="info-box-text"><?=$chanel['field2'] ?></span>
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
							<span class="info-box-text"><?= $chanel['field3'] ?></span>
							<span class="info-box-number">
								<div class="oxygen"></div>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-pencil-ruler"></i></span>
						<div class="info-box-content">
							<span class="info-box-text"><?= $chanel['field4'] ?></span>
							<span class="info-box-number">
								<div class="oxygen"></div>
							</span>
						</div>
					</div>
				</div>
				<!-- /.col -->
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><?= $var = $chanel['field1'] ? $chanel['field1'] : 'field1' ?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<canvas id="field1Chart"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><?= $var = $chanel['field2'] ? $chanel['field2'] : 'field2' ?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<canvas id="field2Chart"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><?= $var = $chanel['field3'] ? $chanel['field3'] : 'field3' ?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<canvas id="field3Chart"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><?= $var = $chanel['field4'] ? $chanel['field4'] : 'field4' ?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<canvas id="field4Chart"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><?= $var = $chanel['field5'] ? $chanel['field5'] : 'field5' ?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<canvas id="field5Chart"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><?= $var = $chanel['field6'] ? $chanel['field6'] : 'field6' ?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<canvas id="field6Chart"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><?= $var = $chanel['field7'] ? $chanel['field7'] : 'field7' ?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<canvas id="field7Chart"></canvas>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><?= $var = $chanel['field8'] ? $chanel['field8'] : 'field8' ?></h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<canvas id="field8Chart"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<?php if (!empty($grafik)){
					foreach ($grafik as $item) { ?>
					<form action="<?= base_url('user/grafikId/' . $item->chanel_id) ?>" method="post">
						<?php }
						} ?>
						<div class="form-group">
							<label for="datetimeFilterMulai">Mulai</label>
							<input type="datetime-local" class="form-control" name="mulai" id="datetimeFilterMulai">
						</div>
						<div class="form-group">
							<label for="datetimeFilterEnd">End</label>
							<input type="datetime-local" class="form-control" name="end" id="datetimeFilterEnd">
						</div>
						<div class="form-group">
							<button class="btn btn-success" name="choice" value="0" type="submit">No, Show only filter data</button>
							<button class="btn btn-primary" name="choice" value="1" type="submit" formtarget="_blank">Yes, Show Graphics</button>
						</div>
					</form>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead class="table-primary">
							<tr>
									<th>No</th>
									<th><?= $var = $chanel['field1'] ? $chanel['field1'] : 'field1' ?></th>
									<th><?= $var = $chanel['field2'] ? $chanel['field2'] : 'field2' ?></th>
									<th><?= $var = $chanel['field3'] ? $chanel['field3'] : 'field3'?></th>
									<th><?= $var = $chanel['field4'] ? $chanel['field4'] : 'field4'?></th>
									<th><?= $var = $chanel['field5'] ? $chanel['field5'] : 'field5'?></th>
									<th><?= $var = $chanel['field6'] ? $chanel['field6'] : 'field6'?></th>
									<th><?= $var = $chanel['field7'] ? $chanel['field7'] : 'field7'?></th>
									<th><?= $var = $chanel['field8'] ? $chanel['field8'] : 'field8'?></th>
									<th>Datetime</th>
							</tr>
							</thead>
							<tbody>
							<?php if (!empty($grafik)) {
								$no = 1;
								foreach ($grafik as $item) { ?>
									<td><?= $no++ ?></td>
									<td class="channel" data-id="<?= $item->chanel_id ?>"><?= $item->field1 ?></td>
									<td><?= $item->field2 ?></td>
									<td><?= $item->field3 ?></td>
									<td><?= $item->field4 ?></td>
									<td><?= $item->field5 ?></td>
									<td><?= $item->field6 ?></td>
									<td><?= $item->field7 ?></td>
									<td><?= $item->field8 ?></td>
									<td><?= $item->created_at ?></td>
									</tr>
								<?php }
							} ?>
							</tbody>
						</table>
					</div>
					<div id="pagination" class="pagination">
						<?= $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

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






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
				<div class="col-md-6">
					<div class="col-md-12">
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
					<div class="col-md-12">
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
					<div class="col-md-12">
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
					<div class="col-md-12">
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
					<div class="col-md-12">
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
					<div class="col-md-12">
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
					<div class="col-md-12">
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
					<div class="col-md-12">
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
				<div class="col-md-6">
					<?php if (!empty($grafik)){
					foreach ($grafik

					as $item) { ?>
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
							<button class="btn btn-primary" type="submit">Filter</button>
						</div>
					</form>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead class="table-primary">
							<tr>
								<th>No</th>
								<th>Field1</th>
								<th>Field2</th>
								<th>Field3</th>
								<th>Field4</th>
								<th>Field5</th>
								<th>Field6</th>
								<th>Field7</th>
								<th>Field8</th>
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






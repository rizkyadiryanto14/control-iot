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
					<div class="form-group">
						<label for="datetimeFilter">Filter</label>
						<input type="datetime-local" class="form-control" id="datetimeFilter">
					</div>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead class="table-primary">
							<tr>
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
									<td><?= $item->field1 ?></td>
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
						<!-- Tombol pagination akan ditambahkan di sini -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>






<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">List Token</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">List Token</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<button class="btn btn-primary">Add Write</button>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th>No</th>
										<th>Token Write</th>
										<th>Chanel ID</th>
										<th>Users</th>
										<th>Created</th>
									</tr>
									</thead>
									<tbody>
									<?php if (!empty($token_write)) {
										$no=1;
										foreach ($token_write as $item) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $item->token ?></td>
											<td><?= $item->id_chanel ?></td>
											<td><?= $item->username ?> </td>
											<td><?= $item->created_at?></td>
										</tr>
										<?php }
									} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<button class="btn btn-primary">Add Token Read</button>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th>No</th>
										<th>Token Read</th>
										<th>Chanel ID</th>
										<th>Users</th>
										<th>Created</th>
									</tr>
									</thead>
									<tbody>
									<?php if (!empty($token_read)) {
										$no=1;
										foreach ($token_read as $item) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $item->token ?></td>
												<td><?= $item->id_chanel?></td>
												<td><?= $item->username?> </td>
												<td><?= $item->created_at?></td>
											</tr>
										<?php }
									} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

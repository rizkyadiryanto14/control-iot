<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">My Chanel</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">My Chanel</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<a href="<?= base_url('admin/insertChanel') ?>" class="btn btn-success">New Channel</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Created</th>
									<th>Updated</th>
								</tr>
							</thead>
							<tbody>
							<?php if (isset($list_chanel)) {
								foreach ($list_chanel as $item) { ?>
									<tr>
										<td><a href="<?= base_url('admin/chanelDetail/'. $item->id_chanel) ?>"><?= $item->nama ?></a></td>
										<td><?= $item->created_at?></td>
										<td><?= $item->updated_at?></td>
									</tr>
								<?php }
							} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

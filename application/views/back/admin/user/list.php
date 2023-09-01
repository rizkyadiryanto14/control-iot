<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">List Users</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Users</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card shadow-lg">
				<div class="card-header">
					<button class="btn btn-primary" data-toggle="modal" data-target="#tambahUser">Tambah User</button>
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-7">

						</div>
						<div class="col-md-3 text-right">
							<input type="text" name="search" id="search" class="form-control" placeholder="type yo search">
						</div>
					</div>
					<div class="table-responsive ">
						<table class="table table-striped table-bordered">
							<thead class="table-primary">
								<tr class="text-center">
									<th>No</th>
									<th>Username</th>
									<th>Channel</th>
									<th>Created</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php if (!empty($list_users)) {
								$no = 1;
								foreach ($list_users as $item) { ?>
										<?php if ($item->role != 'admin'){ ?>
										<tr class="text-center">
											<td><?= $no++ ?></td>
											<td><?= $item->username ?></td>
											<td>
												<?php if (!empty($list_chanel)) {
													foreach ($list_chanel as $items) { ?>
														<ul>
															<li><?= $items['nama'] ?></li>
														</ul>
													<?php }
												} ?>
											</td>
											<td><?= $item->created_at ?></td>
											<td>
												<button class="btn btn-primary"><i class="fas fa-edit"></i></button>
												<button class="btn btn-danger"><i class="fas fa-trash"></i></button>
											</td>
										</tr>
										<?php } ?>
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

<div class="modal fade" id="tambahUser">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah User</h4>
			</div>
			<form action="<?= base_url('admin/tambah_user') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<select name="role" id="role" class="form-control">
							<option selected disabled>Pilih role</option>
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

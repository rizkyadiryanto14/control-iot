<style>
	@media (min-width: 768px) and (max-width: 991px)

	.hidden-sm {
		display: none !important;
	}

	.btn-group, .btn-group-vertical {
		position: relative;
		display: inline-block;
		vertical-align: middle;
	}

	a {
		font-family: 'Source Sans Pro', serif;
		font-size: 14px;
		line-height: 25px;
		color: #22ac3c;
		text-align: left;
	}

	.channel_title_small > a {
		color: #333;
		font-family: 'Raleway', 'sans-serif';
		font-size: 19px;
	}

	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
		padding: 8px;
		line-height: 1.42857143;
		vertical-align: top;
		border-top: 1px solid #ddd;
	}

	.table td {
		word-break: break-all;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
	}

	body {
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-size: 14px;
		line-height: 1.42857143;
		color: #333;
		background-color: #fff;
	}

</style>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">List Chanel</h1>
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
			<div class="row">
				<div class="col-md-6">
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
												<td>
													<em class="fa fa-unlock fa-fw"></em>
													<div class="channel_title_small">
														<a href="<?= base_url('admin/chanelDetail/' . $item->id_chanel) ?>"><?= $item->nama ?> </a>
													</div>
													<div class="btn-group btn-group-sm hidden-xs hidden-sm hidden-md"
														 style="margin-top:5px">
														<a class="btn btn-default"
														   href="<?= base_url('admin/chanelDetail/' . $item->id_chanel) ?>">Settings</a>
														<a class="btn btn-default"
														   href="<?= base_url('admin/chanelDetail/' . $item->id_chanel) ?>">API
															Keys</a>
														<a class="btn btn-default"
														   href="<?= base_url('admin/chanelDetail/' . $item->id_chanel) ?>">Data
															Import /
															Export</a>
													</div>
												</td>
												<td><?= $item->created_at ?></td>
												<td><?= $item->updated_at ?></td>
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
							<h3>Help</h3>
						</div>
						<div class="card-body">
							<p>
								Collect data in a HerfandiSpeak channel from a device, from another channel, or from the
								web.
								Click New Channel to create a new HerfandiSpeak channel.
								Click on the column headers of the table to sort by the entries in that column or click
								on a tag to show channels with that tag.
								Learn to create channels, explore and transform data.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

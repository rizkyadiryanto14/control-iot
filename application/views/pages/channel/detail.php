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

	<section class="content">
		<div class="container-fluid">
			<!-- sekarang masuk ke kolom isi konten -->
			<div class="card mb-4">
				<div class="card-header">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="umum-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="umum" aria-selected="true">Channel Settings</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="false">API Keys</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="icon-tab" data-toggle="tab" href="#icon" role="tab" aria-controls="icon" aria-selected="false">Data Import/Export</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="background-tab" data-toggle="tab" href="#background" role="tab" aria-controls="background" aria-selected="false">Backgroud</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="ucapan-tab" data-toggle="tab" href="#ucapan" role="tab" aria-controls="ucapan" aria-selected="false">Ucapan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="" aria-selected="false">Pokja</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="" aria-selected="false">Periode</a>
						</li>
					</ul>
				</div>

				<div class="card-body">
					<div class="tab-content" id="myTabContent">
						<!-- menu pertama -->
						<div class="tab-pane fade show active" id="umum" role="tabpanel" aria-labelledby="umum-tab">
							<form action="<?php echo site_url('admin/konfig') ?>" method="post">
								<input type="hidden" name="id_konfigurasi">
								<div class="row">
									<form action="<?= base_url('admin/channelStore') ?>" method="post">
										<?php if (isset($detail_chanel)) {
											foreach ($detail_chanel as $item) { ?>
										<div class="col-md-6 order-md-1">
													<div class="form-group">
														<label for="">Nama</label>
														<input type="text" name="nama" value="<?= $item['nama'] ?>" id="nama" class="form-control">
													</div>
													<div class="form-group">
														<label for="">Description</label>
														<input type="text" name="description" id="description" value="<?= $item['description'] ?>" class="form-control">
													</div>
													<div class="form-group">
														<label for="">Field 1</label>
														<input type="text" name="field1" id="field1" value="<?= $item['field1'] ?>" class="form-control">
													</div>
													<div class="form-group">
														<label for="">Field 2</label>
														<input type="text" name="field2" id="field2" value="<?= $item['field2'] ?>" class="form-control">
													</div>
													<div class="form-group">
														<label for="">Field 3</label>
														<input type="text" name="field3" id="field3" value="<?= $item['field3'] ?>" class="form-control">
													</div>
										</div>
										<div class="col-md-6 order-md-1">
											<div class="form-group">
												<label for="">Field 4</label>
												<input type="text" name="field4" value="<?= $item['field4'] ?>" id="field4" class="form-control">
											</div>
											<div class="form-group">
												<label for="">Field 5</label>
												<input type="text" name="field5" value="<?= $item['field5'] ?>" id="field5" class="form-control">
											</div>
											<div class="form-group">
												<label for="">Field 6</label>
												<input type="text" name="field6" value="<?= $item['field6'] ?>" id="field6" class="form-control">
											</div>
											<div class="form-group">
												<label for="">Field 7</label>
												<input type="text" name="field7" value="<?= $item['field7'] ?>" id="field7" class="form-control">
											</div>
											<div class="form-group">
												<label for="">Field 8</label>
												<input type="text" name="field8" value="<?= $item['field8'] ?>" id="field8" class="form-control">
											</div>
										</div>
											<?php }
										} ?>
									</form>
								</div>
								<div class="row col-md-12">
									<input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
									<input type="submit" name="submit" value="Simpan Konfigurasi" class="btn btn-primary">
								</div>
							</form>
						</div>
						<!-- menu kedua -->
						<div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
							<h3 class="col-md-12 order-md-1">Logo Website</h3>
							<form action="<?php echo site_url('admin/konfig/logo') ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id_konfigurasi" ">
								<div class="form-group col-md-12">
									<label>Upload Logo Baru</label>
									<input type="file" name="logo" class="form-control" id="file1">
									<div id="imagePreview"></div>
								</div>
								<div class="form-group col-md-12 mb-4">
									<label>Logo Situs Sekarang</label><br>
									<img src="" style="max-width:200px; height:auto;">
								</div>

								<div class="form-group col-md-12">
									<input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
									<input type="submit" name="submit" value="Simpan Logo" class="btn btn-primary ">
								</div>
							</form>
						</div>
						<!-- menu ketiga -->
						<div class="tab-pane fade" id="icon" role="tabpanel" aria-labelledby="icon-tab">
							<h3 class="col-md-12 order-md-1">Favicon</h3>
							<form action="<?php echo site_url('admin/konfig/icon') ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id_konfigurasi">
								<div class="form-group col-md-12">
									<label>Upload Favicon Baru</label>
									<input type="file" name="icon" class="form-control" id="file2">
									<div id="imagePreview"></div>
								</div>

								<div class="col-md-12 mb-4">
									<label>Favicon Situs Sekarang</label><br>
									<img src="" style="max-width:200px; height:auto;">
								</div>

								<div class="form-group col-md-12">
									<input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
									<input type="submit" name="submit" value="Simpan Favicon" class="btn btn-primary">
								</div>
							</form>
						</div>
						<!-- menu tambahan -->
						<div class="tab-pane fade" id="background" role="tabpanel" aria-labelledby="background-tab">
							<h3 class="col-md-12 order-md-1">Background</h3>
							<form action="<?php echo site_url('admin/konfig/background') ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id_konfigurasi">
								<div class="form-group col-md-12">
									<label>Upload Background Baru</label>
									<input type="file" name="back" class="form-control" id="file3">
								</div>

								<div class="col-md-9 mb-4">
									<label>Background Situs Sekarang</label><br>
									<img src="" style="max-width:80%; height:auto;">
								</div>

								<div class="form-group col-md-12">
									<input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
									<input type="submit" name="submit" value="Simpan Background" class="btn btn-primary">
								</div>
							</form>
						</div>
						<!-- menu keempat -->
						<script src="https://cdn.tiny.cloud/1/7ko2ftgz9ujgvnh1tq2wbfamm5ztwaieu3mi3b8ayc69fxrh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
						<script type="text/javascript">
							tinymce.init({
								selector: '#keterangan',
								plugins: [
									'advlist autolink link image lists charmap print preview hr anchor pagebreak',
									'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
									'table emoticons template paste help',
									'autoresize'
								],
								toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
									'bullist numlist outdent indent | link image | print preview media fullpage | ' +
									'forecolor backcolor emoticons | help',
								menu: {
									favs: {
										title: 'My Favorites',
										items: 'code visualaid | searchreplace | emoticons'
									}
								},
								menubar: 'favs file edit view insert format tools table help',
								mobile: {
									menubar: true
								}
							});
						</script>
						<div class="tab-pane fade" id="ucapan" role="tabpanel" aria-labelledby="ucapan-tab">
							<form action="<?php echo site_url('admin/konfig/ucapan') ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id_konfigurasi" >
								<h3 class="col-md-12 order-md-1">Ucapan Perkenalan</h3>
								<div class="col-md-12 order-md-1">
									<div class="form-group">
										<label>Judul</label>
										<input type="text" name="welcome_say" placeholder="Judul Ucapan" required class="form-control">
									</div>

									<div class="form-group">
										<label>Deksripsi</label>
										<textarea name="deskripsi_say" id="keterangan" class="form-control" required placeholder="Deskripsi kalimat sambutan"></textarea>
									</div>
								</div>
								<div class="col-md-4 order-md-1">

									<div class="form-group">
										<label>Foto Sambutan Sekarang</label><br>
										<img src="" style="max-width:80%; height:auto;">
									</div>

									<div class="form-group">
										<label>Upload Foto Sambutan</label>
										<input type="file" name="foto_sambutan" class="form-control">
									</div>

								</div>

								<div class="form-group col-md-12">
									<input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
									<input type="submit" name="submit" value="Simpan Ucapan" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div> <!-- akhir div card body -->
			</div> <!-- akhir div card -->
		</div>
	</section>
</div>

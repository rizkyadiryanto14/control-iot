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
							<a class="nav-link active" id="umum-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="umum" aria-selected="true">Channel</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="false">Feeds</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="icon-tab" data-toggle="tab" href="#icon" role="tab" aria-controls="icon" aria-selected="false">Favicon</a>
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
								<div class="row mb-3">
									<div class="col-md-6 order-md-1">
										<h3>Channel Settings</h3>
										<div class="form-group">
											<label>Nama Situs</label>
											<input type="text" name="namaweb" placeholder="Nama Situs" required class="form-control">
										</div>
										<div class="form-group">
											<label>Nama Desa</label>
											<input type="text" name="tagline" placeholder="Nama Desa"  required class="form-control">
										</div>
										<div class="form-group">
											<label>Keterangan situs</label>
											<textarea name="tentang" rows="3" class="form-control" placeholder="Keterangan Situs"></textarea>
										</div>
										<div class="form-group">
											<label>Efek Slide Halaman Utama</label>
											<select name="slide_setting" class="form-control">
												<option value="Geser">Slide Geser</option>
												<option value="Fade">Slide Timbul</option>
											</select>
										</div>
										<div class="form-group">
											<label>Email resmi</label>
											<input type="email" name="email" placeholder="youremail@address.com"  class="form-control" required>
										</div>
										<div class="form-group">
											<label>Alamat Lengkap</label>
											<textarea name="alamat" rows="3" class="form-control" placeholder="Alamat lengkap"></textarea>
										</div>
										<div class="form-group">
											<label>Nomer Telp</label>
											<input type="text" name="telepon" placeholder="021-000000"  class="form-control">
										</div>
										<div class="form-group">
											<label>Handphone/seluler</label>
											<input type="text" name="hp" placeholder="+628-00000-0000"  class="form-control">
										</div>
									</div>
									<div class="col-md-6 order-md-1">
										<h3>Akun Sosial Media</h3>
										<div class="form-group">
											<label>Facebook</label>
											<input type="url" name="facebook" placeholder="http://facebook.com/namakamu"  class="form-control">
										</div>
										<div class="form-group">
											<label>Twitter</label>
											<input type="url" name="twitter" placeholder="http://twitter.com/namakamu"  class="form-control">
										</div>
										<div class="form-group">
											<label>Instagram</label>
											<input type="url" name="instagram" placeholder="http://instagram.com/namakamu" class="form-control">
										</div>
										<hr>
										<h3>Lokasi Google Map</h3>
										<div class="form-group">
											<label>Google Map</label>
											<textarea name="google_map" rows="5" class="form-control" placeholder="Kode dari Google Map"></textarea>
										</div>
										<div class="form-group map">

										</div>
									</div>
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

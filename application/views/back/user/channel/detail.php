<style>
	pre {
		display: block;
		padding: 10px;
		margin: 0 0 10px;
		font-size: 13px;
		line-height: 1.42857143;
		word-break: break-all;
		word-wrap: break-word;
		color: #333;
		background-color: #f5f5f5;
		border: 1px solid #ccc;
		border-radius: 4px;
	}
</style>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<?php if (isset($detail_chanel)) {
					foreach ($detail_chanel as $item) { ?>
						<div class="col-sm-6">
							<h1 class="m-0"><?= $item['nama'] ?></h1>
							<table>
								<td>Chanel ID</td>
								<td>: <?= $item['id_chanel'] ?></td>
							</table>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Detail Settings</li>
							</ol>
						</div><!-- /.col -->
					<?php }
				} ?>
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
							<a class="nav-link active" id="umum-tab" data-toggle="tab" href="#umum" role="tab"
							   aria-controls="umum" aria-selected="true">Channel Settings</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab"
							   aria-controls="logo" aria-selected="false">API Keys</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="icon-tab" data-toggle="tab" href="#icon" role="tab"
							   aria-controls="icon" aria-selected="false">Data Import/Export <small
									class="badge badge-danger">Beta</small></a>
						</li>
					</ul>
				</div>

				<div class="card-body">
					<div class="tab-content" id="myTabContent">
						<!-- menu pertama -->
						<div class="tab-pane fade show active" id="umum" role="tabpanel" aria-labelledby="umum-tab">
							<form action="<?= base_url('user/update_chanel') ?>" method="post">
								<div class="row">
									<?php if (isset($detail_chanel)) {
										foreach ($detail_chanel as $item) { ?>
											<div class="col-md-6 order-md-1">
												<h3 class="col-md-6 order-md-1">Channel Settings</h3>
												<div class="form-group">
													<input type="hidden" name="id_chanel" id="id_chanel"
														   value="<?= $item['id_chanel'] ?>">
													<label for="nama">Nama</label>
													<input type="text" name="nama" value="<?= $item['nama'] ?>"
														   id="nama" class="form-control">
												</div>
												<div class="form-group">
													<label for="description">Description</label>
													<input type="text" name="description" id="description"
														   value="<?= $item['description'] ?>" class="form-control">
												</div>
												<div class="form-group">
													<label for="field1">Field 1</label>
													<input type="text" name="field1" id="field1"
														   value="<?= $item['field1'] ?>" class="form-control">
												</div>
												<div class="form-group">
													<label for="field2">Field 2</label>
													<input type="text" name="field2" id="field2"
														   value="<?= $item['field2'] ?>" class="form-control">
												</div>
												<div class="form-group">
													<label for="field3">Field 3</label>
													<input type="text" name="field3" id="field3"
														   value="<?= $item['field3'] ?>" class="form-control">
												</div>
												<div class="form-group">
													<label for="field4">Field 4</label>
													<input type="text" name="field4" value="<?= $item['field4'] ?>"
														   id="field4" class="form-control">
												</div>
												<div class="form-group">
													<label for="field5">Field 5</label>
													<input type="text" name="field5" value="<?= $item['field5'] ?>"
														   id="field5" class="form-control">
												</div>
												<div class="form-group">
													<label for="field6">Field 6</label>
													<input type="text" name="field6" value="<?= $item['field6'] ?>"
														   id="field6" class="form-control">
												</div>
												<div class="form-group">
													<label for="field7">Field 7</label>
													<input type="text" name="field7" value="<?= $item['field7'] ?>"
														   id="field7" class="form-control">
												</div>
												<div class="form-group">
													<label for="field8">Field 8</label>
													<input type="text" name="field8" value="<?= $item['field8'] ?>"
														   id="field8" class="form-control">
												</div>
												<div class="row col-md-12">
													<button class="btn btn-primary" type="submit">Simpan Perubahan
													</button>
												</div>
											</div>
										<?php }
									} ?>

									<div class="col-md-6 order-md-1">
										<h3 class="col-md-12 order-md-1">Help</h3>
										<span>Channels store all the data that a ThingSpeak application collects. Each channel includes eight fields that can hold any type of data, plus three fields for location data and one for status data. Once you collect data in a channel, you can use ThingSpeak apps to analyze and visualize it.</span>
										<h3 class="col-md-12 order-md-1 mt-5">Channel Settings</h3>
										<ul>
											<li><b>Percentage complete:</b> Calculated based on data entered into the
												various fields of a channel. Enter the name, description, location, URL,
												video, and tags to complete your channel.
											</li>
											<li><b>Channel Name : </b> Enter a unique name for the ThingSpeak channel.
											</li>
											<li><b>Description : </b> Enter a description of the ThingSpeak channel.
											</li>
											<li><b>Field# : </b> Check the box to enable the field, and enter a field
												name. Each ThingSpeak channel can have up to 8 fields.
											</li>
										</ul>
									</div>
								</div>
							</form>
						</div>
						<!-- menu kedua -->
						<div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
							<div class="row">
								<div class="col-md-6">
									<h3 class="col-md-12 order-md-1">Write API Keys</h3>
									<div class="form-group">
										<div class="row">
											<div class="col-md-2">
												<label for="token">Key</label>
											</div>
											<div class="col-md-6">
												<input type="text" name="token" id="token" class="form-control"
													   value="<?php echo empty($token['token']) ? '' : $token['token']; ?>"
													   readonly>
												<form action="<?= base_url('backend/token_generate') ?>" method="post">
													<button class="btn btn-warning mt-3" type="submit">Generate New
														Write API Keys
													</button>
												</form>
											</div>
										</div>
									</div>
									<h3 class="col-md-12 order-md-1 mt-4">Read API Keys <small
											class="badge badge-danger"> Beta</small></h3>
									<div class="form-group">
										<div class="row">
											<div class="col-md-2">
												<label for="">Key</label>
											</div>
											<div class="col-md-6">
												<input type="text" name="token" id="token" class="form-control"
													   value="3255M9TDREGG5ZHP"
													   readonly>
											</div>
										</div>
										<div class="row">
											<div class="col-md-2">
												<label class="mt-2" for="">Note</label>
											</div>
											<div class="col-md-6">
												<input type="text" name="token" id="token" class="form-control mt-3">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<h3 class="col-md-12 order-md-1">Help</h3>
									<div class="form-group">
										API keys enable you to write data to a channel or read data from a private
										channel. API keys are auto-generated when you create a new channel.
									</div>
									<h3 class="col-md-12 order-md-1">API Keys Settings</h3>
									<ul>
										<li><b>Write API Key:</b> Use this key to write data to a channel. If you feel
											your key has been compromised, click Generate New Write API Key.
										</li>
										<li><b>Read API Keys:</b> Use this key to allow other people to view your
											private channel feeds and charts. Click Generate New Read API Key to
											generate an additional read key for the channel.
										</li>
										<li><b>Note:</b> Use this field to enter information about channel read keys.
											For example, add notes to keep track of users with access to your channel.
										</li>
									</ul>
									<h3 class="col-md-12 order-md-1">API Request</h3>
									<div class="col-pad">
										<a href="#">Write a Channel Feed</a>
										<pre>GET <span class="str"><?= base_url() ?>insertChanel?api_key=<span
													class="customcode"><?php echo empty($token['token']) ? '' : $token['token']; ?></span>&chanel_id=<<i>Chanel_Id</i>>&amp;field1=<span
													class="customcode">0</span></span></pre>
										<a href="#">Read a Channel Feed <small class="badge badge-danger"> Beta</small></a>
										<pre>GET <span class="str">https://api.thingspeak.com/update?api_key=<span
													class="customcode"><?php echo empty($token['token']) ? '' : $token['token']; ?>></span>&amp;field1=<span
													class="customcode">0</span></span></pre>
										<a href="#">Read a Channel Field <small class="badge badge-danger"> Beta</small></a>
										<pre>GET <span class="str">https://api.thingspeak.com/update?api_key=<span
													class="customcode"><?php echo empty($token['token']) ? '' : $token['token']; ?>></span>&amp;field1=<span
													class="customcode">0</span></span></pre>
										<a href="#">Read Channel Status Updates <small class="badge badge-danger">
												Beta</small></a>
										<pre>GET <span class="str">https://api.thingspeak.com/update?api_key=<span
													class="customcode"><?php echo empty($token['token']) ? '' : $token['token']; ?>></span>&amp;field1=<span
													class="customcode">0</span></span></pre>
									</div>
								</div>
							</div>
						</div>
						<!-- menu ketiga -->
						<div class="tab-pane fade" id="icon" role="tabpanel" aria-labelledby="icon-tab">
							<div class="row">
								<div class="col-md-6">
									<div class="import">
										<h3 class="col-md-12 order-md-1">Import</h3>
										<form action="#" method="post"
											  enctype="multipart/form-data">
											<input type="hidden" name="id_konfigurasi">
											<div class="form-group col-md-12">
												<label>Upload a CSV file to import data into this channel.</label>
												<input type="file" name="icon" class="form-control" id="file2">
												<div id="imagePreview"></div>
											</div>

											<div class="form-group col-md-12">
												<input type="submit" name="submit" value="Upload"
													   class="btn btn-success">
											</div>
										</form>
									</div>
									<div class="export">
										<h3 class="col-md-12 order-md-1">Export</h3>
										<form action="#" method="post"
											  enctype="multipart/form-data">
											<input type="hidden" name="id_konfigurasi">
											<div class="form-group col-md-12">
												<label>Download all of this Channel's feeds in CSV format.</label>
											</div>
											<div class="form-group col-md-12">
												<input type="submit" name="submit" value="Download"
													   class="btn btn-success">
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-6">
									<h2 class="col-md-12 order-md-1">Help</h2>
									<div class="import  mt-4">
										<h3 class="col-md-12 order-md-1">Import</h3>
										<p>The correct format for data import is provided in this CSV Import Template
											File.
											Use the field names <em>field1</em>, <em>field2</em>, and so on, instead of
											custom field
											names</p>
										<a href="#">CSV Import Format</a>
										<pre>created_at,field1,field3,field4,field8,elevation 2019-01-01T10:11:12-05:00,11,33,44,88,10</pre>
									</div>
								</div>
							</div>
						</div>
						<!-- menu tambahan -->
					</div>
				</div> <!-- akhir div card body -->
			</div> <!-- akhir div card -->
		</div>
	</section>
</div>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">New Channel</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">New Channel</li>
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
							<h3 class="card-title">New Channel</h3>
						</div>
						<form action="<?= base_url('admin/channelStore') ?>" method="post">
							<div class="card-body">
								<div class="form-group">
									<label for="id_user">Choose User</label>
									<select name="id_user" id="id_user" class="form-control">
										<option selected disabled>Choose User</option>
										<?php if (!empty($list_users)) {
											foreach ($list_users as $item) { ?>
												<option value="<?= $item->id ?>"><?= $item->username ?></option>
											<?php }
										} ?>
									</select>
								</div>
								<div class="form-group">
									<label for="">Name</label>
									<input type="text" name="nama" id="nama" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Description</label>
									<input type="text" name="description" id="description" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Field 1</label>
									<input type="text" name="field1" id="field1" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Field 2</label>
									<input type="text" name="field2" id="field2" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Field 3</label>
									<input type="text" name="field3" id="field3" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Field 4</label>
									<input type="text" name="field4" id="field4" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Field 5</label>
									<input type="text" name="field5" id="field5" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Field 6</label>
									<input type="text" name="field6" id="field6" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Field 7</label>
									<input type="text" name="field7" id="field7" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Field 8</label>
									<input type="text" name="field8" id="field8" class="form-control">
								</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3>Help</h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<p>
									Channels store all the data that a ThingSpeak application collects. Each channel includes eight fields that can hold any type of data, plus three fields for location data and one for status data. Once you collect data in a channel, you can use ThingSpeak apps to analyze and visualize it.
								</p>
							</div>
							<div class="form-group">
								<label for="">Channel Settings</label>
								<ul>
									<li><b>Percentage complete:</b> Calculated based on data entered into the various fields of a channel. Enter the name, description, location, URL, video, and tags to complete your channel.</li>
									<li><b>Channel Name : </b> Enter a unique name for the ThingSpeak channel.</li>
									<li><b>Description : </b>  Enter a description of the ThingSpeak channel.</li>
									<li><b>Field# : </b> Check the box to enable the field, and enter a field name. Each ThingSpeak channel can have up to 8 fields.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

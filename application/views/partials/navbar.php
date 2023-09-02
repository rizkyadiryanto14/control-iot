<style>
	.user-logo-circle {
		display: inline-block;
		width: 30px;
		height: 30px;
		border-radius: 50%;
		background-color: white;
		text-align: center;
		line-height: 30px;
	}

	.user-logo-circle i {
		color: #4a6bcc;
	}
</style>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<!-- Brand logo -->
	<a href="#" class="navbar-brand">

	</a>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto mr-3">
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<div class="user-logo-circle">
					<i class="fas fa-user"></i>
				</div>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">User Options</span>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-cog mr-2"></i> Settings
				</a>
				<div class="dropdown-divider"></div>
				<a href="<?= base_url('logout') ?>" class="dropdown-item">
					<i class="fas fa-sign-out-alt mr-2"></i> Sign Out
				</a>
			</div>
		</li>
	</ul>
</nav>
<!-- /.navbar -->

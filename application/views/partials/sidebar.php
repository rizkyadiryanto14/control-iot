<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary  elevation-4">
	<!-- Brand Logo -->
	<a href="" class="brand-link">
		<img src="<?= base_url() ?>back_assets/img/logo.png" alt="AdminLTE Logo"
			 class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Dashboard Panel</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url() ?>back_assets/img/default.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="<?= base_url('admin/dashboard') ?>" class="d-block">Admin</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item menu-open">
					<a href="<?= base_url('admin/dashboard') ?>" class="nav-link active">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/chanel') ?>" class="nav-link pl-3">
						<i class="fas fa-book-open pl-2"></i>
						<p>Chanel</p>
						<small class="badge badge-danger">Beta</small>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

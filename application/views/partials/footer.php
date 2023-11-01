<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>back_assets/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?= base_url() ?>back_assets/dist/js/myjs/chart.js"></script>
<script src="<?= base_url() ?>back_assets/dist/js/myjs/table_feeds.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>back_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>back_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>back_assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>back_assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>back_assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>back_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>back_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>back_assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>back_assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url() ?>back_assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>back_assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>back_assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>back_assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<!--<script src="--><?php //= base_url('back_assets/js/user/dashboard_users.js') ?><!--"></script>-->

<!-- Tempusdominus Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata('sukses')) : ?>
	<script>
		Swal.fire({
			title: 'Succes!',
			text: '<?php echo $this->session->flashdata('sukses'); ?>',
			icon: 'success',
			confirmButtonText: 'OK'
		});
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('gagal')) : ?>
	<script>
		Swal.fire({
			title: 'Wrong !',
			text: '<?php echo $this->session->flashdata('gagal'); ?>',
			icon: 'error',
			confirmButtonText: 'OK'
		});
	</script>
<?php endif; ?>

<script
	src="<?= base_url() ?>back_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>back_assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>back_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>back_assets/dist/js/adminlte.js"></script>
</body>
</html>

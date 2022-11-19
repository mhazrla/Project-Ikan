<?php

defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>© <?= date('Y') ?> Copyright || Created by Simonair || SV IPB</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>


<script>
	const navbar = document.querySelector('.col-navbar')
	const cover = document.querySelector('.screen-cover')

	const sidebar_items = document.querySelectorAll('.sidebar-item')

	function toggleNavbar() {
		navbar.classList.toggle('d-none')
		cover.classList.toggle('d-none')
	}

	function toggleActive(e) {
		sidebar_items.forEach(function(v, k) {
			v.classList.remove('active')
		})
		e.closest('.sidebar-item').classList.add('active')

	}

	$(document).ready(function() {
		$('table').DataTable();
		setInterval(function() {
			$('.data').load("<?= base_url('MonitoringController/sensorVal') ?>");
		}, 500);

		setInterval(function() {
			$('.dashboard-data').load("<?= base_url('MonitoringController/dashboardData') ?>");
		}, 500);

	});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</body>

</html>

<!-- Begin Page Content -->
<div class="container">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="row">
			<div class="col">
				<?php if ($this->session->userdata('role_id') == 1) : ?>
					<a class="btn btn-danger me-3 px-4 rounded-pill" href="<?= base_url('delete/' . $this->uri->segment(2))  ?>" onclick="return confirm('Yakin ingin menghapus data?')">
						<span class="material-symbols-outlined align-text-top">
							delete
						</span>
						<span>Clear</span>
					</a>
				<?php endif; ?>

				<a class="btn btn-primary me-4 px-4 rounded-pill " href="<?= base_url('export/') . $this->uri->segment(2) ?>">
					<span class="material-symbols-outlined align-text-top">
						file_download
					</span>
					<span>Download</span>
				</a>
			</div>
		</div>
	</div>

	<div class="container table-responsive mb-5" style="height: 100%;">
		<!-- Table start -->
		<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Waktu</th>
					<th scope="col">PH</th>
					<th scope="col">Suhu</th>
					<th scope="col">Amonia</th>
					<th scope="col">TDS</th>
					<th scope="col">TSS</th>
					<th scope="col">Salinitas</th>
					<th scope="col">Status</th>
				</tr>
			</thead>

			<tbody>

				<?php
				$no = 1;
				foreach ($detail as $data) : ?>

					<tr>
						<th scope="col"><?= $no++ ?></th>
						<th scope="col"><?= $data['waktu'] ?></th>
						<th scope="col"><?= $data['ph'] ?></th>
						<th scope="col"><?= $data['suhu'] ?></th>
						<th scope="col"><?= $data['amonia'] ?></th>
						<th scope="col"><?= $data['tds'] ?></th>
						<th scope="col"><?= $data['tss'] ?></th>
						<th scope="col"><?= $data['salinitas'] ?></th>
						<th scope="col"><?= $data['status'] ?></th>
					</tr>
				<?php endforeach; ?>

			</tbody>
		</table>
		<!-- Table end -->
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

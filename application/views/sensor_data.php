<?php foreach ($sensor as $s) : ?>
	<div class="row">

		<!-- <div class="data"></div> -->

		<div class="col-xl col-lg">
			<h4 class="mx-3 pb-2 font-weight-bold text-muted"><?= $s->nama ?></h4>
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-muted">Update time : <span class="fw-light"><?= $s->waktu ?></span></h6>
					<h6 class="m-0 font-weight-bold text-muted">Status : <span class="fw-light"><?= $s->status ?></span></h6>
					<?php if ($s->status === "Kualitas air baik!") : ?>
						<span class="p-2 bg-success border border-light rounded-circle"></span>
					<?php elseif ($s->status === "Kualitas air buruk!") : ?>
						<span class=" p-2 bg-danger border border-light rounded-circle"></span>
					<?php endif; ?>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<?php if ($this->session->userdata('role_id') == 1) : ?>
						<a type="button" class="btn-close btn float-end" href="<?= base_url('monitoring/delete/') . $s->id ?>"></a>
					<?php endif; ?>
					<div class="row align-items-center row-cols-3">

						<div class="col mb-3">
							<div class="card rounded-5 <?php if ($s->ph > 7.5 || $s->ph < 6.5) echo 'bg-danger' ?>" style="background-color: #64B5F6;color: #fff;">
								<div class="card-header bg-transparent border-0">
									<div class="d-flex justify-content-center" style="height: 131px;">
										<img src="<?= base_url() ?>assets/img/PH.png" class="img-fluid pt-3 mx-auto" alt="PH">
									</div>
								</div>
								<div class="card-body text-center">
									<h4 class="card-title mb-3">pH</h4>
									<h4 class="text-center"><?= $s->ph ?> pH</h4>
								</div>
							</div>
						</div>

						<div class="col mb-3">
							<div class="card rounded-5 <?php if ($s->suhu > 29 || $s->suhu < 27) echo 'bg-danger' ?>" style="background-color: #64B5F6;color: #fff;">
								<div class="card-header bg-transparent border-0">
									<div class="d-flex justify-content-center" style="height: 131px;">
										<img src="<?= base_url() ?>assets/img/Temperature.png" class="img-fluid pt-3 mx-auto" alt="Suhu">
									</div>
								</div>
								<div class="card-body text-center">
									<h4 class="card-title mb-3">SUHU</h4>
									<h4 class="text-center"><?= $s->suhu ?> °C</h4>
								</div>
							</div>
						</div>

						<div class="col mb-3">
							<div class="card rounded-5 <?php if ($s->amonia > 0.1) echo 'bg-danger' ?>" style="background-color: #64B5F6;color: #fff;">
								<div class="card-header bg-transparent border-0">
									<div class="d-flex justify-content-center" style="height: 131px;">
										<img src="<?= base_url() ?>assets/img/Amonia.svg" class="img-fluid pt-3 mx-auto" alt="Amonia">
									</div>
								</div>
								<div class="card-body text-center">
									<h4 class="card-title mb-3">AMONIA</h4>
									<h4 class="text-center"><?= $s->amonia ?> g/L</h4>
								</div>
							</div>
						</div>

						<div class="col mb-3">
							<div class="card rounded-5 <?php if ($s->tds > 1000) echo 'bg-danger' ?>" style="background-color: #64B5F6;color: #fff;">
								<div class="card-header bg-transparent border-0">
									<div class="d-flex justify-content-center" style="height: 131px;">
										<img src="<?= base_url() ?>assets/img/tds.png" class="img-fluid pt-3 mx-auto" alt="TDS">
									</div>
								</div>
								<div class="card-body text-center">
									<h4 class="card-title mb-3">TDS</h4>
									<h4 class="text-center"><?= $s->tds ?> PPM</h4>
								</div>
							</div>
						</div>

						<div class="col mb-3">
							<div class="card rounded-5 <?php if ($s->tss > 5) echo 'bg-danger' ?>" style="background-color: #64B5F6;color: #fff;">
								<div class="card-header bg-transparent border-0">
									<div class="d-flex justify-content-center" style="height: 131px;">
										<img src="<?= base_url() ?>assets/img/TSS.png" class="img-fluid pt-3 mx-auto" alt="TSS">
									</div>
								</div>
								<div class="card-body text-center">
									<h4 class="card-title mb-3">TSS</h4>
									<h4 class="text-center"><?= $s->tss ?> Ntu</h4>
								</div>
							</div>
						</div>

						<div class="col mb-3">
							<div class="card rounded-5 <?php if ($s->salinitas !== 3) echo 'bg-danger' ?>" style="background-color: #64B5F6;color: #fff;">
								<div class="card-header bg-transparent border-0">
									<div class="d-flex justify-content-center" style="height: 131px;">
										<img src="<?= base_url() ?>assets/img/salinitas.png" class="img-fluid pt-3 mx-auto" alt="Salinitas">
									</div>
								</div>
								<div class="card-body text-center">
									<h4 class="card-title mb-3">SALINITAS</h4>
									<h4 class="text-center"><?= $s->salinitas ?> PPM</h4>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>

	</div>
<?php endforeach; ?>
	<div class="row">

		<div class="col-xl col-lg mt-4">
			<div class="card my-0">

				<!-- Card Body -->
				<div class="card-body">

					<div class="row align-items-center row-cols-3">

						<?php foreach ($sensor as $s) : ?>
							<div class="col mb-3">
								<div class="card rounded-5 " style="background-color: #64B5F6;color: #fff;">
									<div class="card-body text-center">
										<h5 class="card-title mb-3 text-break text-capitalize"><?= $s->nama ?></h5>
										<div class="table-responsive">
											<table class="table text-white font-weight-bold table-sm mb-0">
												<thead>
													<tr>
														<th scope="col">Sensor</th>
														<th scope="col">Value</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th scope="row">PH</th>
														<td>
															<?= $s->ph ?>
														</td>
													</tr>

													<tr>
														<th scope="row">Suhu</th>
														<td><?= $s->suhu ?></td>
													</tr>

													<tr>
														<th scope="row">Amonia</th>
														<td><?= $s->amonia ?></td>
													</tr>

													<tr>
														<th scope="row">TDS</th>
														<td><?= $s->tds ?></td>
													</tr>

													<tr>
														<th scope="row">TSS</th>
														<td><?= $s->tss ?></td>
													</tr>

													<tr>
														<th scope="row">Salinitas</th>
														<td><?= $s->salinitas ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
						<?php endforeach; ?>

					</div>

					<span class="d-flex justify-content-center">Update time : <?= $s->waktu ?></span>
				</div>
			</div>
		</div>

	</div>

<!-- Begin Page Content -->
<div class="container">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<div class="col-lg">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Statistik Alat</h6>

				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area">
						<div id="graph" class="w-100"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	Morris.Line({
		element: 'graph',
		data: <?php echo $avg; ?>,
		xkey: 'date',
		ykeys: ['pH', 'suhu', 'amonia', 'TDS', 'TSS', 'salinitas'],
		labels: ['pH', 'suhu', 'amonia', 'TDS', 'TSS', 'salinitas'],

	});
</script>

</div>
<!-- End of Main Content -->
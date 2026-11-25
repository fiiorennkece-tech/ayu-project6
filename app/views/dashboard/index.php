<div class="mb-4">
	<h2 class="fw-bold mb-1">Dashboard</h2>
	<p class="text-secondary mb-0">Sistem akademik berbasis MVC sederhana.</p>
</div>

<div class="alert alert-primary d-flex align-items-center" role="alert">
	<i class="bi bi-info-circle-fill fs-4 me-3"></i>
	<div>Selamat datang di aplikasi akademik menggunakan PHP MVC.</div>
</div>

<?php if (!$data['available']) { ?>
	<div class="alert alert-warning" role="alert">
		Database akademik belum tersedia. Periksa konfigurasi pada <code>inc/config.php</code>
		dan jalankan <code>database.sql</code> untuk menyiapkannya.
	</div>
<?php } ?>

<div class="row g-3">
	<?php
	$cards = [
		['mahasiswa', 'Mahasiswa', 'bi-people'],
		['dosen', 'Dosen', 'bi-person-badge'],
		['matakuliah', 'Matakuliah', 'bi-journal-bookmark'],
	];
	foreach ($cards as [$key, $label, $icon]) {
	?>
		<div class="col-12 col-md-4">
			<div class="card border-0 shadow-sm h-100">
				<div class="card-body d-flex align-items-center gap-3">
					<i class="bi <?php echo e($icon); ?> fs-2 text-primary"></i>
					<div>
						<div class="text-secondary"><?php echo e($label); ?></div>
						<div class="fs-3 fw-bold"><?php echo $data['available'] ? e($data['counts'][$key]) : 'N/A'; ?></div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>

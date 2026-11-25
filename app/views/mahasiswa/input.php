<?php
$old = $flash['old'] ?? [];
$errors = $flash['errors'] ?? [];
?>
<div class="mb-4">
	<h2 class="fw-bold mb-1">Input Mahasiswa</h2>
	<p class="text-secondary mb-0">Masukkan data mahasiswa baru.</p>
</div>
<div class="row"><div class="col-12 col-lg-7">
	<div class="card border-0 shadow-sm"><div class="card-body p-4">
		<form action="<?php echo URL; ?>/mahasiswa/simpan" method="post">
			<div class="mb-3">
				<label for="mhsw_nim" class="form-label">NIM</label>
				<input type="text" class="form-control <?php echo isset($errors['mhsw_nim']) ? 'is-invalid' : ''; ?>" id="mhsw_nim" name="mhsw_nim" maxlength="25" required value="<?php echo e($old['mhsw_nim'] ?? ''); ?>">
				<?php if (isset($errors['mhsw_nim'])) { ?><div class="invalid-feedback"><?php echo e($errors['mhsw_nim']); ?></div><?php } ?>
			</div>
			<div class="mb-3">
				<label for="mhsw_nama" class="form-label">Nama</label>
				<input type="text" class="form-control <?php echo isset($errors['mhsw_nama']) ? 'is-invalid' : ''; ?>" id="mhsw_nama" name="mhsw_nama" maxlength="100" required value="<?php echo e($old['mhsw_nama'] ?? ''); ?>">
				<?php if (isset($errors['mhsw_nama'])) { ?><div class="invalid-feedback"><?php echo e($errors['mhsw_nama']); ?></div><?php } ?>
			</div>
			<div class="mb-3">
				<label for="mhsw_alamat" class="form-label">Alamat</label>
				<textarea class="form-control <?php echo isset($errors['mhsw_alamat']) ? 'is-invalid' : ''; ?>" id="mhsw_alamat" name="mhsw_alamat" rows="4" maxlength="5000"><?php echo e($old['mhsw_alamat'] ?? ''); ?></textarea>
				<?php if (isset($errors['mhsw_alamat'])) { ?><div class="invalid-feedback"><?php echo e($errors['mhsw_alamat']); ?></div><?php } ?>
			</div>
			<div class="d-flex gap-2">
				<button type="submit" class="btn btn-primary"><i class="bi bi-floppy me-1"></i> Simpan</button>
				<a href="<?php echo URL; ?>/mahasiswa" class="btn btn-secondary"><i class="bi bi-x-circle me-1"></i> Batal</a>
			</div>
		</form>
	</div></div>
</div></div>

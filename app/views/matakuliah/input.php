<?php
$old = $flash['old'] ?? [];
$errors = $flash['errors'] ?? [];
?>
<div class="mb-4"><h2 class="fw-bold mb-1">Input Matakuliah</h2><p class="text-secondary mb-0">Masukkan data matakuliah baru.</p></div>
<div class="row"><div class="col-12 col-lg-7"><div class="card border-0 shadow-sm"><div class="card-body p-4">
	<form action="<?php echo URL; ?>/matakuliah/simpan" method="post">
		<div class="mb-3"><label for="matkul_kode" class="form-label">Kode Matakuliah</label>
			<input type="text" class="form-control <?php echo isset($errors['matkul_kode']) ? 'is-invalid' : ''; ?>" id="matkul_kode" name="matkul_kode" maxlength="25" required value="<?php echo e($old['matkul_kode'] ?? ''); ?>">
			<?php if (isset($errors['matkul_kode'])) { ?><div class="invalid-feedback"><?php echo e($errors['matkul_kode']); ?></div><?php } ?>
		</div>
		<div class="mb-3"><label for="matkul_nama" class="form-label">Nama Matakuliah</label>
			<input type="text" class="form-control <?php echo isset($errors['matkul_nama']) ? 'is-invalid' : ''; ?>" id="matkul_nama" name="matkul_nama" maxlength="100" required value="<?php echo e($old['matkul_nama'] ?? ''); ?>">
			<?php if (isset($errors['matkul_nama'])) { ?><div class="invalid-feedback"><?php echo e($errors['matkul_nama']); ?></div><?php } ?>
		</div>
		<div class="mb-3"><label for="matkul_sks" class="form-label">SKS</label>
			<input type="number" class="form-control <?php echo isset($errors['matkul_sks']) ? 'is-invalid' : ''; ?>" id="matkul_sks" name="matkul_sks" min="1" max="6" required value="<?php echo e($old['matkul_sks'] ?? ''); ?>">
			<?php if (isset($errors['matkul_sks'])) { ?><div class="invalid-feedback"><?php echo e($errors['matkul_sks']); ?></div><?php } ?>
		</div>
		<div class="mb-3"><label for="matkul_semester" class="form-label">Semester</label>
			<input type="number" class="form-control <?php echo isset($errors['matkul_semester']) ? 'is-invalid' : ''; ?>" id="matkul_semester" name="matkul_semester" min="1" max="14" required value="<?php echo e($old['matkul_semester'] ?? ''); ?>">
			<?php if (isset($errors['matkul_semester'])) { ?><div class="invalid-feedback"><?php echo e($errors['matkul_semester']); ?></div><?php } ?>
		</div>
		<div class="d-flex gap-2"><button type="submit" class="btn btn-primary"><i class="bi bi-floppy me-1"></i> Simpan</button><a href="<?php echo URL; ?>/matakuliah" class="btn btn-secondary"><i class="bi bi-x-circle me-1"></i> Batal</a></div>
	</form>
</div></div></div></div>

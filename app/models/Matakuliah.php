<?php

namespace App\Models;

use App\Core\Model;

class Matakuliah extends Model
{
	public function tampil(): array
	{
		$stmt = $this->db->prepare("SELECT * FROM tb_matakuliah ORDER BY matkul_id DESC");
		$stmt->execute();
		return $this->selects($stmt);
	}

	public function hitung(): int
	{
		return (int) $this->db->query("SELECT COUNT(*) FROM tb_matakuliah")->fetchColumn();
	}

	public function adaKode(string $kode, ?int $excludeId = null): bool
	{
		if ($excludeId !== null) {
			$stmt = $this->db->prepare("SELECT 1 FROM tb_matakuliah WHERE matkul_kode = :kode AND matkul_id <> :id");
			$stmt->execute(['kode' => $kode, 'id' => $excludeId]);
		} else {
			$stmt = $this->db->prepare("SELECT 1 FROM tb_matakuliah WHERE matkul_kode = :kode");
			$stmt->execute(['kode' => $kode]);
		}
		return (bool) $stmt->fetchColumn();
	}

	public function simpan(array $data): void
	{
		$stmt = $this->db->prepare(
			"INSERT INTO tb_matakuliah (matkul_kode, matkul_nama, matkul_sks, matkul_semester)
			VALUES (:kode, :nama, :sks, :semester)"
		);
		$stmt->execute([
			'kode' => $data['matkul_kode'],
			'nama' => $data['matkul_nama'],
			'sks' => $data['matkul_sks'],
			'semester' => $data['matkul_semester'],
		]);
	}

	public function edit(int $id): ?array
	{
		$stmt = $this->db->prepare("SELECT * FROM tb_matakuliah WHERE matkul_id = :id");
		$stmt->execute(['id' => $id]);
		$row = $this->select($stmt);
		return $row ?: null;
	}

	public function update(int $id, array $data): void
	{
		$stmt = $this->db->prepare(
			"UPDATE tb_matakuliah
			SET matkul_kode = :kode, matkul_nama = :nama, matkul_sks = :sks,
				matkul_semester = :semester
			WHERE matkul_id = :id"
		);
		$stmt->execute([
			'kode' => $data['matkul_kode'],
			'nama' => $data['matkul_nama'],
			'sks' => $data['matkul_sks'],
			'semester' => $data['matkul_semester'],
			'id' => $id,
		]);
	}

	public function delete(int $id): void
	{
		$stmt = $this->db->prepare("DELETE FROM tb_matakuliah WHERE matkul_id = :id");
		$stmt->execute(['id' => $id]);
	}
}

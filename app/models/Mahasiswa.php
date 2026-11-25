<?php

namespace App\Models;

use App\Core\Model;

class Mahasiswa extends Model
{
	public function tampil(): array
	{
		$stmt = $this->db->prepare("SELECT * FROM tb_mhsw ORDER BY mhsw_id DESC");
		$stmt->execute();
		return $this->selects($stmt);
	}

	public function hitung(): int
	{
		return (int) $this->db->query("SELECT COUNT(*) FROM tb_mhsw")->fetchColumn();
	}

	public function adaNim(string $nim, ?int $excludeId = null): bool
	{
		if ($excludeId !== null) {
			$stmt = $this->db->prepare("SELECT 1 FROM tb_mhsw WHERE mhsw_nim = :nim AND mhsw_id <> :id");
			$stmt->execute(['nim' => $nim, 'id' => $excludeId]);
		} else {
			$stmt = $this->db->prepare("SELECT 1 FROM tb_mhsw WHERE mhsw_nim = :nim");
			$stmt->execute(['nim' => $nim]);
		}
		return (bool) $stmt->fetchColumn();
	}

	public function simpan(array $data): void
	{
		$stmt = $this->db->prepare(
			"INSERT INTO tb_mhsw (mhsw_nim, mhsw_nama, mhsw_alamat)
			VALUES (:nim, :nama, :alamat)"
		);
		$stmt->execute([
			'nim' => $data['mhsw_nim'],
			'nama' => $data['mhsw_nama'],
			'alamat' => $data['mhsw_alamat'],
		]);
	}

	public function edit(int $id): ?array
	{
		$stmt = $this->db->prepare("SELECT * FROM tb_mhsw WHERE mhsw_id = :id");
		$stmt->execute(['id' => $id]);
		$row = $this->select($stmt);
		return $row ?: null;
	}

	public function update(int $id, array $data): void
	{
		$stmt = $this->db->prepare(
			"UPDATE tb_mhsw
			SET mhsw_nim = :nim, mhsw_nama = :nama, mhsw_alamat = :alamat
			WHERE mhsw_id = :id"
		);
		$stmt->execute([
			'nim' => $data['mhsw_nim'],
			'nama' => $data['mhsw_nama'],
			'alamat' => $data['mhsw_alamat'],
			'id' => $id,
		]);
	}

	public function delete(int $id): void
	{
		$stmt = $this->db->prepare("DELETE FROM tb_mhsw WHERE mhsw_id = :id");
		$stmt->execute(['id' => $id]);
	}
}

<?php

namespace App\Models;

use App\Core\Model;

class Dosen extends Model
{
	public function tampil(): array
	{
		$stmt = $this->db->prepare("SELECT * FROM tb_dosen ORDER BY dosen_id DESC");
		$stmt->execute();
		return $this->selects($stmt);
	}

	public function hitung(): int
	{
		return (int) $this->db->query("SELECT COUNT(*) FROM tb_dosen")->fetchColumn();
	}

	public function adaNip(string $nip, ?int $excludeId = null): bool
	{
		if ($excludeId !== null) {
			$stmt = $this->db->prepare("SELECT 1 FROM tb_dosen WHERE dosen_nip = :nip AND dosen_id <> :id");
			$stmt->execute(['nip' => $nip, 'id' => $excludeId]);
		} else {
			$stmt = $this->db->prepare("SELECT 1 FROM tb_dosen WHERE dosen_nip = :nip");
			$stmt->execute(['nip' => $nip]);
		}
		return (bool) $stmt->fetchColumn();
	}

	public function simpan(array $data): void
	{
		$stmt = $this->db->prepare(
			"INSERT INTO tb_dosen (dosen_nip, dosen_nama, dosen_golongan)
			VALUES (:nip, :nama, :golongan)"
		);
		$stmt->execute([
			'nip' => $data['dosen_nip'],
			'nama' => $data['dosen_nama'],
			'golongan' => $data['dosen_golongan'],
		]);
	}

	public function edit(int $id): ?array
	{
		$stmt = $this->db->prepare("SELECT * FROM tb_dosen WHERE dosen_id = :id");
		$stmt->execute(['id' => $id]);
		$row = $this->select($stmt);
		return $row ?: null;
	}

	public function update(int $id, array $data): void
	{
		$stmt = $this->db->prepare(
			"UPDATE tb_dosen
			SET dosen_nip = :nip, dosen_nama = :nama, dosen_golongan = :golongan
			WHERE dosen_id = :id"
		);
		$stmt->execute([
			'nip' => $data['dosen_nip'],
			'nama' => $data['dosen_nama'],
			'golongan' => $data['dosen_golongan'],
			'id' => $id,
		]);
	}

	public function delete(int $id): void
	{
		$stmt = $this->db->prepare("DELETE FROM tb_dosen WHERE dosen_id = :id");
		$stmt->execute(['id' => $id]);
	}
}

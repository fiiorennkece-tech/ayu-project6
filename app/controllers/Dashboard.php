<?php

namespace App\Controllers;

use App\Core\Controller;

class Dashboard extends Controller
{

	public function index()
	{
		$data = [
			'available' => true,
			'counts' => [
				'mahasiswa' => 0,
				'dosen' => 0,
				'matakuliah' => 0,
			],
		];

		try {
			$data['counts']['mahasiswa'] = (new \App\Models\Mahasiswa())->hitung();
			$data['counts']['dosen'] = (new \App\Models\Dosen())->hitung();
			$data['counts']['matakuliah'] = (new \App\Models\Matakuliah())->hitung();
		} catch (\PDOException $exception) {
			$data['available'] = false;
		}

		$this->dashboard('dashboard/index', $data);
	}
}

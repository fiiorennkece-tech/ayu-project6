CREATE DATABASE IF NOT EXISTS db_project6
	CHARACTER SET utf8mb4
	COLLATE utf8mb4_unicode_ci;

USE db_project6;

CREATE TABLE IF NOT EXISTS tb_mhsw (
	mhsw_id INT(11) NOT NULL AUTO_INCREMENT,
	mhsw_nim VARCHAR(25) NOT NULL,
	mhsw_nama VARCHAR(100) NOT NULL,
	mhsw_alamat TEXT DEFAULT NULL,
	PRIMARY KEY (mhsw_id),
	UNIQUE KEY uq_tb_mhsw_nim (mhsw_nim)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS tb_dosen (
	dosen_id INT(11) NOT NULL AUTO_INCREMENT,
	dosen_nip VARCHAR(25) NOT NULL,
	dosen_nama VARCHAR(100) NOT NULL,
	dosen_golongan VARCHAR(100) DEFAULT NULL,
	PRIMARY KEY (dosen_id),
	UNIQUE KEY uq_tb_dosen_nip (dosen_nip)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS tb_matakuliah (
	matkul_id INT(11) NOT NULL AUTO_INCREMENT,
	matkul_kode VARCHAR(25) NOT NULL,
	matkul_nama VARCHAR(100) NOT NULL,
	matkul_sks TINYINT(3) NOT NULL,
	matkul_semester TINYINT(3) NOT NULL,
	PRIMARY KEY (matkul_id),
	UNIQUE KEY uq_tb_matakuliah_kode (matkul_kode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

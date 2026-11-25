# Project 6 - MVC Sederhana
Riski Amanda            
NIM : 0702243150                        
Dosen : Suhendri, M.Kom
MataKuliah : PBWL 

Project ini adalah contoh framework MVC sederhana untuk Sistem Akademik.

## Struktur

- `app/controllers`: menerima request dan mengatur proses.
- `app/models`: berkomunikasi dengan database.
- `app/views`: menampilkan halaman.
- `app/core`: router, controller dasar, dan model dasar.
- `layouts`: layout guest, dashboard, dan aset tampilan.

## Route utama

- `/` - halaman guest.
- `/dashboard` - dashboard akademik.
- `/mahasiswa` - daftar mahasiswa.
- `/mahasiswa/input` - form input.
- `/mahasiswa/edit/{id}` - form edit.
- `/dosen` - daftar dosen.
- `/dosen/input` - form input dosen.
- `/dosen/edit/{id}` - form edit dosen.
- `/matakuliah` - daftar matakuliah.
- `/matakuliah/input` - form input matakuliah.
- `/matakuliah/edit/{id}` - form edit matakuliah.

## Menjalankan project

1. Import `database.sql` ke MySQL; script membuat database `db_project6` dan tabel jika belum ada.
2. Jika kredensial MySQL berbeda, sesuaikan `DB_HOST`, `DB_NAME`, `DB_USER`, dan `DB_PASS` di `inc/config.php`.
3. Jalankan `composer install` jika folder `vendor` belum tersedia.
4. Buka project melalui Apache; route juga mendukung query `?page=dashboard` jika rewrite URL tidak aktif.

Paket `filp/whoops` digunakan untuk menampilkan error PHP dan exception database
secara lebih mudah dibaca selama proses pembelajaran.

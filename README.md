# NihongoLearn (日本語を学ぼう)

NihongoLearn adalah aplikasi web untuk belajar bahasa Jepang. Pengguna dapat mempelajari materi, mengerjakan quiz, dan melihat perkembangan belajarnya. Admin dapat mengelola materi dan soal.

## Teknologi

- PHP 8.2+
- Laravel 12
- Blade, Tailwind CSS 4, dan Vite
- SQLite sebagai database bawaan; MySQL/MariaDB juga dapat digunakan
- JavaScript Web Speech API untuk audio pelafalan (bergantung pada dukungan browser dan suara Jepang yang tersedia)

## Persyaratan

- PHP 8.2 atau lebih baru beserta ekstensi yang dibutuhkan Laravel dan driver database pilihan (`pdo_sqlite` atau `pdo_mysql`)
- Composer
- Node.js dan npm

## Instalasi dan menjalankan aplikasi

Jalankan perintah berikut dari folder proyek:

1. Pasang dependensi PHP:

   ```bash
   composer install
   ```

2. Siapkan file konfigurasi lokal. Jika `.env` belum ada, salin dari template:

   ```powershell
   Copy-Item .env.example .env
   ```

   Konfigurasi bawaan Laravel pada proyek ini menggunakan SQLite dan file `database/database.sqlite`. Jika file tersebut belum ada, buat file kosong di lokasi itu. Untuk menggunakan MySQL/MariaDB, ubah `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di `.env`.

3. Buat application key:

   ```bash
   php artisan key:generate
   ```

4. Jalankan migrasi dan isi data materi/soal awal:

   ```bash
   php artisan migrate --seed
   ```

   Seeder admin bersifat opsional. Sebelum menjalankan seeder, isi `ADMIN_NAME`, `ADMIN_EMAIL`, dan `ADMIN_PASSWORD` di `.env` untuk membuat atau memperbarui akun admin. Gunakan password yang kuat dan jangan membagikan file `.env`.

5. Pasang dependensi frontend dan buat aset:

   ```bash
   npm install
   npm run build
   ```

6. Jalankan server pengembangan:

   ```bash
   php artisan serve
   ```

   Buka `http://127.0.0.1:8000`. Selama mengembangkan tampilan, jalankan `npm run dev` di terminal terpisah agar perubahan aset dipantau oleh Vite. Alternatifnya, `composer run dev` menjalankan server Laravel, queue worker, log viewer, dan Vite bersamaan.

## Fitur

- Pendaftaran akun siswa, login, dan logout.
- Materi Hiragana, Katakana, Kanji, Kosakata, dan Grammar dengan pencarian/filter kategori.
- Audio pelafalan bahasa Jepang melalui text-to-speech browser pada materi yang mendukungnya.
- Quiz pilihan ganda yang dapat difilter berdasarkan kategori dan level JLPT N5–N1. Hasil dan rincian jawaban disimpan pada akun pengguna.
- Halaman progress yang menampilkan materi selesai, nilai quiz, aktivitas, serta badge pencapaian.
- Dashboard admin untuk mengelola materi dan soal.
- Pembatasan akses berdasarkan peran: siswa harus login untuk belajar, sementara halaman pengelolaan hanya untuk admin.

## Pengujian

Jalankan test dengan:

```bash
php artisan test
```

Konfigurasi PHPUnit menggunakan SQLite in-memory, sehingga test tidak mengubah database aplikasi.

## Struktur proyek

```text
app/
  Http/Controllers/     Controller aplikasi dan admin
  Http/Middleware/      Middleware role pengguna
  Models/               Model Eloquent
database/
  migrations/           Skema database
  seeders/              Data awal materi, soal, dan admin opsional
resources/
  css/ js/              Aset frontend
  views/                Template halaman Blade
routes/
  web.php               Rute aplikasi
tests/
  Feature/ Unit/        Test aplikasi
```

# NihongoLearn (日本語を学ぼう)

Platform belajar bahasa Jepang pemula dengan Laravel 12, PHP 8.2, MySQL, Blade, dan Bootstrap 5.

## Kebutuhan

- PHP 8.2 atau lebih baru dengan ekstensi `pdo_mysql`, `mbstring`, `openssl`, dan `fileinfo`
- Composer
- Laragon dengan Apache atau Nginx, MySQL/MariaDB, dan HeidiSQL

## Menjalankan di Laragon

1. Buka Laragon dan klik **Start All**. Pastikan MySQL/MariaDB berjalan.
2. Dari menu Laragon, buka **MySQL > HeidiSQL**, lalu buat database bernama `nihongoku` dengan collation `utf8mb4_unicode_ci` jika belum ada.
3. Pastikan `.env` mengarah ke server MySQL Laragon. Contoh konfigurasi standar:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nihongoku
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Jika Anda mengatur password MySQL sendiri, isi `DB_PASSWORD` dengan password tersebut. Jangan salin atau bagikan file `.env`.
4. Buka terminal Laragon pada folder proyek, lalu jalankan `composer install` jika dependensi belum terpasang.
5. Jalankan `php artisan key:generate` hanya bila `APP_KEY` kosong.
6. Jalankan migration dan data awal: `php artisan migrate --seed`.
   Untuk aplikasi yang sudah pernah dijalankan, perintah yang sama akan menambahkan migrasi progres dan materi baru tanpa menghapus data lama. Seeder aman dijalankan ulang dan tidak menggandakan materi/soal.
7. (Opsional) Atur `ADMIN_NAME`, `ADMIN_EMAIL`, dan `ADMIN_PASSWORD` di `.env` sebelum menjalankan seeder untuk membuat akun admin. Jangan gunakan password contoh di lingkungan produksi.
8. Jalankan `php artisan serve`, lalu buka `http://127.0.0.1:8000`.

Jangan jalankan MySQL XAMPP dan Laragon bersamaan pada port yang sama. Aplikasi ini dapat menggunakan Apache Laragon atau server bawaan Laravel melalui `php artisan serve`.

## Fitur

- Beranda, pendaftaran siswa, login, logout, dan pembatasan akses berdasar role.
- Materi Hiragana, Katakana, Kanji, Grammar, dan Kosakata; siswa dapat membaca serta menandai materi selesai, admin dapat membuat, mengubah, dan menghapus.
- Tombol suara pada huruf dan kata Jepang untuk mendengarkan pelafalan melalui fitur text-to-speech browser; hasil suara bergantung pada dukungan browser dan perangkat.
- Quiz pilihan ganda empat opsi dengan filter kategori dan level JLPT N5–N1; nilai dihitung di server dan hasil disimpan per pengguna.
- Progress belajar per akun dari materi yang ditandai selesai, riwayat quiz, rata-rata nilai, dan badge pencapaian. Materi dapat ditandai selesai dari halaman baca; statusnya tampil di daftar materi.
- Materi kosakata terpisah untuk perkenalan, angka/waktu, keluarga, sekolah, makanan/minuman, hewan, aktivitas, serta tempat/transportasi; materi Kanji dan grammar memiliki contoh bacaan, pola, dan latihan.
- Dashboard admin dengan ringkasan materi, soal, pengguna, dan akses CRUD.
- Validasi input, hashing password Laravel, CSRF, rate limit login, dan pembatasan akses hasil milik pengguna.

## Tahapan pengerjaan satu minggu

1. Hari 1: siapkan PHP, Composer, Laragon, database, dan konfigurasi `.env`.
2. Hari 2: jalankan migration dan seeder; cek relasi `users`, `materials`, `questions`, `results`.
3. Hari 3: coba registrasi siswa, login, logout, dan batas akses admin.
4. Hari 4: buat dan baca materi; cek CRUD admin.
5. Hari 5: buat soal empat opsi dan uji hasil latihan.
6. Hari 6: uji responsif, validasi, serta akses role pada halaman.
7. Hari 7: jalankan semua test, perbaiki temuan, dan siapkan demo.

## Testing

Jalankan `php artisan test`. Test menggunakan SQLite in-memory agar tidak memerlukan MySQL berjalan.

## Struktur utama

- `app/Models`: User, Material, Question, Result.
- `app/Http/Controllers`: autentikasi, materi, latihan, hasil, dan admin.
- `app/Http/Middleware/EnsureUserHasRole.php`: middleware role.
- `database/migrations`: skema tabel dan foreign key.
- `database/seeders/LearningContentSeeder.php`: materi dan bank soal awal yang terhubung melalui kategori.
- `database/seeders/DatabaseSeeder.php`: menjalankan seeder materi/soal dan membuat admin secara opsional melalui environment.
- `resources/views`: halaman Blade dan layout.
- `routes/web.php`: daftar endpoint aplikasi.<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

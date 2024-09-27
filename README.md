# Website Absensi ATR/BPN
Website saya konsepnya untuk karyawan/karyawati absen dengan menyertakan pembukuan bulanan, sayangnya hanya 1 user yang bisa login yaitu **admin**, 
Karena pada dasarnya tidak diperbolehkan sembarangan orang untuk melihat identitas karyawan/karyawati

## Fitur Web
- Halaman Awal (Landing Page) 
*sesi/login* atau **halaman login**

- Autenthication
  - Register
  - Login

- Multi User
  - Admin, yang mengelola web absensi
  - User, dapat membuat akun baru

- Pencarian
  - Pencarian Halaman tidak ada dikarenakan halaman sedikit
  - pencarian Nama di tabel absensi

> [!NOTE]
> Website ini belum sepenuhnya berhasil dan selesai, masih ada banyak kekurangan

## Akun Default Untuk Pengujian

- Admin
  - Email : admin@gmail.com
  - Password : Bpnri2024

 - **User Dapat Register Akun**

## ERD & Relasi Antar Tabel
<picture>
    <img alt="ERD" src="https://github.com/Shinyure/Nekochi/blob/main/ERD.png">
</picture>

-Penjelasan
> Relasi *tabel Karyawan* ke *tabel Absensi* menggunakan "NIP" agar data karyawan muncul di tabel absensi
> Saya mencoba merelasi *tabel absensi* ke *tabel pembukuan* menggunakan "bulan" namun belum selesai,
  dimana fungsi tombol saves untuk menyimpan *tabel absensi* ke halaman pembukuan berdasarkan bulannya lalu mereset data di dalam kolom hari gagal.
> Dan saya belum sempat membuat form untuk absen

## UML Diagram Use Case
<picture>
    <img alt="Uml Diagram" src="https://github.com/Shinyure/Nekochi/blob/main/uml2.png">
</picture>

User hanya satu karena jobdesknya management absensi di kantor, dengan begitu jika user berganti maka di perlukan akun lagi

> [!NOTE]
> Didalam data karyawan terdapat indetitas karyawan/karyawati, oleh karena itu tidak bisa banyak user untuk akses ke web absensi.
> Maka jika ada User lain, diperlukan akun lain untuk mencegah orang asing masuk ke web 

> [!CAUTION]
> Web ini belum sepenuhnya selesai, dimana masih ada banyak kekurangan seperti
> 1. relasi tabel absen dengan tabel pembukuan untuk menympan data absensi mingguan berdasarkan bulan, masih terdapat error yang tidak dimengerti
> 2. fungtionalitas sepenuhnya pada halaman formulir dimana belum bisa merelasi ke tabel absensi dan muncul di notifikasi

### Teknologi yang digunakan
- Laravel 9
- Boostrap 5
- Php 8.2

## Instalasi
1. CLone Repository
```
git clone https://github.com/Shinyure/UKK.git
composer install
cp .env.example .env
```

2. Konfigurasi Database Pada `.env`
```
APP_DEBUG=true
DB_DATABASE=database-anda
DB_USERNAME=nama-pengguna-anda
DB_PASSWORD=kata-sandi-anda
```

3. Migrasi dan Link Storage
```
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
```

4. Aktifasi Web
```
php artisan serve
```


### Absensi ATR/BPN by Adhy Maulana Fatharani

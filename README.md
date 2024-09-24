# Website Absensi ATR/BPN
Website saya konsepnya untuk karyawan/karyawati absen dengan menyertakan pembukuan bulanan, sayangnya hanya 1 user yang bisa login yaitu **admin**, 
Karena pada dasarnya tidak diperbolehkan sembarangan orang untuk melihat identitas karyawan/karyawati

## Fitur Web
- Halaman Awal (Landing Page) 
sesi/login atau halaman login

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



### Teknologi yang digunakan
- Laravel 9
- Boostrap 5
- Php 8.2

## Instalasi
1. CLone Repository
```
git clone https://github.com/Shinyure/ukk.git
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

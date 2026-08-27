# Tugas Bootcamp Eduwork

Repository ini berisi seluruh tugas yang saya kerjakan selama mengikuti **Bootcamp Eduwork**. Setiap folder merepresentasikan materi dan project yang dikerjakan pada masing-masing sesi pembelajaran.

---

## 📂 Struktur Repository

### 📌 Tugas Sesi 1 - Fundamental Git, HTML & AI

- Fundamental HTML
- Dasar Git & GitHub
- Pemanfaatan AI dalam pengembangan web

### 📌 Tugas Sesi 2 - Mastering CSS & AI Styling

- CSS Layout
- Responsive Design
- Styling Website
- AI Styling

### 📌 Tugas Sesi 3 - Bootstrap CSS

- Bootstrap 5
- Responsive Portfolio Website
- Bootstrap Components
- JavaScript Portfolio Filter

### 📌 Tugas Sesi 4 - Responsive Web Portfolio

#### HTML

- Responsive Portfolio Website
- Navbar
- Hero Section
- About Me
- Services
- Portfolio
- Testimonials
- Contact
- Footer

#### CSS

- CSS Variables
- Responsive Layout
- Modern UI Design
- Hover Animation
- Card & Button Styling

#### JavaScript

- Portfolio Filter
- Swiper.js Testimonial Slider
- Responsive Breakpoints
- Bug Fixing Filter

### 📌 Tugas Sesi 5 - JavaScript Dasar

- Array Object
- DOM Manipulation
- Dynamic Product List
- Product Category Filter

### 📌 Tugas Sesi 6 - Database MySQL

- Pembuatan Database
- Tabel Products
- Tabel Users
- Tabel Orders
- SQL CRUD (Create, Read, Update, Delete)

### 📌 Tugas Sesi 7 - PHP Native

- Koneksi Database MySQL
- Menampilkan Data Produk
- Tambah Produk
- Edit Produk
- Hapus Produk
- Upload Gambar

### 📌 Tugas Sesi 8 - PHP Native CRUD

- Sistem CRUD Produk
- Bootstrap Interface
- Validasi Form
- Upload Image
- Pencarian Produk

### 📌 Tugas Sesi 9 - PHP Native E-Commerce

- Product Search
- Category Filter
- SweetAlert Integration
- Responsive Product Card
- Delete Confirmation

### 📌 Tugas Sesi 10 - Laravel Basic Project

- Instalasi dan konfigurasi project Laravel
- Membuat Model
- Membuat Resource Controller
- Membuat Migration
- Membuat dua Route dasar
- Konfigurasi koneksi database melalui file .env

### 📌 Tugas Sesi 11 - Controller Dasar Laravel

- Membuat Controller dasar untuk mengelola Produk
- Membuat Controller dasar untuk mengelola Halaman

### 📌 Tugas Sesi 12 - Blade Templating

- Membuat halaman dasar menggunakan Blade:
  - Halaman Utama
  - Daftar Produk
  - Halaman Keranjang
- Membuat komponen Blade yang dapat digunakan ulang di setiap halaman:
  - Navbar
  - Footer

### 📌 Tugas Sesi 13 - Migration & Seeder

- Membuat migration untuk tabel:
  - Kategori Produk (id, name)
  - Produk (id, name, description, stock, image)
  - Pengguna (id, name, email, password)
  - Pesanan (id, user_id, product_id, quantity, total)
- Membuat Seeder untuk data dummy produk dan kategori sebagai data awal pengujian

### 📌 Tugas Sesi 14 - Eloquent Model & Relasi

- Membuat Model `Product` dan `ProductCategory` beserta relasinya
- Menampilkan data produk menggunakan Controller dan Blade
- Menambahkan pagination untuk membatasi data yang tampil dalam satu halaman

### 📌 Tugas Sesi 15 - Autentikasi dengan Laravel Breeze

- Instalasi Laravel Breeze untuk fitur autentikasi (login & registrasi)
- Menyesuaikan file Blade bawaan Breeze (logo, nama situs, dan tampilan lainnya)

### 📌 Tugas Sesi 16 - Halaman Kelola Kategori & Produk (Admin)

- Membuat menu navigasi menuju halaman list kategori dan list produk
- Membuat tampilan list kategori produk:
  - Tabel kategori (id, nama kategori, jumlah produk)
  - Tombol tambah, edit, dan hapus
- Membuat tampilan list produk:
  - Tabel produk (id, nama, deskripsi, stok, harga, gambar)
  - Tombol tambah, edit, dan hapus

### 📌 Tugas Sesi 17 - Form Tambah Produk & Kategori

- Membuat halaman tambah produk dan edit produk
- Membuat halaman tambah kategori produk dan edit kategori produk

### 📌 Tugas Sesi 18 - Dashboard Admin

- Membuat tampilan dashboard utama yang menampilkan ringkasan informasi:
  - Jumlah produk
  - Jumlah kategori produk
  - Jumlah klik produk

### 📌 Tugas Sesi 19 - Role & Middleware

- Menambahkan kolom `role` pada tabel `users` menggunakan migrasi
- Membuat Middleware untuk membatasi akses Admin
- Menerapkan Middleware Admin pada route terkait

### 📌 Tugas Sesi 20 & 21 - Fungsi Tambah Data (Create)

- Membuat fungsi di `ProductController` & `ProductCategoryController` untuk menampilkan halaman tambah produk & kategori produk
- Menyesuaikan formulir tambah kategori produk (route: `product-category.store`, method: `POST`)
- Menyesuaikan formulir tambah produk (route: `product.store`, method: `POST`)
- Membuat function di kedua controller untuk memvalidasi input dan menyimpan data ke database

### 📌 Tugas Sesi 22 - Fitur Edit & Hapus Data

- Membuat fungsi di kedua controller untuk menampilkan halaman edit produk & kategori
- Menyesuaikan formulir edit agar dapat digunakan untuk memperbarui data
- Membuat function untuk memvalidasi input perubahan data dan menyimpannya ke database
- Membuat fitur hapus data berdasarkan `id`

---

## 🛠️ Teknologi yang Digunakan

- HTML5
- CSS3
- Bootstrap 5
- JavaScript (ES6)
- PHP Native
- Laravel
- MySQL / MariaDB
- Git & GitHub
- Visual Studio Code
- XAMPP

---

## 🚀 Cara Menjalankan Project

1. Clone repository

```bash
git clone https://github.com/hermawanangga/Tugas-Bootcamp-Eduwork.git
```

2. Masuk ke folder project yang ingin dijalankan.

3. Jalankan sesuai teknologi yang digunakan:

- HTML/CSS → Buka file `index.html`
- PHP Native → Jalankan melalui XAMPP
- Laravel → Jalankan `composer install`, atur file `.env`, kemudian jalankan:

```bash
php artisan serve
```

---

## 👨‍💻 Author

**Angga Hermawan**

Fresh Graduate S1 Teknik Informatika
Universitas Muhammadiyah Tangerang

GitHub:
https://github.com/hermawanangga

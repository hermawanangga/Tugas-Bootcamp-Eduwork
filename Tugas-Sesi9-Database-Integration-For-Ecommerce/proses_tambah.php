<?php
include 'config/koneksi.php';

// Ambil data dari form
$nama_produk = $_POST['nama_produk'];
$deskripsi   = $_POST['deskripsi'];
$harga       = $_POST['harga'];
$kategori    = $_POST['kategori'];
$stok        = $_POST['stok'];

// Ambil data gambar
$nama_file = $_FILES['gambar']['name'];
$tmp_file  = $_FILES['gambar']['tmp_name'];

// Folder tujuan upload
$folder = "assets/uploads/" . $nama_file;

// Upload gambar
if (move_uploaded_file($tmp_file, $folder)) {

    // Simpan ke database
    $query = "INSERT INTO products
    (nama_produk, deskripsi, harga, kategori, stok, gambar)
    VALUES
    ('$nama_produk', '$deskripsi', '$harga', '$kategori', '$stok', '$nama_file')";

    if (mysqli_query($conn, $query)) {

        header("location:index.php?success=tambah");

    } else {

        echo "Gagal menyimpan data!";
    }

} else {

    echo "Upload gambar gagal!";
}

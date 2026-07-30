<?php
include 'config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil nama gambar terlebih dahulu
$query  = "SELECT gambar FROM products WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data   = mysqli_fetch_assoc($result);

// Hapus gambar dari folder uploads
if (file_exists("assets/uploads/" . $data['gambar'])) {
    unlink("assets/uploads/" . $data['gambar']);
}

// Hapus data dari database
$query = "DELETE FROM products WHERE id = '$id'";

if (mysqli_query($conn, $query)) {

    header("location:index.php?success=hapus");

} else {

    echo "Gagal menghapus produk!";
}

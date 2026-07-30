<?php
include 'config/koneksi.php';

// Ambil data dari form
$id          = $_POST['id'];
$nama_produk = $_POST['nama_produk'];
$deskripsi   = $_POST['deskripsi'];
$harga       = $_POST['harga'];
$kategori    = $_POST['kategori'];
$stok        = $_POST['stok'];
$gambar_lama = $_POST['gambar_lama'];

// Cek apakah user upload gambar baru
if ($_FILES['gambar']['name'] != "") {

    $nama_file = $_FILES['gambar']['name'];
    $tmp_file  = $_FILES['gambar']['tmp_name'];

    $folder = "assets/uploads/" . $nama_file;

    // Upload gambar baru
    move_uploaded_file($tmp_file, $folder);

    // Hapus gambar lama (jika ada)
    if (file_exists("assets/uploads/" . $gambar_lama)) {
        unlink("assets/uploads/" . $gambar_lama);
    }

} else {

    // Gunakan gambar lama
    $nama_file = $gambar_lama;
}

// Update database
$query = "UPDATE products SET
            nama_produk = '$nama_produk',
            deskripsi = '$deskripsi',
            harga = '$harga',
            kategori = '$kategori',
            stok = '$stok',
            gambar = '$nama_file'
          WHERE id = '$id'";

if (mysqli_query($conn, $query)) {

    header("location:index.php?success=edit");

} else {

    echo "Gagal memperbarui data!";
}

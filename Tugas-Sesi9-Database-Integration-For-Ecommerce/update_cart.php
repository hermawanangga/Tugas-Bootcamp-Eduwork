<?php
include 'config/koneksi.php';

// Ambil data dari URL
$id   = $_GET['id'];
$aksi = $_GET['aksi'];

// Jika tombol +
if ($aksi == "tambah") {

    mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE id = '$id'");

}

// Jika tombol -
if ($aksi == "kurang") {

    // Ambil quantity saat ini
    $query = mysqli_query($conn, "SELECT quantity FROM cart WHERE id = '$id'");
    $data  = mysqli_fetch_assoc($query);

    if ($data['quantity'] > 1) {

        mysqli_query($conn, "UPDATE cart SET quantity = quantity - 1 WHERE id = '$id'");

    } else {

        mysqli_query($conn, "DELETE FROM cart WHERE id = '$id'");

    }

}

header("Location: cart.php");
exit;

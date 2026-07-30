<?php
    include 'config/koneksi.php';

    // Ambil ID produk dari URL
    $product_id = $_GET['id'];

    // Cek apakah produk sudah ada di keranjang
    $cek = mysqli_query($conn, "SELECT * FROM cart WHERE product_id = '$product_id'");

    if (mysqli_num_rows($cek) > 0) {

    // Jika sudah ada, tambah quantity
    mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE product_id = '$product_id'");

    } else {

    // Jika belum ada, tambahkan ke keranjang
    mysqli_query($conn, "INSERT INTO cart (product_id, quantity) VALUES ('$product_id', 1)");

    }

    // Kembali ke halaman utama
    header("Location: index.php");
exit;

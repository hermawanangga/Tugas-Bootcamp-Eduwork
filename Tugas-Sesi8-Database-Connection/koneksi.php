<?php
// konfigurasi database
$host = 'localhost'; //Host Database
$user = 'root'; // Username Database
$password = ''; //Password Database
$dbname = 'toko'; //Nama database

// Membuat Koneksi
$conn = new mysqli($host, $user, $password, $dbname);

//Validasi Koneksi
if  ($conn->connect_error) {
  die("Koneksi Gagal:" . $conn->connect_error);
} else {
  // echo "Koneksi Berhasil";
}
?>
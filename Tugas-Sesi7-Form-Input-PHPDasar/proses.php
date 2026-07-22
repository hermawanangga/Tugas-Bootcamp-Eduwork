<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_produk");

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

// Mengambil data dari form (deklarasi variable)
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$stock = $_POST['stock'];

// Validasi
if ($nama == "" || $harga == "" || $deskripsi == "" || $stock == "") {

    echo "Semua data harus diisi!";

} else {

    // Query INSERT
    $query = "INSERT INTO produk (nama_produk, harga, deskripsi, stock)
              VALUES ('$nama', '$harga', '$deskripsi', '$stock')";

    // Menjalankan query
    if (mysqli_query($conn, $query)) {
        echo "
            <script>
                alert('Data berhasil disimpan!');
                window.location='index.html';
            </script>";
    } else {
        echo "Data gagal disimpan!";
    }
}

?>
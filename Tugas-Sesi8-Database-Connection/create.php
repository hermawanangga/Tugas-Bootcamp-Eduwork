<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //validasi sederhana
    if (empty($name) || empty($email) || empty($password)){
        echo "Semua Field harus diisi.";
    }

    $query = "INSERT INTO users (nama, email, password) 
    VALUES ('$nama', '$email', '$password')";
    if ($conn->query($query)) {
        header("Location: read.php");
    }else {
        echo "Error! " .$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data</h1>
    <form method="POST">
        <label>Nama :</label><br>
        <input type="text" name="nama" required><br><br>
        <label>Email :</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password :</label><br>
        <input type="text" name="password" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
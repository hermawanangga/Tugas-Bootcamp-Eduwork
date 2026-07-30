<?php
    include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Tambah Produk</h4>
            </div>

            <div class="card-body">

                <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>

                        <select name="kategori" class="form-select" required>

                            <option value="">-- Pilih Kategori --</option>
                            <option>Laptop</option>
                            <option>Smartphone</option>
                            <option>Aksesoris</option>
                            <option>Audio</option>

                        </select>

                    </div>

                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Upload Gambar</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*" required>
                    </div>

                    <button class="btn btn-primary">
                        Simpan Produk
                    </button>

                    <a href="index.php" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>

            </div>

        </div>

    </div>

</body>

</html>

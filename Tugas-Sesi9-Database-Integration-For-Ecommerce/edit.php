<?php
    include 'config/koneksi.php';

    // Ambil id dari URL
    $id = $_GET['id'];

    // Ambil data produk
    $query  = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $data   = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h3>Edit Produk</h3>
        </div>

        <div class="card-body">

            <form action="proses_edit.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="gambar_lama" value="<?php echo $data['gambar']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>

                    <input
                        type="text"
                        name="nama_produk"
                        class="form-control"
                        value="<?php echo $data['nama_produk']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>

                    <textarea
                        name="deskripsi"
                        class="form-control"
                        rows="4"
                        required><?php echo $data['deskripsi']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>

                    <input
                        type="number"
                        name="harga"
                        class="form-control"
                        value="<?php echo $data['harga']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>

                    <select name="kategori" class="form-select">

                        <option value="Laptop"
                            <?php if ($data['kategori'] == "Laptop") {echo "selected";}?>>
                            Laptop
                        </option>

                        <option value="Smartphone"
                            <?php if ($data['kategori'] == "Smartphone") {echo "selected";}?>>
                            Smartphone
                        </option>

                        <option value="Aksesoris"
                            <?php if ($data['kategori'] == "Aksesoris") {echo "selected";}?>>
                            Aksesoris
                        </option>

                        <option value="Audio"
                            <?php if ($data['kategori'] == "Audio") {echo "selected";}?>>
                            Audio
                        </option>

                    </select>

                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>

                    <input
                        type="number"
                        name="stok"
                        class="form-control"
                        value="<?php echo $data['stok']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label>
                    <br>

                    <img
                        src="assets/uploads/<?php echo $data['gambar']; ?>"
                        width="180"
                        class="img-thumbnail">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ganti Gambar</label>

                    <input
                        type="file"
                        name="gambar"
                        class="form-control">
                </div>

                <button type="submit" class="btn btn-warning">
                    Update Produk
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
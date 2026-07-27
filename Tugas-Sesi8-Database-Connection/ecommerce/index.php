<?php 
include 'koneksi.php'; 

//Ambil Produk berdasarkan kategori "jika ada filter" 
$kategori_filter = isset ($_GET['kategori']) ? $conn->real_escape_string($_GET['kategori']) : '';

if(!empty($kategori_filter)) {
  $sql = "SELECT * FROM produk WHERE kategori = '$kategori_filter'";
  $result = $conn->query($sql);
} else {
  //query untuk mengambil data produk
  $sql = "SELECT * FROM produk";
  $result = $conn->query($sql);
}



// ambil daftar kategori unik dari tabel produk
$kategori_sql = "SELECT DISTINCT kategori FROM produk";
$kategori_result = $conn->query($kategori_sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
  <!-- filter form -->
   <form method="GET" class="mb-4">
    <div class="row">
      <div class="col-md-4">
        <select name="kategori" class="form-select">
          <option value="">All Kategori</option>
            <?php if ($kategori_result->num_rows > 0): ?>
            <?php while ($kategori = $kategori_result->fetch_assoc()): ?>
                <option value="<?= htmlspecialchars($kategori['kategori']) ?>"
                <?= $kategori_filter == $kategori['kategori'] ? 'selected' : ''  ?>>
                <?= htmlspecialchars($kategori['kategori']) ?>
          </option>
          <?php endwhile; ?>
          <?php endif; ?>
        </select>
      </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
   </form>
    <h1 class="text-center mb-4">E-Commerce Store</h1>
    <div class="row">
        <?php
        if ($result->num_rows > 0):
        ?>
        <?php
        while ($row = $result->fetch_assoc()):
        ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <!-- Gambar Produk (Gunakan placeholder jika file gambar tidak ada) -->
                <img src="<?= htmlspecialchars($row['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['nama']) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['nama']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($row['deskripsi']) ?>...</p>
                    <p class="card-text"><strong>Price: Rp<?= htmlspecialchars(number_format($row['harga'], 0, ",", ".")) ?></strong></p>
                    <p class="card-text"><strong>Stok: <?= htmlspecialchars($row['stok']) ?></strong></p>
                    <a href="#" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php else: ?>
          <p class="text-center">No product available</p>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="[cdn.jsdelivr.net](https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js)"></script>
</body>
</html>

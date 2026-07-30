<?php
    include 'config/koneksi.php';

    // Alert sukses CRUD
    $success = isset($_GET['success']) ? $_GET['success'] : "";

    // Ambil daftar kategori
    $query_kategori  = "SELECT DISTINCT kategori FROM products";
    $result_kategori = mysqli_query($conn, $query_kategori);

    // Ambil nilai pencarian dan kategori
    $keyword  = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : "";

    //query produk
    $query = "SELECT * FROM products  WHERE 1=1";
    if ($keyword != "") {
    $query .= " AND nama_produk LIKE '%$keyword%'";
    }

    if ($kategori != "") {
    $query .= " AND kategori = '$kategori'";
    }

    $result = mysqli_query($conn, $query);

    // Hitung jumlah item di keranjang
    $cart_query = mysqli_query($conn, "SELECT SUM(quantity) AS total_item FROM cart");
    $cart       = mysqli_fetch_assoc($cart_query);

    $total_item = $cart['total_item'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Bootcamp</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card {
            transition: all .3s ease;
            border: none;
            border-radius: 18px;
            overflow: hidden;
        }

        .card-body {
            padding: 20px;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.15) !important;
        }

        .card img {
            border-radius: 15px 15px 0 0;
        }

        .card-footer {
             padding: 20px;
            border-top: none;
        }

        .btn {
            border-radius: 10px;
            font-weight: 500;
        }
    </style>
</head>
<body class="background:#f8fafc;">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold text-primary mb-0">🛒 E-Commerce Bootcamp</h2>
        <small class="text-muted">Database Integration Project</small>
    </div>

    <div>

        <a href="cart.php" class="btn btn-success position-relative me-2">

            🛒 Keranjang

            <?php if ($total_item > 0): ?>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php echo $total_item; ?>
                </span>
            <?php endif; ?>

        </a>

        <a href="tambah.php" class="btn btn-primary">
            + Tambah Produk
        </a>

    </div>

</div>

<form method="GET" class="row g-2 mb-4">

    <div class="col-md-5">
        <input
            type="text"
            name="keyword"
            class="form-control"
            placeholder="🔍 Cari produk..."
            value="<?php echo $keyword; ?>">
    </div>

    <div class="col-md-4">
        <select name="kategori" class="form-select">

            <option value="">Semua Kategori</option>

            <?php while ($kat = mysqli_fetch_assoc($result_kategori)): ?>

                <option
                    value="<?php echo $kat['kategori']; ?>"
                    <?php if ($kategori == $kat['kategori']) {
                            echo "selected";
                    }
                    ?>>

                    <?php echo $kat['kategori']; ?>

                </option>

            <?php endwhile; ?>

        </select>
    </div>

    <div class="col-md-3 d-grid">
        <button type="submit" class="btn btn-primary">
            Cari
        </button>
    </div>

</form>

    <div class="row">

    <?php if (mysqli_num_rows($result) > 0): ?>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>

<div class="col-md-3 mb-4">

    <div class="card h-100 shadow-sm">

        <img src="assets/uploads/<?php echo $row['gambar']; ?>"
             class="card-img-top"
             style="height:220px; object-fit:cover;">

        <div class="card-body">

            <h5 class="card-title">
                <?php echo $row['nama_produk']; ?>
            </h5>

            <p class="badge bg-secondary mb-2">
                <?php echo $row['kategori']; ?>
            </p>

            <p>
                <?php echo $row['deskripsi']; ?>
            </p>

            <h5 class="text-success fw-bold">
                Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
            </h5>

        <p>
            <?php if ($row['stok'] > 0): ?>
            <span class="badge bg-success">
                Stok : <?php echo $row['stok']; ?>
            </span>
            <?php else: ?>
            <span class="badge bg-danger">
                Habis
            </span>

            <?php endif; ?>
        </p>

        </div>

<div class="card-footer bg-white">

    <div class="d-grid gap-2">

        <a href="edit.php?id=<?php echo $row['id']; ?>"
           class="btn btn-warning btn-sm">
            ✏️ Edit
        </a>

        <a href="hapus.php?id=<?php echo $row['id']; ?>"
           class="btn btn-danger btn-sm btn-hapus">
            🗑️ Hapus
        </a>

        <a href="tambah_cart.php?id=<?php echo $row['id']; ?>"
           class="btn btn-success btn-sm">
            🛒 Tambah ke Keranjang
        </a>

    </div>

</div>

    </div>

</div>

<?php endwhile; ?>
<?php else: ?>

<div class="col-12">
    <div class="alert alert-warning text-center">
        <h5>Produk tidak ditemukan</h5>
        <p class="mb-0">Coba gunakan kata kunci atau kategori lain.</p>
    </div>
</div>

<?php endif; ?>

</div>

</div>

<footer class="bg-white border-top mt-5 py-4">
    <div class="container text-center text-muted">
        <small>
            © 2026 E-Commerce Bootcamp |
            Developed by <strong>Angga Hermawan</strong>
        </small>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

<?php if ($success == "tambah"): ?>

Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Produk berhasil ditambahkan.',
    timer: 2000,
    showConfirmButton: false
});

<?php elseif ($success == "edit"): ?>

Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Produk berhasil diperbarui.',
    timer: 2000,
    showConfirmButton: false
});

<?php elseif ($success == "hapus"): ?>

Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Produk berhasil dihapus.',
    timer: 2000,
    showConfirmButton: false
});

<?php endif; ?>


document.querySelectorAll('.btn-hapus').forEach(function(button) {

    button.addEventListener('click', function(e) {

        e.preventDefault();

        let url = this.href;

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Produk akan dihapus secara permanen.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result)=>{

            if(result.isConfirmed){
                window.location.href = url;
            }

        });

    });

});

</script>
</body>
</html>
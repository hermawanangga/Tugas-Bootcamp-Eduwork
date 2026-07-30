<?php
    include 'config/koneksi.php';

    $query = "SELECT
            cart.id,
            cart.quantity,
            products.nama_produk,
            products.harga,
            products.gambar
          FROM cart
          INNER JOIN products
          ON cart.product_id = products.id";

    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Keranjang Belanja</h2>

        <a href="index.php" class="btn btn-primary">
            Kembali Belanja
        </a>

    </div>

    <table class="table table-bordered table-striped align-middle">

        <thead class="table-dark">

            <tr>
                <th>Gambar</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

        <?php
            $total = 0;

            while ($row = mysqli_fetch_assoc($result)):

                $subtotal  = $row['harga'] * $row['quantity'];
                $total    += $subtotal;
        ?>

            <tr>

                <td width="120">
                    <img
                        src="assets/uploads/<?php echo $row['gambar']; ?>"
                        width="100"
                        class="img-thumbnail">
                </td>

                <td>
                    <?php echo $row['nama_produk']; ?>
                </td>

                <td>
                    Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                </td>

                <td>
                    <?php echo $row['quantity']; ?>
                </td>

                <td>
                    Rp <?php echo number_format($subtotal, 0, ',', '.'); ?>
                </td>

                <td>

                    <a href="update_cart.php?id=<?php echo $row['id']; ?>&aksi=tambah"
                       class="btn btn-success btn-sm">
                        +
                    </a>

                    <a href="update_cart.php?id=<?php echo $row['id']; ?>&aksi=kurang"
                       class="btn btn-warning btn-sm">
                        -
                    </a>

                    <a href="hapus_cart.php?id=<?php echo $row['id']; ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus produk dari keranjang?')">
                        Hapus
                    </a>

                </td>

            </tr>

        <?php endwhile; ?>

        </tbody>

        <tfoot>

            <tr>

                <th colspan="4" class="text-end">
                    Total Belanja
                </th>

                <th colspan="2">
                    Rp <?php echo number_format($total, 0, ',', '.'); ?>
                </th>

            </tr>

        </tfoot>

    </table>

</div>

</body>
</html>
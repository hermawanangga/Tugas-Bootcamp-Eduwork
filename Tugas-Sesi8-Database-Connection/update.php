    <?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $query = "UPDATE users SET nama = '$nama', email = '$email', password = '$password' WHERE id = $id";
      if ($conn->query($query)) {
        header("Location: read.php");
      } else {
        echo"Error: " .$conn->error;
      }
    }
    ?>

    <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Data</title>
      </head>
      <body>
        <h1>Edit Data</h1>
        <form method="POST">
          <label>Nama :</label><br>
          <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br><br>
          <label>Email :</label><br>
          <input type="email" name="email" value="<?php echo $data['email']; ?>" required><br><br>
          <label>Password :</label><br>
          <input type="text" name="password" value="<?php echo $data['password']; ?>" required><br><br>
          <button type="submit">Simpan</button>
        </form>
      </body>
    </html>
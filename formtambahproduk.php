<?php
session_start();
if (!isset($_SESSION["id_admin"])){
  header("location:login.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APLIKASI KASIR</title>
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  
</head>
<body>
<style>
    .form-group label {
        font-weight: 500;
        font-size: 14px;
    }
    .form-container {
        display: block;
        margin-top: 10px;
        text-decoration: none;
        padding: 8px 10px;
        border-radius: 20px;
        transition: background-color 0.3s ease;
        width: fit-content;
        margin: 0px auto;
        font-size: 5px;
    }
    .form-control {
        padding: 6px;
        font-size: 14px;
    }
    .btn-primary {
        width: 100%;
        padding: 4px;
        font-size: 15px;
    }
    textarea.form-control {
        min-height: 80px; /* Ketinggian minimum */
        max-height: 150px; /* Ketinggian maksimum */
    }
  </style>
<?php

    include 'koneksi.php';
    session_start();

    if(isset($_POST['submit'])) {
    $ProdukID = $_POST["ProdukID"];
    $NamaProduk = $_POST["NamaProduk"];
    $Harga = $_POST["Harga"];
    $Stok = $_POST["Stok"];
    
    mysqli_query($koneksi, "INSERT INTO produk values ('$ProdukID', '$NamaProduk', '$Harga', '$Stok')");

    $_SESSION['succes'] = 'Berhasil';

   
    header("Location: tabelproduk.php");
    exit();
}
?>

<div class="container-fluid d-flex justify-content-center align-items-center vh-100">
    <div class="card">
      <div class="card-body">
    <div class="form-container">
        <h3>FORM TAMBAH PRODUK</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ProdukID">Produk ID</label>
                <input type="text" class="form-control" id="ProdukID" name="ProdukID" placeholder="Masukkan ProdukID" required>
            </div>
            <div class="form-group">
                <label for="NamaProduk">Nama Produk</label>
                <input type="text" class="form-control" id="NamaProduk" name="NamaProduk" placeholder="Masukkan NamaProduk" required>
            </div>
            <div class="form-group">
                <label for="Harga">Harga</label>
                <input type="text" class="form-control" id="Harga" name="Harga" placeholder="Masukkan Harga" required>
            </div>
            <div class="form-group">
                <label for="Stok">Stok</label>
                <input type="text" class="form-control" id="Stok" name="Stok" placeholder="Masukkan Stok" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-1">Submit</button>
        </form>
        <!-- <div class="text-center">
        <a href="">Laporan  </a>
    </div>  -->
    </div>
</div>
</body>
</html>
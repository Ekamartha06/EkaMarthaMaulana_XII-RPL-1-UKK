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
$PenjualanID  = $_POST["PenjualanID"];
$TanggalPenjualan	 = $_POST["TanggalPenjualan"];
$TotalHarga = $_POST["TotalHarga"];

mysqli_query($koneksi, "INSERT INTO penjualan values ('$PenjualanID', '$TanggalPenjualan', '$TotalHarga')");

$_SESSION['succes'] = 'Berhasil';


header("Location: tabelpenjualan.php");
exit();
}
?>

<div class="container-fluid d-flex justify-content-center align-items-center vh-100">
    <div class="card">
      <div class="card-body">
    <div class="form-container">
        <h2>FORM TAMBAH PENJUALAN</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="PenjualanID">Penjualan ID</label>
                <input type="text" class="form-control" id="PenjualanID" name="PenjualanID" placeholder="Masukkan PenjualanID" required>
            </div>
            <div class="form-group">
                <label for="TanggalPenjualan">Tanggal Penjualan</label>
                <input type="date" class="form-control" id="TanggalPenjualan" name="TanggalPenjualan" required>
            </div>
            <div class="form-group">
                <label for="DetailID">Detail ID</label>
                <input type="text" class="form-control" id="DetailID" name="DetailID" placeholder="Masukkan DetailID" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Produk ID</label>
                <select class="form-control">
                    <option value="">--Pilih Produk ID--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="JumlahProduk">Jumlah Produk</label>
                <input type="text" class="form-control" id="JumlahProduk" name="JumlahProduk" placeholder="Masukkan JumlahProduk" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-1">Submit</button>
        </form>
        <div class="text-center">
        <!-- Menghapus style="font-size: 12px;" -->
        <a href="">Laporan  </a>
    </div> 
    </div>
</div>

</body>
</html>
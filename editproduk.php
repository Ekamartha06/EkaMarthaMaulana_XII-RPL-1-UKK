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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #E5D4FF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 6px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #7360DF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #EBC7E8;
        }
    </style>
<body>
<?php
    include 'koneksi.php';
    session_start();

    if (isset($_GET['ProdukID'])) {
        $ProdukID = $_GET['ProdukID'];

        $data = mysqli_query($koneksi, "SELECT * FORM produk values ProdukID = '$ProdukID'");
        $data = mysqli_fetch_assoc($data);
    }

    if(isset($_POST['submit'])) {
    $ProdukID = $_GET["ProdukID"];

    $ProdukID = $_POST["ProdukID"];
    $NamaProduk = $_POST["NamaProduk"];
    $Harga = $_POST["Harga"];
    $Stok = $_POST["Stok"];
    
    mysqli_query($koneksi, "UPDATE produk SET ProdukID= '$ProdukID', '$NamaProduk', '$Harga', '$Stok' where ProdukID= '$ProdukID'");

    $_SESSION['succes'] = 'Berhasil';

    header("Location: tabelproduk.php");
    exit();
}
?>


<!-- Your HTML form goes here -->
<div class="container-fluid d-flex justify-content-center align-items-center vh-10">
    <div class="card">
    <form action="" method="post">
        <center>
            <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Edit Produk</span></h1>
        </center>
        
        <label for="ProdukID">Produk ID</label>
        <input type="text" id="ProdukID" name="ProdukID"  value="<?php echo $ProdukID;?>" readonly>

        <label for="NamaProduk">Nama Produk</label>
        <input type="text" id="NamaProduk" name="NamaProduk" value="<?php echo $NamaProduk;?>" readonly>

        <label for="Harga">Harga</label>
        <input type="text" id="Harga" name="Harga" value="<?php echo $Harga;?>" readonly>

        <label for="Stok">Stok</label>
        <input type="text" id="Stok" name="Stok" value="<?php echo $Stok;?>" readonly>

        <button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
        <button type="reset" class="btn btn-danger mb-2">Cancel</button>
    </form>
</body>
</html>
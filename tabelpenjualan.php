
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <title>APLIKASI KASIR</title>
  <link rel="stylesheet" href="style.css">
  <style>
    container {
      margin-top: 100px;
      max-width: 1000px;
    }

    .card {
    margin-top: 10px; /* Mengurangi margin dari 20px menjadi 10px */
    margin-bottom: 20px; /* Menambahkan margin-bottom agar ada jarak antara card dan tombol Logout */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    border-radius: 5px;
    }

    .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .card-body {
      padding: 10px;
    }

    .search-container {
      display: flex;
      flex-direction: column;
      align-items: left;
      text-align: center;
    }

    .search-box, .combobox-box {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      position: relative;
    }

    .search-box span {
      margin-right: 10px;
      padding: 5px;
    }

    .btn-dark {
      background-color: maroon;
      border-radius: 20px;
      font-weight: bold;
      text-decoration: none;
      margin: 2px;
      padding: 2px;
      display: inline-block;
      cursor: pointer;
      color: #eee;
    }

    .btn-primary {
      padding: 5px;
      margin: 5px;
      width: auto;
      color: #eee;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 5px;
      border-width: 50px; /* Sesuaikan ketebalan garis sesuai keinginan Anda */
      border-color: black; /
    }

    /* h3 {
      font-weight: bold;
    } */

    .toggle-btn {
      margin-left: 2px;
    }

    table, th, td {
      border: 2px solid #000;
    }

    th, td {
      padding: 5px;
      text-align: center;
    }

    th, tr {
      text-align: center;
    }

    th {
      background-color: #fff;
    }

    .table-bordered {
      border-width: -10px; /* Sesuaikan ketebalan garis sesuai keinginan Anda */
      border-color: black; 
    }

    .navbar {
      background-color: maroon;
    }

    .navbar-brand {
      color: white;
      font-weight: bold;
    }

    .user-profile {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      margin-right: 10px;
    }

    /* Sidebar styling */
    .sidebar {
      height: 100vh;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      z-index: 1000;
      padding-top: 60px; /* Adjusted to accommodate the fixed-top navbar */
    }

    .sidebar-item {
      padding: 10px;
      border-bottom: 1px solid #eee;
    }

    .sidebar-item a {
      color: #333;
      text-decoration: none;
    }

    /* Content styling */
    .content {
      margin-left: 250px;
      padding-top: 70px; /* Adjusted to accommodate the fixed-top navbar */
      padding-left: 15px;
    }

    .btn-tanggapi {
     width: 80px;
     height: 30px;
     padding: 5px 10px;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="card">
    <div class="card-body">
    <div class="form-group search-container">
        <div class="text-center">
        <br>
        <h3 class="text-center bold-text">Tabel Penjualan</h3>
         <br>
         <form action="" method="post">
                    <label style="font-size: 16px; font-weight: bold; margin-bottom: 18px;">Cari berdasarkan</label>
                    <select name="pilih">
                        <option disabled selected>Pilih</option> 
                        <option value="ProdukID">Produk ID</option> 
                        <option value="NamaProduk">Nama Produk</option>
                        <option value="Harga">Harga</option>
                        <option value="Stok">Stok</option>
                    </select>
                    <input type="text" name="tekscari" size="24" style="border-radius: 5px;">
            <input type="submit" name="cari" value="Cari" style="background-color: black; color: white; border-radius: 5px; width: 150px;">
            <input type="submit" name="semua" value="Tampilkan Semua" style="background-color: black; color: white; border-radius: 5px; width: 200px;">
                </form>
        </div>
    </div>
      <table class="table table-bordered" id="dataTable">
      <thead>
        <tr>
          <th>Produk ID</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Stok</th>
          <th collspan="2">Aksi</th>
        </tr>
      </thead>
        <tbody>
 <?php
    include "koneksi.php";
    $tampil="";
    if (isset ($_POST['cari'])) {
    $pilih = $_POST['pilih'];
    $tekscari = $_POST[ 'tekscari'];
    $tampil = mysqli_query($koneksi, "select * from produk where $pilih like '%$tekscari%'");
    } else {
    $tampil = mysqli_query ($koneksi, "select * from produk");
    }
    foreach($tampil as $row) {
    ?>
    <tr>
    <td><?php echo $row['ProdukID']; ?></td> 
    <td><?php echo $row['NamaProduk']; ?></td>
    <td><?php echo $row['Harga']; ?></td>
    <td><?php echo $row['Stok']; ?></td>
    <td>
                <button type="button" class="btn btn-dark btn-sm" style="background-color: black; color: white; border-radius: 5px; width: 100px;"><?php echo "<a href='editproduk.php?id=$row[ProdukID]' class='text-white'>Edit</a>"; ?>
                </button>
                </td>
                <td><button type="button" class="btn btn-dark btn-sm" style="background-color: black; color: white; border-radius: 5px; width: 100px;"><?php echo "<a href='hapusproduk.php?id=$row[ProdukID]' class='text-white'>Hapus</a>"; ?>
                </button>
                </td>
</tr>
<?php }?>
    </table>
    </body>
     </tbody>
   </table>
     </div>
   </div>
 </div>
 <br>
<div class="text-center">
    <a href="logout.php" class="btn btn-dark" style="background-color: black; color: white; border-radius: 10px; width: 100px;">Logout</a>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

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
<body class="bg-light">

<?php
session_start(); // Start the session

if(isset($_POST['submit'])) {
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kasir"; // Ganti dengan nama database Anda

    $koneksi = new mysqli($servername, $username, $password, $dbname);

    if ($koneksi->connect_error) {
        die("Koneksi Gagal: " . $koneksi->connect_error);
    }
 
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Proses autentikasi
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // Autentikasi berhasil
        $row = $result->fetch_assoc();
        $_SESSION['id_admin'] = $row['id_admin'];

        // Redirect to the halaman 
        header("Location: dashboard.html");
        exit();
    } else {
        // Autentikasi gagal, redirect to the login page with an error message
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Login failed. Please check your username and password.",
        }).then(function() {
            window.location.href = "login.php";
        });
        </script>';
        exit();
    }

    $koneksi->close();
}
?>
  <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
    <div class="card">
      <div class="card-body">
     
        <h5 class="card-title font-weight-bold text-center mb-4">LOGIN</h5>
        <form method="post">
        <div class="form-group">
        <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user fa-solid"></i></span>
        </div>
          <input type="text" class="form-control" placeholder="Username" name="username" id="username">
        </div>
        </div>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-lock fa-solid"></i></span>
      </div>
      <input type="password" class="form-control" placeholder="Password" name="password" id="password">
    </div>
          </div>
          <div class="btn-group d-flex" role="group">
          <button type="submit" class="btn btn-primary flex-fill mr-2" name="submit">Login</button>
            <button type="button" class="btn btn-primary flex-fill">Cancel</button>
          </div>
        </form>
        <!-- <hr>
        <div class="text-center">
          <p>Belum punya akun? <a href="#">Daftar di sini</a></p>
        </div> -->
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
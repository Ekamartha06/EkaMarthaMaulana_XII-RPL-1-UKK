<?php
session_start(); // Start the session

//Hapus semua data sesi
session_unset();

//Hancurkan sesi
session_destroy();

//Redirect ke halaman login setelah logout
header("location: login.php");
exit();
?>
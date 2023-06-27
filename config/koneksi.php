<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "dea";

// Koneksi ke database
$conn = mysqli_connect($server, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

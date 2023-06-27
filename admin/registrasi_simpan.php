<?php
include "../config/koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];

// Enkripsi password
$hashedPassword = md5($password);

// Gunakan prepared statement untuk mencegah serangan SQL Injection
$stmt = mysqli_prepare($conn, "INSERT INTO user (email, password, nama_lengkap) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPassword, $nama_lengkap);

// Jalankan statement SQL
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: ../index.html');
    exit;
} else {
    die("Data gagal disimpan");
}
?>

<?php
session_start(); // Memulai sesi

include "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan nilai dari form login dan menghindari serangan SQL Injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Enkripsi password untuk membandingkan dengan data di database
    $pass = md5($password);

    // Query untuk memeriksa data login di database
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password = '$pass'");
    $result = mysqli_fetch_assoc($query);

    // Cek keberhasilan login
    if ($result) {
        // Login berhasil, simpan data pengguna ke sesi
        $_SESSION['user_email'] = $result['email'];
        
        // Redirect ke halaman dashboard atau konten yang diinginkan
        header('Location: dashboard.php');
        exit;
    } else {
        echo("Login gagal! Email dan password tidak benar.<br>");
        echo("<a href='../index.html'>Ulangi Lagi</a>");
    }
}
?>

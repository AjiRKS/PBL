<?php
include "../config/koneksi.php";

// Menghapus semua data dari tabel normalisasi
$queryNormalisasi = "TRUNCATE TABLE normalisasi";
$resultNormalisasi = mysqli_query($conn, $queryNormalisasi);

// Menghapus semua data dari tabel efisiensi
$queryEfisiensi = "TRUNCATE TABLE efisiensi";
$resultEfisiensi = mysqli_query($conn, $queryEfisiensi);

if ($resultNormalisasi && $resultEfisiensi) {
    // Penghapusan berhasil, arahkan kembali ke halaman yang diinginkan
    header("Location: data_lihat.php");
    exit();
} else {
    // Jika gagal menghapus, tampilkan pesan error
    echo "Error: " . mysqli_error($conn);
}
?>

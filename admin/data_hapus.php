<?php
include "../config/koneksi.php";

// Menghapus semua data dari tabel data_input
$query = "TRUNCATE TABLE data_input";
$result = mysqli_query($conn, $query);

if ($result) {
    // Penghapusan berhasil, arahkan kembali ke halaman data_lihat.php
    header("Location: data_input.php");
    exit();
} else {
    // Jika gagal menghapus, tampilkan pesan error
    echo "Error: " . mysqli_error($conn);
}
?>

<?php
// Koneksi ke database
include "../config/koneksi.php";

// Mendapatkan ID Alternatif dari URL
$id_alternatif = $_GET['id'];

// Menghapus data alternatif dari database
$query = mysqli_query($conn, "DELETE FROM alternatif WHERE id_alternatif='$id_alternatif'");

// Mengupdate id_alternatif setelah data dihapus
$query_update = mysqli_query($conn, "UPDATE alternatif SET id_alternatif = id_alternatif - 1 WHERE id_alternatif > '$id_alternatif'");

// Redirect ke halaman index.php setelah proses hapus selesai
header("Location: alternatif.php");
?>

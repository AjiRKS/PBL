<?php
// Koneksi ke database
include "../config/koneksi.php";

// Mendapatkan ID Kriteria dari URL
$id_kriteria = $_GET['id'];

// Menghapus data kriteria dari database
$query_delete = mysqli_query($conn, "DELETE FROM kriteria WHERE id_kriteria='$id_kriteria'");

// Mengupdate id_kriteria setelah data dihapus
$query_update = mysqli_query($conn, "UPDATE kriteria SET id_kriteria = id_kriteria - 1 WHERE id_kriteria > '$id_kriteria'");

// Redirect ke halaman index.php setelah proses hapus selesai
header("Location: kriteria.php");
?>

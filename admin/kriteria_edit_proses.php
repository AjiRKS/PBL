<?php
 // Koneksi ke database
 include "../config/koneksi.php";

// Mendapatkan data dari form
$id_kriteria = $_POST['id_kriteria'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$bobot_kriteria = $_POST['bobot_kriteria'];

// Mengupdate data kriteria di database
$query = mysqli_query($conn, "UPDATE kriteria SET nama='$nama', jenis='$jenis' , bobot_kriteria='$bobot_kriteria' WHERE id_kriteria='$id_kriteria'");

// Redirect ke halaman index.php setelah proses edit selesai
header("Location: kriteria.php");
?>

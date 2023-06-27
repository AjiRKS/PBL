<?php
// Koneksi ke database
include "../config/koneksi.php";

// Mendapatkan data dari form
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$bobot_kriteria = $_POST['bobot_kriteria'];

// Mencari id_kriteria yang belum tersedia
$available_id = null;
for ($i = 1; $i <= 5; $i++) {
    $query_check_id = "SELECT id_kriteria FROM kriteria WHERE id_kriteria = $i";
    $result = mysqli_query($conn, $query_check_id);
    if (mysqli_num_rows($result) == 0) {
        $available_id = $i;
        break;
    }
}

// Memeriksa apakah ada id_kriteria yang tersedia
if ($available_id === null) {
    echo "Tidak ada id_kriteria yang tersedia.";
    exit();
}

// Memasukkan data ke database
$query_insert = "INSERT INTO kriteria (id_kriteria, nama, jenis, bobot_kriteria) VALUES ('$available_id', '$nama', '$jenis', '$bobot_kriteria')";
mysqli_query($conn, $query_insert);

// Redirect ke halaman index.php setelah proses tambah selesai
header("Location: kriteria.php");
?>

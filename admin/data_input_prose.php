<?php
// Mengambil nilai input dari $_POST variabel
$nilai = $_POST['nilai'];

// Menghubungkan ke database
include "../config/koneksi.php";

// Mengambil data alternatif dari database
$queryAlternatif = mysqli_query($conn, "SELECT * FROM alternatif");
$alternatif = array();
while ($dataAlternatif = mysqli_fetch_array($queryAlternatif)) {
    $alternatif[] = $dataAlternatif['nama_alternatif'];
}

// Loop melalui nilai input
foreach ($nilai as $idAlternatif => $data) {
    // Mengambil nama alternatif
    $namaAlternatif = $alternatif[$idAlternatif - 1];

    // Inisialisasi array untuk menyimpan nilai kriteria
    $nilaiKriteria = array();

    // Mengambil nilai kriteria n1-n5
    for ($i = 1; $i <= 5; $i++) {
        $nilaiKriteria[] = isset($data[$i]) ? (double)$data[$i] : null;
    }

    // Masukkan data ke dalam database
    $query = "INSERT INTO data_input (id_data, nama_alternatif, n1, n2, n3, n4, n5) VALUES (NULL, '$namaAlternatif', '$nilaiKriteria[0]', '$nilaiKriteria[1]', '$nilaiKriteria[2]', '$nilaiKriteria[3]', '$nilaiKriteria[4]')";
    mysqli_query($conn, $query);
}

// Tutup koneksi ke database
mysqli_close($conn);

// Redirect ke halaman lain setelah menyimpan data
header("Location: data_lihat.php");
exit();
?>
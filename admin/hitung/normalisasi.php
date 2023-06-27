<?php
include "../../config/koneksi.php";

// Fungsi untuk melakukan normalisasi menggunakan metode DEA
function normalizeData($value, $min, $max)
{
    if ($max - $min == 0) {
        // Rentang nilai adalah nol, tetapkan nilai normalisasi menjadi 0 atau lakukan tindakan yang sesuai
        return 0;
    } else {
        return ($value - $min) / ($max - $min);
    }
}

$query = mysqli_query($conn, "SELECT * FROM data_input ORDER BY id_data");

// Mendapatkan nilai minimum dan maksimum untuk setiap kolom
$minN1 = PHP_INT_MAX;
$maxN1 = PHP_INT_MIN;
$minN2 = PHP_INT_MAX;
$maxN2 = PHP_INT_MIN;
$minN3 = PHP_INT_MAX;
$maxN3 = PHP_INT_MIN;
$minN4 = PHP_INT_MAX;
$maxN4 = PHP_INT_MIN;
$minN5 = PHP_INT_MAX;
$maxN5 = PHP_INT_MIN;

while ($data = mysqli_fetch_array($query)) {
    $idData = $data['id_data'];
    $namaAlternatif = $data['nama_alternatif'];
    $n1 = $data['n1'];
    $n2 = $data['n2'];
    $n3 = $data['n3'];
    $n4 = $data['n4'];
    $n5 = $data['n5'];

    // Matikan variabel n jika nilainya adalah 0
    if ($n1 == 0) {
        unset($n1);
    }
    if ($n2 == 0) {
        unset($n2);
    }
    if ($n3 == 0) {
        unset($n3);
    }
    if ($n4 == 0) {
        unset($n4);
    }
    if ($n5 == 0) {
        unset($n5);
    }

    // Menemukan nilai minimum dan maksimum untuk setiap kolom
    if (isset($n1)) {
        $minN1 = min($minN1, $n1);
        $maxN1 = max($maxN1, $n1);
    }

    if (isset($n2)) {
        $minN2 = min($minN2, $n2);
        $maxN2 = max($maxN2, $n2);
    }

    if (isset($n3)) {
        $minN3 = min($minN3, $n3);
        $maxN3 = max($maxN3, $n3);
    }

    if (isset($n4)) {
        $minN4 = min($minN4, $n4);
        $maxN4 = max($maxN4, $n4);
    }

    if (isset($n5)) {
        $minN5 = min($minN5, $n5);
        $maxN5 = max($maxN5, $n5);
    }

    /*
    // Lakukan pemrosesan data lainnya jika diperlukan
    */

    /*
    // Tampilkan data
    echo "ID Data: $idData<br>";
    echo "Nama Alternatif: $namaAlternatif<br>";
    if (isset($n1)) {
        echo "N1: $n1<br>";
    }
    if (isset($n2)) {
        echo "N2: $n2<br>";
    }
    if (isset($n3)) {
        echo "N3: $n3<br>";
    }
    if (isset($n4)) {
        echo "N4: $n4<br>";
    }
    if (isset($n5)) {
        echo "N5: $n5<br>";
    }

    echo "<br>";
    */
}

// Normalisasi data setelah nilai minimum dan maksimum ditemukan
mysqli_data_seek($query, 0); // Mengembalikan pointer ke awal hasil query

while ($data = mysqli_fetch_array($query)) {
    $idData = $data['id_data'];
    $namaAlternatif = $data['nama_alternatif'];
    $n1 = $data['n1'];
    $n2 = $data['n2'];
    $n3 = $data['n3'];
    $n4 = $data['n4'];
    $n5 = $data['n5'];

    // Matikan variabel n jika nilainya adalah 0
    if ($n1 == 0) {
        unset($n1);
    }
    if ($n2 == 0) {
        unset($n2);
    }
    if ($n3 == 0) {
        unset($n3);
    }
    if ($n4 == 0) {
        unset($n4);
    }
    if ($n5 == 0) {
        unset($n5);
    }

    // Normalisasi data
    if (isset($n1)) {
        $normalizedN1 = normalizeData($n1, $minN1, $maxN1);
        // Gunakan nilai ternormalisasi $normalizedN1 untuk pemrosesan selanjutnya
    }

    if (isset($n2)) {
        $normalizedN2 = normalizeData($n2, $minN2, $maxN2);
        // Gunakan nilai ternormalisasi $normalizedN2 untuk pemrosesan selanjutnya
    }

    if (isset($n3)) {
        $normalizedN3 = normalizeData($n3, $minN3, $maxN3);
        // Gunakan nilai ternormalisasi $normalizedN3 untuk pemrosesan selanjutnya
    }

    if (isset($n4)) {
        $normalizedN4 = normalizeData($n4, $minN4, $maxN4);
        // Gunakan nilai ternormalisasi $normalizedN4 untuk pemrosesan selanjutnya
    }

    if (isset($n5)) {
        $normalizedN5 = normalizeData($n5, $minN5, $maxN5);
        // Gunakan nilai ternormalisasi $normalizedN5 untuk pemrosesan selanjutnya
    }
 
    
    // Tampilkan data setelah normalisasi
    echo "ID Data: $idData<br>";
    echo "Nama Alternatif: $namaAlternatif<br>";
    if (isset($normalizedN1)) {
        echo "N1: $normalizedN1<br>";
    }
    if (isset($normalizedN2)) {
        echo "N2: $normalizedN2<br>";
    }
    if (isset($normalizedN3)) {
        echo "N3: $normalizedN3<br>";
    }
    if (isset($normalizedN4)) {
        echo "N4: $normalizedN4<br>";
    }
    if (isset($normalizedN5)) {
        echo "N5: $normalizedN5<br>";
    }

    echo "<br>";
    
}
?>

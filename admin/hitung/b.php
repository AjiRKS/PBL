<?php
include "../config/koneksi.php";

// Fungsi untuk melakukan normalisasi menggunakan metode DEA
function normalizeData($value, $min, $max)
{
    if ($max - $min == 0) {
        // Rentang nilai adalah nol, tetapkan nilai normalisasi menjadi 0 atau lakukan tindakan yang sesuai
        return 0;
    } else {
        $newMin = 1; // Rentang nilai minimum baru
        $newMax = 10; // Rentang nilai maksimum baru
        return (($value - $min) / ($max - $min)) * ($newMax - $newMin) + $newMin;
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
$normalizedN1 = null;
$normalizedN2 = null;
$normalizedN3 = null;
$normalizedN4 = null;
$normalizedN5 = null;

if (isset($n1)) {
    $normalizedN1 = normalizeData($n1, $minN1, $maxN1);
}

if (isset($n2)) {
    $normalizedN2 = normalizeData($n2, $minN2, $maxN2);
}

if (isset($n3)) {
    $normalizedN3 = normalizeData($n3, $minN3, $maxN3);
}

if (isset($n4)) {
    $normalizedN4 = normalizeData($n4, $minN4, $maxN4);
}

if (isset($n5)) {
    $normalizedN5 = normalizeData($n5, $minN5, $maxN5);
}

// Simpan data normalisasi ke tabel normalisasi kolom
$insertQuery = "INSERT INTO normalisasi (id_data, nama_alternatif, n1_normal, n2_normal, n3_normal, n4_normal, n5_normal) VALUES ('$idData', '$namaAlternatif', ";

if (isset($normalizedN1)) {
    $insertQuery .= "$normalizedN1, ";
} else {
    $insertQuery .= "NULL, ";
}

if (isset($normalizedN2)) {
    $insertQuery .= "$normalizedN2, ";
} else {
    $insertQuery .= "NULL, ";
}

if (isset($normalizedN3)) {
    $insertQuery .= "$normalizedN3, ";
} else {
    $insertQuery .= "NULL, ";
}

if (isset($normalizedN4)) {
    $insertQuery .= "$normalizedN4, ";
} else {
    $insertQuery .= "NULL, ";
}

if (isset($normalizedN5)) {
    $insertQuery .= "$normalizedN5";
} else {
    $insertQuery .= "NULL";
}

$insertQuery .= ") ON DUPLICATE KEY UPDATE id_data = id_data"; // Update dummy column to avoid error

mysqli_query($conn, $insertQuery);




}

// Menghitung Skor Efisiensi Relatif
$queryNormalisasi = mysqli_query($conn, "SELECT * FROM normalisasi");
$numData = mysqli_num_rows($queryNormalisasi);

$queryKriteria = mysqli_query($conn, "SELECT * FROM kriteria");
$numKriteria = mysqli_num_rows($queryKriteria);

while ($data = mysqli_fetch_array($queryNormalisasi)) {
    $idData = $data['id_data'];

    // Menghitung skor efisiensi relatif
    $totalOutput = 0;
    $totalInput = 0;

    while ($kriteria = mysqli_fetch_array($queryKriteria)) {
        $idKriteria = $kriteria['id_kriteria'];
        echo "$idKriteria";
        $bobot = $kriteria['bobot_kriteria'] / 100;
        $jenis = $kriteria['jenis'];

        if ($jenis == 'output') {
            $output = $data['n' . $idKriteria . '_normal'];
            $totalOutput += $bobot * $output;
        } else {
            $input = $data['n' . $idKriteria . '_normal'];
            $totalInput += $bobot * $input;
        }
    }

    if ($totalInput != 0) {
        $relativeEfficiency = $totalOutput / $totalInput;
    } else {
        $relativeEfficiency = 0;
    }

    // Simpan skor efisiensi relatif ke tabel efisiensi
    $insertEfficiencyQuery = "INSERT INTO efisiensi (id_data, skor_efisiensi) VALUES ('$idData', '$relativeEfficiency') ON DUPLICATE KEY UPDATE skor_efisiensi = '$relativeEfficiency'";
    mysqli_query($conn, $insertEfficiencyQuery);

    // Mengembalikan pointer query kriteria ke awal
    mysqli_data_seek($queryKriteria, 0);
}

// Menampilkan skor efisiensi relatif
$queryEfisiensi = mysqli_query($conn, "SELECT * FROM efisiensi");
$numEfisiensi = mysqli_num_rows($queryEfisiensi);

echo "Skor Efisiensi Relatif:<br>";

while ($data = mysqli_fetch_array($queryEfisiensi)) {
    $idData = $data['id_data'];
    $skorEfisiensi = $data['skor_efisiensi'];

    echo "ID Data: $idData<br>";
    echo "Skor Efisiensi: $skorEfisiensi<br>";
    echo "<br>";
}



?>

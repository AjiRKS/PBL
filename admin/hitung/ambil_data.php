<?php
include "../../config/koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM data_input ORDER BY id_data");

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

    // Lakukan pemrosesan data lainnya jika diperlukan

    
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
    
}
?>

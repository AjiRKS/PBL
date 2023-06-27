<?php
// Memeriksa apakah ada permintaan submit dari form
if (isset($_POST['submit'])) {
    // Menghubungkan ke database
    include "../config/koneksi.php";

    // Mendapatkan data input dari form
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];
    $n4 = $_POST['n4'];
    $n5 = $_POST['n5'];

    // Melakukan loop untuk mengupdate setiap data
    for ($i = 0; $i < count($n1); $i++) {
        $idData = $i + 1; // Menggunakan $i + 1 sebagai ID data

        // Mengecek apakah ada perubahan pada data input
        if ($n1[$i] !== '' || $n2[$i] !== '' || $n3[$i] !== '' || $n4[$i] !== '' || $n5[$i] !== '') {
            // Memeriksa apakah ada perubahan pada masing-masing nilai
            $updateValues = array();
            if ($n1[$i] !== '') {
                $updateValues[] = "n1 = '" . $n1[$i] . "'";
            }
            if ($n2[$i] !== '') {
                $updateValues[] = "n2 = '" . $n2[$i] . "'";
            }
            if ($n3[$i] !== '') {
                $updateValues[] = "n3 = '" . $n3[$i] . "'";
            }
            if ($n4[$i] !== '') {
                $updateValues[] = "n4 = '" . $n4[$i] . "'";
            }
            if ($n5[$i] !== '') {
                $updateValues[] = "n5 = '" . $n5[$i] . "'";
            }

            // Membuat query update jika ada perubahan pada data input
            if (!empty($updateValues)) {
                $updateQuery = "UPDATE data_input SET " . implode(', ', $updateValues) . " WHERE id_data = $idData";

                // Menjalankan query update
                $result = mysqli_query($conn, $updateQuery);

                // Memeriksa apakah update berhasil atau tidak
                if ($result) {
                    echo "Data berhasil diupdate.";
                } else {
                    echo "Gagal mengupdate data.";
                }
            }
        }
    }

    // Mengarahkan ke halaman data_lihat.php setelah proses update selesai
    header("Location: data_lihat.php");
    exit();
}
?>

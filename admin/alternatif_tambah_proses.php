<?php
// Koneksi ke database
include "../config/koneksi.php";

// Mendapatkan data dari form
$nama = $_POST['nama'];
$keterangan = $_POST['keterangan'];

// Mencari id_alternatif yang belum tersedia
$available_id = null;
for ($i = 1; $i <= 1000; $i++) {
    $query_check_id = "SELECT id_alternatif FROM alternatif WHERE id_alternatif = $i";
    $result = mysqli_query($conn, $query_check_id);
    if (mysqli_num_rows($result) == 0) {
        $available_id = $i;
        break;
    }
}

// Memeriksa apakah ada id_alternatif yang tersedia
if ($available_id === null) {
    echo "Tidak ada id_alternatif yang tersedia.";
    exit();
}

// Cek apakah ada file gambar yang diunggah
if (!empty($_FILES['gambar']['name'])) {
    // Mengambil informasi file gambar
    $gambar_name = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_size = $_FILES['gambar']['size'];
    $gambar_error = $_FILES['gambar']['error'];

    // Memindahkan file gambar ke folder foto
    $target_folder = "foto/";
    $target_path = $target_folder . $gambar_name;

    // Memeriksa apakah file yang diunggah adalah file gambar
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $fileExtension = strtolower(pathinfo($gambar_name, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        // File yang diunggah bukan file gambara
        echo "Hanya file gambar yang diizinkan (JPG, JPEG, PNG, GIF).";
        exit;
    }

    if ($gambar_error === 0) {
        if (move_uploaded_file($gambar_tmp, $target_path)) {
            // File gambar berhasil diupload, simpan informasi alternatif ke database
            $sql = "INSERT INTO alternatif (id_alternatif, nama_alternatif, keterangan_alternatif, gambar_alternatif) VALUES ('$available_id','$nama', '$keterangan', '$target_path')";
            
            if (mysqli_query($conn, $sql)) {
                // Data berhasil disimpan
                echo "Data berhasil disimpan.";
            } else {
                // Terjadi kesalahan saat menyimpan data
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            // Gagal memindahkan file gambar
            echo "Terjadi kesalahan saat mengunggah gambar.";
        }
    } else {
        // Terjadi kesalahan pada file gambar
        echo "Terjadi kesalahan pada file gambar.";
    }
} else {
    // Tidak ada file gambar yang diunggah, simpan informasi alternatif ke database tanpa gambar
    $sql = "INSERT INTO alternatif (id_alternatif, nama_alternatif, keterangan_alternatif) VALUES ('$available_id','$nama', '$keterangan')";

    if (mysqli_query($conn, $sql)) {
        // Data berhasil disimpan
        echo "Data berhasil disimpan.";
    } else {
        // Terjadi kesalahan saat menyimpan data
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Menutup koneksi ke database
mysqli_close($conn);

// Mengarahkan pengguna ke halaman alternatif.php setelah proses selesai
header("Location: alternatif.php");
exit;

?>

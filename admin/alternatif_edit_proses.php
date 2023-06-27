<?php
// Koneksi ke database
include "../config/koneksi.php";

// Mendapatkan data dari form
$id_alternatif = $_POST['id_alternatif'];
$nama_alternatif = $_POST['nama'];
$keterangan_alternatif = $_POST['keterangan'];

// Mengambil data alternatif berdasarkan ID Alternatif
$query = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif'");
$data = mysqli_fetch_array($query);

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

    if ($gambar_error === 0) {
        if (move_uploaded_file($gambar_tmp, $target_path)) {
            // File gambar berhasil diupload
            $gambar_alternatif = $target_path;

            // Hapus file gambar lama jika ada
            if (!empty($data['gambar_alternatif'])) {
                unlink($data['gambar_alternatif']);
            }
        } else {
            // Gagal memindahkan file gambar
            echo "Terjadi kesalahan saat mengunggah gambar.";
            exit;
        }
    } else {
        // Terjadi kesalahan pada file gambar
        echo "Terjadi kesalahan pada file gambar.";
        exit;
    }
} else {
    // Tidak ada file gambar yang diunggah
    $gambar_alternatif = $data['gambar_alternatif'];
}

// Update data alternatif
$query = mysqli_query($conn, "UPDATE alternatif SET nama_alternatif='$nama_alternatif', keterangan_alternatif='$keterangan_alternatif', gambar_alternatif='$gambar_alternatif' WHERE id_alternatif='$id_alternatif'");

if ($query) {
    // Jika berhasil update
    header("Location: alternatif.php");
} else {
    // Jika gagal update
    echo "Terjadi kesalahan saat memperbarui data alternatif.";
}
?>

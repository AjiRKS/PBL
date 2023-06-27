<?php
session_start(); // Memulai sesi

// Memeriksa apakah pengguna telah login atau belum
if (!isset($_SESSION['user_email'])) {
    // Jika pengguna belum login, redirect ke halaman login
    header('Location: ../index.html');
    exit;
}
?>

<!DOCTYPE html>
<!-- Coding by Aji NUr Prasetyo  -->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>SPK Metode DEA</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="boostrap.css" />
  <script src="script.js"></script>
  <script src="klik.js"></script>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</head>

<body>
  <!-- Include navbar -->
  <?php include 'navbar.php'; ?>
  <!-- Include sidebar -->
  <?php include 'sidebar.php'; ?>

  <!-- Include halaman konten -->
  <div class="konten">
    <!-- Page Content -->
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Detail Data</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                Alternatif yang dinilai
              </div>
              <div class="panel-body">
                <table class="table">
                  <?php
                  // Koneksi ke database
                  include "../config/koneksi.php";

                  // Mendapatkan ID Alternatif dari URL
                  $id_alternatif = $_GET['id'];

                  // Mengambil data alternatif berdasarkan ID Alternatif
                  $query = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif'");
                  $data = mysqli_fetch_array($query);

                  $nama_alternatif = $data['nama_alternatif'];
                  $keterangan_alternatif = $data['keterangan_alternatif'];
                  $gambar_alternatif = $data['gambar_alternatif'];
                  ?>

                  <tr>
                    <td>Nama</td>
                    <td><?php echo $nama_alternatif; ?></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td><?php echo $keterangan_alternatif; ?></td>
                  </tr>
                  <tr>
                    <td>Gambar</td>
                    <td>
                      <?php if (!empty($gambar_alternatif)) : ?>
                        <img src="<?php echo $gambar_alternatif; ?>" width="500px">
                      <?php else : ?>
                        <p>Tidak ada gambar</p>
                      <?php endif; ?>
                    </td>
                  </tr>
                </table>
                <button type="button" class="btn btn-xs btn-info" style="float: right;" onclick="goBack()"><i class="fa fa-times"></i> Kembali </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
  </div>
</body>

</html>

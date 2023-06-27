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
            <h1 class="page-header">Tambah Kriteria</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-green">
              <div class="panel-heading">
                Atur Kriteria Penilaian Anda
              </div>
              <div class="panel-body">
                <form action="kriteria_tambah_proses.php" method="post">
                  <div class="row form-group">
                    <div class="col-lg-3">
                      <label>Nama:</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="nama" required>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-lg-3">
                      <label>Jenis Kriteria:</label>
                    </div>
                    <div class="col-lg-9">
                      <select class="form-control" name="jenis" required>
                        <option value="input">Input</option>
                        <option value="output">Output</option>
                      </select>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-lg-3">
                      <label>Bobot Kriteria:</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="number" class="form-control" min="1" max="100" name="bobot_kriteria"  required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-md btn-success"><i class="fa fa-save"></i> Simpan</button>
                      <button type="reset" class="btn btn-md btn-warning"><i class="fa fa-undo"></i> Ulangi</button>
                      <button type="button" class="btn btn-md btn-danger" style="float: right;" onclick="goToKriteria()"><i class="fa fa-times"></i> Batal</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</body>

</html>

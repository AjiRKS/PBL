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
<!-- Coding by Aji Nur Prasetyo -->
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
            <h1 class="page-header">Edit Kriteria</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-green">
              <div class="panel-heading">
                Form Kriteria Penerima Bantuan
              </div>
              <div class="panel-body">
                <?php
                // Koneksi ke database
                include "../config/koneksi.php";

                // Mendapatkan ID Kriteria dari URL
                $id_kriteria = $_GET['id'];

                // Mengambil data kriteria berdasarkan ID Kriteria
                $query = mysqli_query($conn, "SELECT * FROM kriteria WHERE id_kriteria='$id_kriteria'");
                $data = mysqli_fetch_array($query);
                ?>

                <form action="kriteria_edit_proses.php" method="post">
                  <input type="hidden" name="id_kriteria" value="<?php echo $id_kriteria; ?>">
                  <div class="row form-group">
                    <div class="col-lg-3">
                      <label>Nama:</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-lg-3">
                      <label>Jenis Kriteria:</label>
                    </div>
                    <div class="col-lg-9">
                      <select class="form-control" name="jenis" required>
                        <option value="input" <?php if ($data['jenis'] == 'input') echo 'selected'; ?>>Input</option>
                        <option value="output" <?php if ($data['jenis'] == 'output') echo 'selected'; ?>>Output</option>
                      </select>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-lg-3">
                      <label>Bobot Kriteria:</label>
                    </div>
                    <div class="col-lg-9">
                      <input type="number" class="form-control" name="bobot_kriteria" min="1" max="100" value="<?php echo $data['bobot_kriteria']; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-md btn-success"><i class="fa fa-save"></i> Update</button>
                      <button type="reset" class="btn btn-md btn-warning"><i class="fa fa-undo"></i> Ulangi</button>
                      <a href="kriteria.php" class="btn btn-md btn-danger" style="float: right;"><i class="fa fa-times"></i> Batal</a>
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

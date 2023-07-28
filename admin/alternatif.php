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

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    /* Adjust the width of columns */
    #dataTables-example td:nth-child(1),
    #dataTables-example th:nth-child(1),
    #dataTables-example td:nth-child(2),
    #dataTables-example th:nth-child(2),
    #dataTables-example td:nth-child(3),
    #dataTables-example th:nth-child(3),
    #dataTables-example td:nth-child(4),
    #dataTables-example th:nth-child(4) {
      width: 10%;
      min-width: 80px;
    }

    /* Adjust column to wrap the content */
    #dataTables-example td:nth-child(2),
    #dataTables-example th:nth-child(2),
    #dataTables-example td:nth-child(3),
    #dataTables-example th:nth-child(3) {
      white-space: pre-line;
    }

    .panel-body {
      background-color: #fff;
      color: #000;
    }

    .dataTable_wrapper {
      background-color: #fff;
      color: #000;
    }

    #dataTables-example tbody td {
      background-color: white !important;
      color: black !important;
    }

    .dark .panel-body {
      background-color: #3f3f3f;
      color: #333;
    }

    .dark .dataTable_wrapper {
      background-color: #3f3f3f;
      color: #fff;
    }

    .dark #dataTables-example tbody td {
      background-color: #3f3f3f !important;
      color: white !important;
    }
  </style>
</head>

<body>
  <!-- Include navbar -->
  <?php include 'navbar.php'; ?>
  <!-- Include sidebar -->
  <?php include 'sidebar.php'; ?>

  <!-- Include halaman konten -->
  <div class="konten">
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Unit Yang Akan Dinilai</h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading" style="padding-bottom: 20px">
              <div class="judul">
                Masukkan unit yang akan dinilai efisiensinya!
                <a href="alternatif_tambah.php" class="btn btn-sm btn-success" style="float: right;"><i class="fa fa-plus"></i> Tambah</a>
              </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="dataTable_wrapper">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th style="text-align: center;">Nama Unit</th>
                      <th style="text-align: center;">Keterangan</th> <!-- Added column header -->
                      <th style="text-align: center;">Gambar</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Mengambil data alternatif dari database
                    include "../config/koneksi.php";
                    $query = mysqli_query($conn, "SELECT * FROM alternatif");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                      <tr>
                        <td><?php echo $data['nama_alternatif']; ?></td>
                        <td>
                          <?php
                          $words = str_word_count($data['keterangan_alternatif'], 1);
                          $limitedText = implode(' ', array_slice($words, 0, 5));

                          echo $limitedText;

                          if (count($words) > 5) {
                            echo '...'; 
                          }
                          ?>
                        </td>

                        <td><img src="<?php echo $data['gambar_alternatif']; ?>" alt="Gambar" width="100px"></td>
                        <td>
                          <a class="btn btn-xs btn-info" href="alternatif_lihat.php?id=<?php echo $data['id_alternatif']; ?>">Lihat</a>
                          <a class="btn btn-xs btn-warning" href="alternatif_edit.php?id=<?php echo $data['id_alternatif']; ?>">Edit</a>
                          <a class="btn btn-xs btn-danger" href="alternatif_hapus.php?id=<?php echo $data['id_alternatif']; ?>">Hapus</a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>

                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="script.js"></script>
  <script>
    $(document).ready(function() {
      $('#dataTables-example').DataTable();
    });
  </script>
</body>

</html>
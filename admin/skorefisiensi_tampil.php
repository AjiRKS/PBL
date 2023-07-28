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
    <style>
        .button-container {
            margin-top: 10px;
            text-align: right;
            position: absolute;
            right: 20px;
            bottom: 20px;
        }

        .panel-heading {
            position: relative;
        }

        .panel-body {
            background-color: #fff;
            color: #000;
            position: relative;
            padding-bottom: 70px;
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
                    <h1 class="page-header">Efisiensi Relatif</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-bottom: 20px">
                            <div class="judul">
                                Berikut hasil skor efisiensi relatif tiap Prodi!
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <form>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th style="text-align: center;">Nama Alternatif</th>
                                                <th style="text-align: center;">Skor Efisiensi</th>
                                                <th style="text-align: center;">Tingkat Efisiensi</th>
                                                <th style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Mengambil data dari database tabel normalisasi
                                            include "../config/koneksi.php";
                                            // Mengambil data dari database tabel normalisasi dan efisiensi dengan JOIN
                                            $query = mysqli_query($conn, "SELECT n.id_data, n.nama_alternatif, e.skor_efisiensi 
                                                FROM normalisasi n
                                                JOIN efisiensi e ON n.id_data = e.id_data
                                                ORDER BY n.id_data");

                                            $no = 1; // Variable to track the row number

                                            while ($data = mysqli_fetch_array($query)) {
                                                $idData = $data['id_data'];
                                                $namaAlternatif = $data['nama_alternatif'];
                                                $skorEfisiensi = $data['skor_efisiensi'];
                                                // Logika kondisional untuk menentukan tingkat efisiensi
                                                if ($skorEfisiensi > 7.5) {
                                                    $tingkatEfisiensi = 'Sangat Efisien';
                                                } elseif ($skorEfisiensi >= 5 && $skorEfisiensi <= 7.5) {
                                                    $tingkatEfisiensi = 'Efisien';
                                                } elseif ($skorEfisiensi >= 2.5 && $skorEfisiensi < 5) {
                                                    $tingkatEfisiensi = 'Kurang Efisien';
                                                } else {
                                                    $tingkatEfisiensi = 'Tidak Efisien';
                                                }

                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $namaAlternatif; ?></td>
                                                    <td><?php echo substr($skorEfisiensi, 0, 7); ?></td>
                                                    <td><?php echo $tingkatEfisiensi; ?></td>
                                                    <td><a class="btn btn-xs btn-info" href="alternatif_lihat.php?id=<?php echo $data['id_data']; ?>">Lihat</a></td>
                                                </tr>



                                            <?php
                                            }
                                            ?>

                                        </tbody>

                                    </table>

                                </form>
                                <div class="button-container">
                                    <div class="row">
                                    <div class="col-lg-6 text-left">
                                            <a href="normalisasi_tampil.php" class="btn btn-md btn-primary">Sebelumnya</a>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <button type="button" class="btn btn-md btn-danger" onclick="confirmDelete()">Hitung Ulang</button>
                                        </div>
                                    </div>
                                </div>

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

        function confirmDelete() {
            var result = confirm("Apakah Anda yakin ingin menghapus semua data?");
            if (result) {
                window.location.href = "hapus_hasilperhitungan.php";
            } else {
                // Jika pengguna membatalkan konfirmasi, tidak ada tindakan yang diambil
            }
        }
    </script>
</body>

</html>
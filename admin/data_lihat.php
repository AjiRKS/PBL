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
                    <h1 class="page-header">Data Penilaian</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-bottom: 20px">
                            <div class="judul">
                                Masukkan Nilai Kriteria tiap Alternatif!
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <form action="data_edit.php" method="POST">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th style="text-align: center;">Nama Alternatif</th>
                                                <?php
                                                // Mengambil data kriteria dari database
                                                include "../config/koneksi.php";
                                                $query = mysqli_query($conn, "SELECT * FROM kriteria");
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                    <th style="text-align: center;"><?php echo $data['nama']; ?>(<?php echo $data['jenis']; ?>)</th>
                                                <?php
                                                }  ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Mengambil data dari database tabel data_input
                                            include "../config/koneksi.php";
                                            $query = mysqli_query($conn, "SELECT * FROM data_input ORDER BY id_data");
                                            $no = 1; // Variable to track the row number

                                            while ($data = mysqli_fetch_array($query)) {
                                                $idData = $data['id_data'];
                                                $namaAlternatif = $data['nama_alternatif'];
                                                $n1 = $data['n1'];
                                                $n2 = $data['n2'];
                                                $n3 = $data['n3'];
                                                $n4 = $data['n4'];
                                                $n5 = $data['n5'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $namaAlternatif; ?></td>
                                                    <?php if ($n1 != 0) { ?>
                                                        <td><?php echo $n1; ?></td>
                                                    <?php } ?>
                                                    <?php if ($n2 != 0) { ?>
                                                        <td><?php echo $n2; ?></td>
                                                    <?php } ?>
                                                    <?php if ($n3 != 0) { ?>
                                                        <td><?php echo $n3; ?></td>
                                                    <?php } ?>
                                                    <?php if ($n4 != 0) { ?>
                                                        <td><?php echo $n4; ?></td>
                                                    <?php } ?>
                                                    <?php if ($n5 != 0) { ?>
                                                        <td><?php echo $n5; ?></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>

                                    </table>
                                    <div class="button-container">
                                        <div class="row">
                                            <div class="col-lg-6 text-left">
                                                <button type="submit" name="submit" class="btn btn-md btn-primary">Edit</button>
                                                <button type="button" class="btn btn-md btn-danger" onclick="confirmDelete()">Hapus Semua Data</button>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <?php
                                                // Mengambil jumlah baris dari query sebelumnya
                                                $numRows = mysqli_num_rows($query);
                                                if ($numRows > 0) {
                                                    echo '<a href="hitung_proses.php" class="btn btn-sm btn-success" style="float: right;"><i class="fa fa-plus"></i> Hitung</a>';
                                                } else {
                                                    echo '<a href="data_input.php" class="btn btn-sm btn-success" style="float: right;"><i class="fa fa-plus"></i> Input</a>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                window.location.href = "data_hapus.php";
            } else {
                // Jika pengguna membatalkan konfirmasi, tidak ada tindakan yang diambil
            }
        }
    </script>
</body>

</html>
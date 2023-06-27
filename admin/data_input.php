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
                    <h1 class="page-header">Input Data</h1>
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
                                <form action="data_input_prose.php" method="POST">
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
                                            // Mengambil data alternatif dari database
                                            include "../config/koneksi.php";
                                            $queryAlternatif = mysqli_query($conn, "SELECT * FROM alternatif");
                                            $index = 1;
                                            while ($dataAlternatif = mysqli_fetch_array($queryAlternatif)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $index; ?></td>
                                                    <td><?php echo $dataAlternatif['nama_alternatif']; ?></td>
                                                    <?php
                                                    $queryKriteria = mysqli_query($conn, "SELECT * FROM kriteria");
                                                    while ($dataKriteria = mysqli_fetch_array($queryKriteria)) {
                                                    ?>
                                                        <td>
                                                        <input type="text" name="nilai[<?php echo $index; ?>][<?php echo $dataKriteria['id_kriteria']; ?>]" class="form-control"  pattern="[0-9]+(\.[0-9]+)?" placeholder="Masukkan angka"  title="Masukkan bilangan desimal" required/>
                                                        </td>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            <?php
                                            $index++;
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                    <div class="button-container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-md btn-warning"><i class="fa fa-undo"></i> Ulangi</button>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <input type="submit" name="submit" value="Simpan" class="btn btn-md btn-primary">
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
    </script>
</body>

</html>

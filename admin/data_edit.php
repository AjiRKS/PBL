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
            display: flex;
            justify-content: space-between;
            align-items: center;
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
                                <form action="data_edit_proses.php" method="POST">
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
                                                        <td><input type="text" pattern="[0-9]+(\.[0-9]+)?" placeholder="Masukkan angka" name="n1[]" min="1" max="100" value="<?php echo $n1; ?>"></td>
                                                    <?php } ?>
                                                    <?php if ($n2 != 0) { ?>
                                                        <td><input type="text" pattern="[0-9]+(\.[0-9]+)?" placeholder="Masukkan angka" name="n2[]" min="1" max="100" value="<?php echo $n2; ?>"></td>
                                                    <?php }  ?>
                                                    <?php if ($n3 != 0) { ?>
                                                        <td><input type="text" pattern="[0-9]+(\.[0-9]+)?" placeholder="Masukkan angka" name="n3[]" min="1" max="100" value="<?php echo $n3; ?>"></td>
                                                    <?php } ?>
                                                    <?php if ($n4 != 0) { ?>
                                                        <td><input type="text" pattern="[0-9]+(\.[0-9]+)?" placeholder="Masukkan angka" name="n4[]" min="1" max="100" value="<?php echo $n4; ?>"></td>
                                                    <?php } ?>
                                                    <?php if ($n5 != 0) { ?>
                                                        <td><input type="text" pattern="[0-9]+(\.[0-9]+)?" placeholder="Masukkan angka" name="n5[]" min="1" max="100" value="<?php echo $n5; ?>"></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>

                                    </table>
                                    <div class="button-container">
                                        <div class="col-lg-4">
                                            <a href="data_lihat.php" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Batal</a>
                                        </div>
                                        <div class="col-lg-4 text-center">
                                            <button type="reset" class="btn btn-md btn-warning btn-ulang"><i class="fa fa-undo"></i> Ulangi</button>
                                        </div>
                                        <div class="col-lg-4 text-right">
                                            <button type="submit" name="submit" class="btn btn-md btn-primary">Simpan</button>
                                        </div>
                                        <div class="form-group">
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

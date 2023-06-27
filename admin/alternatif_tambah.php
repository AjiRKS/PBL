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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
            <h1 class="page-header">Tambah Alternatif</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-green">
              <div class="panel-heading">
                Masukan Informasi mengenai Alternatif Disini
              </div>
              <div class="panel-body">
                <form action="alternatif_tambah_proses.php" method="post" enctype="multipart/form-data">
                  <div class="row form-group">
                  </div>
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
                      <label>Keterangan:</label>
                    </div>
                    <div class="col-lg-9">
                      <textarea class="form-control" name="keterangan" required></textarea>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-lg-3">
                      <label>Gambar:</label>
                    </div>
                    <div class="col-lg-9">
                      <div class="container">
                        <div class="wrapper">
                          <div class="image" >
                            <image src="" alt="">
                          </div>
                          <div class="content">
                            <div class="icon">
                              <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="text">
                              No file chosen, yet!
                            </div>
                          </div>
                          <div id="cancel-btn">
                            <i class="fas fa-times"></i>
                          </div>
                          <div class="file-name">
                            File name here
                          </div>
                        </div>
 
                        <input id="default-btn" name="gambar" type="file" accept="image/*">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <button type="submit" class="btn btn-md btn-success" onclick="return validateForm()"><i class="fa fa-save"></i> Simpan</button>
                      <button type="reset" class="btn btn-md btn-warning"><i class="fa fa-undo"></i> Ulangi</button>
                      <button type="button" class="btn btn-md btn-danger" style="float: right;" onclick="goToAlternatif()"><i class="fa fa-times"></i> Batal</button>
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
    <script>
      const wrapper = document.querySelector(".wrapper");
const fileName = document.querySelector(".file-name");
const defaultBtn = document.querySelector("#default-btn");
const customBtn = document.querySelector("#custom-btn");
const cancelBtn = document.querySelector("#cancel-btn i");
const image = document.querySelector(".wrapper img");
let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

function defaultBtnActive() {
  defaultBtn.click();
}

defaultBtn.addEventListener("change", function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function () {
      const result = reader.result;
      image.src = result;
      wrapper.classList.add("active");
    };
    cancelBtn.addEventListener("click", function () {
      image.src = "";
      wrapper.classList.remove("active");
    });
    reader.readAsDataURL(file);
  }
  
  if (this.value) {
    let valueStore = this.value.match(regExp);
    fileName.textContent = valueStore;
  }
});

function validateForm() {
  const fileInput = document.getElementById("default-btn");
  const filePath = fileInput.value;
  const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  
  if (filePath) {
    if (!allowedExtensions.exec(filePath)) {
      alert("Hanya file gambar dengan ekstensi .jpeg, .jpg, .png, dan .gif yang diizinkan!");
      fileInput.value = "";
      image.src = "";
      wrapper.classList.remove("active");
      return false;
    }
  }
  
  return true;
}

    </script>
    <style>
      @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');


.container{
  height: 350px;
  width: 430px;
  position: relative;
}
.container .wrapper{
  position: relative;
  height: 300px;
  width: 100%;
  border-radius: 10px;
  background: #fff;
  border: 2px dashed #c2cdda;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}
.wrapper.active{
  border: none;
}
.wrapper .image{
  position: absolute;
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper image{
  height: 100%;
  width: 100%;
  object-fit: cover;
}
.wrapper .icon{
  font-size: 100px;
  color: #9658fe;
}
.wrapper .text{
  font-size: 20px;
  font-weight: 500;
  color: #222;
  margin-top: 8px;
}
.wrapper #cancel-btn{
  position: absolute;
  height: 35px;
  width: 35px;
  border-radius: 50%;
  background: #222;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  color: #fff;
  top: -10px;
  right: -10px;
  cursor: pointer;
  opacity: 0;
  pointer-events: none;
  z-index: 100;
  transition: 0.3s ease-in-out;
}
.wrapper:hover #cancel-btn{
  opacity: 1;
  pointer-events: auto;
}
.wrapper .file-name{
  position: absolute;
  bottom: -40px;
  left: 0;
  width: 100%;
  text-align: center;
  font-size: 14px;
  color: #555;
}
  </style>
</body>

</html>

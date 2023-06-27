<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../login.css">
  <title>SPK Metode DEA</title>
</head>

<body>
  <section>
    <div class="form-box">
      <div class="form-value">
        <form method="POST" action="registrasi_simpan.php">
          <h2>Registrasi User</h2>
          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="text" name="email" required>
            <label for="">Email</label>
          </div>
          <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" required>
            <label for="">Password</label>
          </div>
          <div class="inputbox">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" name="nama_lengkap" required>
            <label for="">Nama Lengkap</label>
          </div>
          <button type="submit">Simpan</button>
          <div class="register">
            <p>Have any account? <a href="../index.html">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-thin-rounded/css/uicons-thin-rounded.css'>

<nav class="sidebar">
  <div class="menu_content">
    <ul class="menu_items">
      <div class="menu_title menu_dahsboard"></div>
      <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
      <!-- start -->
      <li class="item">
        <a href="dashboard.php" class="nav_link">
          <span class="navlink_icon">
            <i class="bx bx-home-alt"></i>
          </span>
          <span class="navlink">Home</span>
        </a>
      </li>
      <li class="item">
        <a href="alternatif.php" class="nav_link">
          <span class="navlink_icon">
            <i class="fi fi-rr-users-alt"></i>
          </span>
          <span class="navlink">Alternatif</span>
        </a>
      </li>
      <li class="item">
        <a href="kriteria.php" class="nav_link">
          <span class="navlink_icon">
            <i class="fi fi-rr-square-star"></i>
          </span>
          <span class="navlink">Kriteria</span>
        </a>
      </li>
      <li class="item">
        <a href="data_lihat.php" class="nav_link">
          <span class="navlink_icon">
          <i class="fi fi-tr-input-numeric"></i>
          </span>
          <span class="navlink">Input Data</span>
        </a>
      </li>
      <!-- end -->

      <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
    </ul>

    <ul class="menu_items">
      <div class="menu_title menu_editor"></div>
      <!-- duplicate these li tag if you want to add or remove navlink only -->
      <!-- Start -->
      <li class="item">
        <a href="normalisasi_tampil.php" class="nav_link">
          <span class="navlink_icon">
            <i class="bx bxs-magic-wand"></i>
          </span>
          <span class="navlink">Normalisasi</span>
        </a>
      </li>
      <!-- End -->

      <li class="item">
        <a href="skorefisiensi_tampil.php" class="nav_link">
          <span class="navlink_icon">
            <i class="bx bx-loader-circle"></i>
          </span>
          <span class="navlink">Efisiensi Relatif</span>
        </a>
      </li>
    </ul>
    <ul class="menu_items">
      <div class="menu_title menu_setting"></div>
      <li class="item">
        <a href="../chatt/index.php" class="nav_link">
          <span class="navlink_icon">
            <i class='bx bx-chat'></i>
          </span>
          <span class="navlink">Chatt</span>
        </a>
      </li>
      <li class="item">
        <a href="#" class="nav_link" onclick="confirmLogout()">
          <span class="navlink_icon">
            <i class='bx bx-log-out'></i>
          </span>
          <span class="navlink">Logout</span>
        </a>
      </li>
    </ul>

    <!-- Sidebar Open / Close -->
    <div class="bottom_content">
      <div class="bottom expand_sidebar">
        <span> Expand</span>
        <i class='bx bx-expand'></i>
      </div>
      <div class="bottom collapse_sidebar">
        <span> Collapse</span>
        <i class='bx bx-collapse'></i>

      </div>
    </div>
  </div>
</nav>



<script>
  function confirmLogout() {
    var confirmation = confirm("Apakah Anda yakin ingin logout?");
    if (confirmation) {
      // Lakukan tindakan logout di sini
      // Misalnya, arahkan ke halaman logout.php
      window.location.href = "logout.php";
    }
  }
</script>
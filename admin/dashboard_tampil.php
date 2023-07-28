<link rel="stylesheet" href="dashboard.css">
<!-- Fontawesome Link for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<style>
  .about h2,
  .portfolio h2 {
    color: #000000;
    /* Warna Teks */
    font-size: 20pt;
    padding-bottom: 5px;
  }

  .about h3 {
    font-size: 14pt;
    color: #000000
  }

  .portfolio p1,
  .about p {
    color: #000000;
    /* warna teks */
    text-align: justify;
  }

  .dark .about h2,
  .dark .portfolio h2 {
    color: #ffffff;
    /* Warna Teks */
    font-size: 20pt;
    padding-bottom: 5px;
  }

  .dark .about h3 {
    font-size: 14pt;
    color: #ffffff;
  }

  .dark .portfolio p1,
  .dark .about p {
    color: #ffffff;
    /* warna teks */
    text-align: justify;
  }
</style>

<section class="homepage" id="home">
  <div class="content">
    <div class="text">
      <h1>Sistem Pendukung Keputusan</h1>
      <p>
        Selamat datang di website kami <br> SPK ini menggunakan metode Data Envelopment Analysis.</p>
    </div>
    <a href="#about">About DEA</a>
  </div>
</section>

<section class="portfolio" id="portfolio">
  <h2>Our Portfolio</h2>
  <p1>Sedikit informasi mengenai fasilitas di Politeknik Bhakti Semesta.</p1>
  <ul class="cards">
    <li class="card">
      <img src="images/lab-siber.jpg" alt="img">
      <h3>Lab Siber</h3>
      <p>Laboratorium utama Program Studi Rekayasa Keamanan Siber.</p>
    </li>
    <li class="card">
      <img src="images/lab-bahasa.jpg" alt="img">
      <h3>Lab Bahasa</h3>
      <p>Laboratorium utama Program Studi Bisnis Digital.</p>
    </li>
    <li class="card">
      <img src="images/lab-mm.jpg" alt="img">
      <h3>Lab Komputer</h3>
      <p>Laboratorium utama Program Studi Teknik Rekayasa Multimedia.</p>
    </li>
    <li class="card">
      <img src="images/auditorium.jpg" alt="img">
      <h3>Auditorium</h3>
      <p>Ruang ini digunakan untuk kegiatan-kegiatan seperti kuliah terbuka mahasiswa, pertemuan-pertemuan dan kegiatan lainnya.</p>
    </li>
    <li class="card">
      <img src="images/perpustakaan.jpg" alt="img">
      <h3>Perpustakaan</h3>
      <p>Dilengkapi dengan buku- buku sesuai dengan kebutuhan program studi serta komputer yang terhubung ke jaringan internet.</p>
    </li>
    <li class="card">
      <img src="images/ruang-kelas.png" alt="img">
      <h3>Ruang Kelas</h3>
      <p>Ruangan pembelajaran untuk kegiatan belajar mengajar teori.</p>
    </li>
  </ul>
</section>

<section class="about" id="about">
  <h2>About Metode DEA</h2>
  <p>SPK adalah sistem yang didesain untuk membantu pengambilan keputusan dengan menganalisis data dan informasi yang tersedia. Dan dalam SPK ini metode yang saya gunakan adalah metode DEA(Data Envelopment Analysis). Sebuah metode DEA yang mengukur efisiensi relatif unit pengambil keputusan(DMUs) dengan menganalisis input dan output. Tujuannya adalah menemukan unit-unit yang mencapai hasil maksimal dengan penggunaan input minimal. Metode DEA telah digunakan secara luas di berbagai bidang seperti keuangan, manajemen operasi, ekonomi, dan penelitian operasi sejak dikembangkan oleh Charnes, Cooper, dan Rhodes pada tahun 1978. Langkah-langkah dalam SPK DEA :</p>
  <div class="row company-info">
    <h3>1. Menentukan DMUs yang akan dievaluasi</h3>
    <p></p> Merupakan unit-unit yang akan dievaluasi, dapat orang, kelompok, organisasi, negara, dan masih banyak lagi.
    <h3>2. Menentukan variabel input serta output yang relevan</h3>
    <p>Dan dalam web ini kita dapat menentukan total 5 variabel baik input maupun output, kita dapat menentukan tipe dan bobot tiap variabel(dimana total bobot tiap tipe harus 100).</p>
    <h3>3. Mengumpulkan data yang bersangkutan</h3>
    <p>Kumpulkan data input dan output untuk setiap unit guna untuk dilakukan penilain, data harus akurat agar mendapatkan hasil yang maksimal</p>
    <h3>4. Normalisasi Data Input dan Output</h3>
    <p>Normalisasi ini berguna untuk memastikan bahwa semua variabel memiliki skala yang sama dan tidak ada variabel yang mendominasi perhitungan.Dalam web ini saya menggunakan Normalisasi MIN-MAX dengan rentang nilai 1-10.</p>
    <h3>5. Menghitung Efisiensi Relatif Tiap Unit</h3>
    <p> Dalam website ini saya menggunakan model DEA CCR (Charnes, Cooper, Rhodes) yaitu dengan membandingkan ouptut dengan input untuk memperoleh efisiensi relatif. Unit-unit yang memiliki efisiensi relatif diatas 7,5 dianggap efisien, dibawah 7,5 dan diatas 5 dianggap cukup efisien, dibawah 5 dan diatas 2,5 dianggap kurang efisien, dibawah 2,5 dianggap tidak efisien.</p>
  </div>
</section>

<section class="contact" id="contact">

</section>
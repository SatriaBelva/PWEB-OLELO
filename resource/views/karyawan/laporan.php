<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Penjualan OLELO</title>
    <link rel="stylesheet" href="resource/views/css/style-karyawan.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <div class="logo_name">OLELO</div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <ul class="nav-list">
        <li>
          <a href="<?=urlpath('menu-karyawan')?>">
            <i class="bx bx-compass"></i>
            <div class="links_name">Menu</div>
          </a>
        </li>
        <li>
          <a href="<?=urlpath('pesanan-karyawan')?>">
            <i class="bx bx-cart-alt"></i>
            <div class="links_name">Pesanan</div>
          </a>
        </li>
        <li>
          <a href="<?=urlpath('riwayat-karyawan')?>">
            <i class="bx bx-bar-chart-alt-2 icon"></i>
            <div class="links_name">Riwayat Pesanan</div>
          </a>
        </li>
        <li>
          <a href="<?=urlpath('laporan-karyawan')?>">
            <i class="bx bx-line-chart"></i>
            <div class="links_name">Laporan</div>
          </a>
        </li>
        <li class="profile">
          <div class="profile-details">
            <img src="/assets/profile-karyawan.png" alt="profileImg">
            <div class="name_job">
              <div class="name">Hallo, Linda</div>
              <div class="job">Karyawan</div>
            </div>
          </div>
          <i class='bx bx-log-out' id="log_out"></i>
        </li>
      </ul>
    </div>

    <section class="home-section">

      <div class="container">
        <h3>Toko Oleh-Oleh Madurasa</h3>
        <p id="current-date"></p>
        <header>
          <h1>Hasil Laporan Analisis Penjualan OLELO</h1>
          <div class="filters">
            <label for="start-month">Dari Bulan:</label>
            <select id="start-month">
              <option>Januari</option>
              <option>Februari</option>
              <option>Maret</option>
              <!-- Add more months as needed -->
            </select>
            <label for="end-month">Sampai Bulan:</label>
            <select id="end-month">
              <option>Desember</option>
              <option>November</option>
              <option>Oktober</option>
              <!-- Add more months as needed -->
            </select>
            <button class="download">Download</button>
          </div>
        </header>
        <div class="charts">
          <div class="chart" id="omset-penjualan">
            <img src="../omset_penjualan.png" alt="Omset Penjualan OLELO 2024" />
          </div>
          <div class="chart" id="grafik-penjualan">
            <img src="../grafik_penjualan.png" alt="Grafik Penjualan OLELO 2024" />
          </div>
        </div>
        <div class="best-seller">
          <h2>Menu Best Seller</h2>
          <ul>
            <?php foreach($bestSeller as $bestSeller) : ?>
            <li> <?php echo htmlspecialchars($bestSeller['nama']) ?><span><?php echo htmlspecialchars($bestSeller['jumlah']) ?></span></li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </section>
    <script src="/sidebar/script.js"></script>
  </body>
</html>

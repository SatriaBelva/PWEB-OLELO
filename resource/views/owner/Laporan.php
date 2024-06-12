<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laporan Penjualan OLELO</title>
    <link rel="stylesheet" href="resource/views/css/style-owner.css" />
    <link rel="stylesheet" href="/sidebar/style.css" />
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
          <a href="<?=urlpath('menu-owner')?>">
            <i class="bx bx-compass"></i>
            <div class="links_name">Menu</div>
          </a>
        </li>
        <li>
          <a href="<?=urlpath('pesanan-owner')?>">
            <i class="bx bx-cart-alt"></i>
            <div class="links_name">Pesanan</div>
          </a>
        </li>
        <li>
          <a href="<?=urlpath('riwayat-owner')?>">
            <i class="bx bx-bar-chart-alt-2 icon"></i>
            <div class="links_name">Riwayat Pesanan</div>
          </a>
        </li>
        <li>
          <a href="<?=urlpath('laporan-owner')?>">
            <i class="bx bx-line-chart"></i>
            <div class="links_name">Laporan</div>
          </a>
        </li>
        <li>
          <a href="<?=urlpath('daftarkaryawan-owner')?>">
          <i class="bx bx-user-check"></i>
            <div class="links_name">Laporan</div>
          </a>
        </li>
        <li class="profile">
          <a href="<?=urlpath('logout')?>">
            <i class='bx bx-log-out' id="log_out"></i>
          </a>
        </li>
      </ul>
    </div>

    <section class="home-section">

      <div class="container">
        <h3>Toko Oleh-Oleh OLELO</h3>
        <p id="current-date"></p>
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

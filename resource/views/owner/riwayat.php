<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link rel="stylesheet" href="resource/views/css/style-owner.css">
    <link rel="stylesheet" href="/sidebar/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">OLELO</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="<?=urlpath('menu-owner')?>">
                    <i class='bx bx-compass'></i>
                    <div class="links_name">Menu</div>
                </a>
            </li>
            <li>
                <a href="<?=urlpath('pesanan-owner')?>">
                    <i class='bx bx-cart-alt'></i>
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
                    <i class='bx bx-line-chart'></i>
                    <div class="links_name"> Laporan</div>
                </a>
            </li>
            <li>
          <a href="<?=urlpath('daftarkaryawan-owner')?>">
            <i class="bx bx-user-check"></i>
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
            <h3>Toko Oleh-Oleh Madurasa</h1>
                <p id="current-date"></p>
            <header>
                <h1>Riwayat Pesanan OLELO</h1>
                <div class="date-filter">
                    <button>Today</button>
                    <button>Yesterday</button>
                    <button>Week</button>
                    <button>Month</button>
                </div>
            </header>
            <div class="summary">
                <div class="summary-item">
                    <p>Pendapatan</p>
                    <h2>Rp<?php echo htmlspecialchars($total[0]['total']) ?></h2>
                </div>
                <div class="summary-item">
                    <p>Total Menu Terjual</p>
                    <h2> <?php echo htmlspecialchars($totalPesanan[0]['totalPesanan'])?> </h2>
                </div>
                <div class="summary-item">
                    <p>Total Transaksi</p>
                    <h2> <?php echo htmlspecialchars($totalTransaksi[0]['totalTransaksi'])?></h2>
                </div>
            </div>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>No Transaksi</th>
                        <th>Nama Customer</th>
                        <th>Menu</th>
                        <th>Total Menu</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($detailTransaksi as $detailTransaksi) : ?>
                    <tr>
                        <td>#TR<?php echo htmlspecialchars($detailTransaksi['id']) ?></td>
                        <td>   <?php echo htmlspecialchars($detailTransaksi['nama']) ?></td>
                        <td>   <?php echo htmlspecialchars($detailTransaksi['daftar_menu']) ?></td>
                        <td>   <?php echo htmlspecialchars($detailTransaksi['jumlah_menu_dipesan']) ?></td>
                        <td>   <?php echo htmlspecialchars($detailTransaksi['total_harga']) ?></td>
                        <td>   <?php echo htmlspecialchars($detailTransaksi['total_harga']) ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="/sidebar/script.js"></script>

</body>
</html>

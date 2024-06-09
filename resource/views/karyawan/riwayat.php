<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link rel="stylesheet" href="resource/views/css/style-karyawan.css">
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
                <a href="<?=urlpath('menu-karyawan')?>">
                    <i class='bx bx-compass'></i>
                    <div class="links_name">Menu</div>
                </a>
            </li>
            <li>
                <a href="<?=urlpath('pesanan-karyawan')?>">
                    <i class='bx bx-cart-alt'></i>
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
                    <i class='bx bx-line-chart'></i>
                    <div class="links_name"> Laporan</div>
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
                    <p>Omzet</p>
                    <h2> <?php  ?></h2>
                </div>
                <div class="summary-item">
                    <p>Total Menu Terjual</p>
                    <h2>150</h2>
                </div>
                <div class="summary-item">
                    <p>Total Transaksi</p>
                    <h2>35</h2>
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
                    <tr>
                        <td>TR0001</td>
                        <td>Dayinta</td>
                        <td>Prol Tape, Suwar-Suwir, Dan Jenang Tape</td>
                        <td>3</td>
                        <td>Rp 90.000</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td>TR0001</td>
                        <td>Dayinta</td>
                        <td>Prol Tape, Suwar-Suwir, Dan Jenang Tape</td>
                        <td>3</td>
                        <td>Rp 90.000</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td>TR0001</td>
                        <td>Dayinta</td>
                        <td>Prol Tape, Suwar-Suwir, Dan Jenang Tape</td>
                        <td>3</td>
                        <td>Rp 90.000</td>
                        <td>Selesai</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <script src="/sidebar/script.js"></script>

</body>
</html>

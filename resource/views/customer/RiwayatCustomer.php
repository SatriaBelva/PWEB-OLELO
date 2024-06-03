<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resource/views/css/styles-customer.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo-details">
                <div class="logo_name">OLELO</div>
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav-list">

                <li>
                    <a href="<?=urlpath('menu')?>">
                        <i class='bx bx-compass'></i>
                        <div class="links_name">Menu</div>
                    </a>
                </li>
                <li>
                    <a href="<?=urlpath('pesanan')?>">
                        <i class='bx bx-cart-alt'></i>
                        <div class="links_name">Pesanan</div>
                    </a>
                </li>
                <li>
                    <a href="<?=urlpath('riwayatcustomer')?>">
                        <i class="bx bx-bar-chart-alt-2 icon"></i>
                        <div class="links_name">Riwayat Pesanan</div>
                    </a>
                </li>
                <li>
                    <a href="/laporan/laporan.html">
                        <i class='bx bx-line-chart'></i>
                        <div class="links_name"> Laporan</div>
                    </a>
                </li>
                <li class="profile">
                    <div class="profile-details">
                      <img src="c:\Users\USER\OneDrive\Documents\PWEB\oleloo\assets\profile-karyawan.png" alt="profileImg">
                      <div class="name_job">
                        <div class="name">Hallo, Linda</div>
                        <div class="job">Karyawan</div>
                      </div>
                    </div>
                    <i class='bx bx-log-out' id="log_out"></i>
                  </li>
                </ul>
              </div>
              <div class="content">
                <header class="header">
                    <h1>Toko Oleh-Oleh Madurasa</h1>
                    <p>Sunday, June 20 2021</p>
                    <h2>Riwayat Pesanan</h2>
                
                    <div> 
                        <table style="border: 5px; border-style: solid; border-color: black; width: 100%;">
                            <thead>
                                <tr>
                                    <td>No Transaksi</td>
                                    <td>Menu</td>
                                    <td>Jumlah</td>
                                    <td>Harga</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                        </table>

                        <table style="gap: 0px; width: 100%; background-color:white;">
                                <tr>
                                    <td>#0011</td>
                                    <td>Pie Edamame</td>
                                    <td>5</td>
                                    <td>Rp. 56.000</td>
                                    <td>Lunas</td>
                                </tr>
                        </table>
                        
                    </div>
                </div>
        </div>
              <script src="/sidebar/script.js"></script>
              <script src="/Costumer/script.js"></script>
</body>
</html>
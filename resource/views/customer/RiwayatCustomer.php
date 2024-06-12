<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resource/views/css/styles-customer.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ecf0f1;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table thead {
            background-color: #C5C8FF;
            color: black;
        }

        table thead th, table thead td {
            padding: 12px 15px;
            text-align: left;
        }

        table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #d1ecf1;
        }

        table tbody td {
            padding: 12px 15px;
        }
    </style>
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
                <li class="profile">
                    <a href="<?=urlpath('logout')?>">
                        <i class='bx bx-log-out' id="log_out"></i>
                    </a>
                </li>
                </ul>
              </div>
              <div class="content">
                <header class="header">
                    <h1>Toko Oleh-Oleh OLELO</h1>
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
                                    <td>Waktu</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($transaksi as $transaksi) : ?>
                                <tr>
                                    <td>#TR<?php echo htmlspecialchars($transaksi['id']) ?> </td>    
                                    <td><?php echo htmlspecialchars($transaksi['daftar_menu']) ?> </td>    
                                    <td><?php echo htmlspecialchars($transaksi['jumlah_menu_dipesan']) ?> </td>    
                                    <td><?php echo htmlspecialchars($transaksi['total_harga']) ?> </td>    
                                    <td><?php echo htmlspecialchars($transaksi['hari'])." ".htmlspecialchars($transaksi['bulan'])." ".htmlspecialchars($transaksi['tahun'])." ".htmlspecialchars($transaksi['waktu']) ?> </td>    
                                    <td><?php echo htmlspecialchars($transaksi['status']) ?> </td>    
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
              <script src="/sidebar/script.js"></script>
              <script src="/Costumer/script.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Toko Oleh-Oleh OLELO</title>
    <link rel="stylesheet" href="resource/views/css/style-karyawan.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .container-pesanan {
            width: 100%;
            border-radius: 10px;
            background:  #AFB3FF;
            padding: 10px;
            margin-bottom: 20px;
            color: black;
            height: auto;
        }
        table {
            margin-top:10px;
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
        button {
            width: 100%;
            padding: 10px 15px;
            margin-top: 10px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            color: #fff;
            background-color: #007bff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:active {
            background-color: #004494;
        }

        button:focus {
            outline: none;
        }
    </style>
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
            <a href="<?=urlpath('logout')?>">
              <i class='bx bx-log-out' id="log_out"></i>
            </a>
          </li>
        </ul>
      </div>
      <section class="home-section">
        <div class="container">
          <h3>Toko Oleh-Oleh OLELO</h3>
          <h2>Daftar Pesanan Baru</h2>
          <?php foreach ($pesanan as $pesanan_item) : ?>
            <div class="container-pesanan">
                <div>
                    <?php echo "#TR".htmlspecialchars($pesanan_item['id_transaksi']) ?><br>
                    <?php echo htmlspecialchars($pesanan_item['nama']) ?><br>
                    <?php echo htmlspecialchars($pesanan_item['hari'])." ".htmlspecialchars($pesanan_item['bulan'])." ".htmlspecialchars($pesanan_item['tahun'])." ".htmlspecialchars($pesanan_item['waktu']) ?>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Nama Menu</td>
                            <td>Harga per Satuan</td>
                            <td>Jumlah</td>
                            <td>Sub Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($all_detail_pesanan[$pesanan_item['id_transaksi']])): ?>
                            <?php foreach ($all_detail_pesanan[$pesanan_item['id_transaksi']] as $detail): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($detail['nama']) ?></td>
                                    <td><?php echo htmlspecialchars($detail['harga']) ?></td>
                                    <td><?php echo htmlspecialchars($detail['Jumlah']) ?></td>
                                    <td><?php echo htmlspecialchars($detail['sub_total']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="button-container">
                    <form action="<?= urlpath('statusditerima-karyawan')."?id=".$pesanan_item['id_transaksi'] ?>" method="post">
                        <input type="hidden" name="id_transaksi" value="<?php echo htmlspecialchars($pesanan_item['id_transaksi']); ?>">
                        <button type="submit" class="button-accept">Diterima</button>
                    </form>
                    <form action="<?= urlpath('statusditolak-karyawan')."?id=".$pesanan_item['id_transaksi'] ?>" method="post">
                        <input type="hidden" name="id_transaksi" value="<?php echo htmlspecialchars($pesanan_item['id_transaksi']); ?>">
                        <button type="submit" class="button-reject">Ditolak</button>
                    </form>
                </div>
            </div>
          <?php endforeach; ?>
          <p id="current-date"></p>
        </div>
      </section>
    <script>
    function changeColor(button) {
        let originalColor = button.style.backgroundColor;
        
        if (button.classList.contains('confirm')) {
            button.style.backgroundColor = '#d4d46f'; // New color for confirm button when clicked
        } else if (button.classList.contains('reject')) {
            button.style.backgroundColor = '#d46b6b'; // New color for reject button when clicked
        }
        
        // Set timeout to revert back to original color after 500ms
        setTimeout(() => {
            button.style.backgroundColor = originalColor;
        }, 500);
    }


    </script>
    <script src="/sidebar/script.js"></script>
</script>
</body>
</html>

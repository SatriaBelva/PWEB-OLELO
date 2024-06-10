<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Toko Oleh-Oleh Madurasa</title>
    <link rel="stylesheet" href="resource/views/css/style-customer.css">
    <link rel="stylesheet" href="resource/views/css/style-owner.css">
    <link rel="stylesheet" href="/sidebar/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .container-pesanan {
            width: 100%;
            border-radius: 10px;
            background: #AFB3FF;
            padding: 10px;
            margin-bottom: 20px;
            color: black;
            height: auto;
        }
        table {
            width: 100%;

            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #4CAF50;
            color: white;
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
            <a href="<?=urlpath('menu')?>">
              <i class="bx bx-compass"></i>
              <div class="links_name">Menu</div>
            </a>
          </li>
          <li>
            <a href="<?=urlpath('pesanan')?>">
              <i class="bx bx-cart-alt"></i>
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
      <section class="home-section">
        <div class="container">
          <h3>Toko Oleh-Oleh Madurasa</h3>
          <h2>Daftar Pesanan Baru</h2>
          <?php foreach ($pesanan as $pesanan_item) : ?>
            <div class="container-pesanan">
              <div>
                <?php echo "#TR".htmlspecialchars($pesanan_item['id_transaksi']) ?><br>
                <?php echo htmlspecialchars($pesanan_item['nama']) ?><br>
                <?php echo htmlspecialchars($pesanan_item['Tanggal']) ?>
                </div>
                <p>Status Pesanan : <?php echo htmlspecialchars($pesanan_item['status']) ?></p>
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
  </body>
</html>

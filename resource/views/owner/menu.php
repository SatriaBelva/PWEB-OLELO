<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Riwayat Pesanan</title>
    <link rel="stylesheet" href="resource/views/css/style-owner.css" />
    <link rel="stylesheet" href="/sidebar/style.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
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
          <a href=" <?=urlpath('menu-owner')?> ">
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
        <header>
          <h1>Daftar Menu OLELO</h1>
          <a href=" <?=urlpath('tambahmenu-owner')?>">
            <button id="tambah-menu-btn">Tambah Menu</button>
          </a>
        </header>
        
        <table class="menu-table">
          <thead>
            <tr>
              <th>ID_Menu</th>
              <th>Nama Menu</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Stok</th>
              <th>Kategori</th>
              <th>Gambar</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($menus as $row) : ?>
              <tr>
                  <td>  <?php echo htmlspecialchars($row['Id_menu']) ?> </td>
                  <td>  <?php echo htmlspecialchars($row['nama'])?></td>
                  <td>Rp<?php echo htmlspecialchars($row['harga'])?></td>
                  <td>  <?php echo htmlspecialchars($row['Deskripsi'])?></td>
                  <td>  <?php echo htmlspecialchars($row['Jumlah_stok'])?></td>
                  <td>  <?php echo htmlspecialchars($row['kategori'])?></td>
                  <td>
                    <img style="width: 100px; height: auto" src="uploads_dir/<?php echo $row['Gambar']?>" alt="">
                  </td>
                  <td>    
                      <a href="<?= urlpath('editmenu-owner')?>"><i class='fas fa-edit'></i></a>
                      <!-- <a href=""><i class='fas fa-trash-alt'></i></a> -->
                  </td>
              </tr>   
            <?php endforeach; ?>        
          </tbody>
        </table>
    </section>
    <script>
      let tambahMenuBtn = document.getElementById("tambah-menu-btn");
      tambahMenuBtn.addEventListener("click", function () {
        window.location.href = "/menu/add-menu.html";
      });
    </script>
    <script src="/sidebar/script.js"></script>
</body>
</html>

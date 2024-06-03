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
</head>
<body>
    <div class="sidebar">
      <div class="logo-details">
        <div class="logo_name">OLELO</div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <ul class="nav-list">
        <li>
          <a href="menu.html">
            <i class="bx bx-compass"></i>
            <div class="links_name">Menu</div>
          </a>
        </li>
        <li>
          <a href="pesanan.html">
            <i class="bx bx-cart-alt"></i>
            <div class="links_name">Pesanan</div>
          </a>
        </li>
        <li>
          <a href="riwayat.html">
            <i class="bx bx-bar-chart-alt-2 icon"></i>
            <div class="links_name">Riwayat Pesanan</div>
          </a>
        </li>
        <li>
          <a href="laporan.html">
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
          <h1>Daftar Menu OLELO</h1>
          <button id="tambah-menu-btn">Tambah Menu</button>
        </header>
        
        <table class="menu-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Menu</th>
              <th>Gambar</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Stok</th>
              <th>Kategori</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2</td>
              <td>Es Teh Manis</td>
              <td><img src="es-teh-manis.jpg" alt="Es Teh Manis" width="100" /></td>
              <td>$1.99</td>
              <td>Teh manis dingin yang menyegarkan.</td>
              <td>20</td>
              <td>Minuman</td>
              <td>
                <a href="edit.php?id=2"><i class="fas fa-edit"></i></a>
                <a href="delete.php?id=2"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
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

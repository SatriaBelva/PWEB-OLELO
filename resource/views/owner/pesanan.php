<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Toko Oleh-Oleh Madurasa</title>
    <link rel="stylesheet" href="resource/views/css/style-owner.css">
    <link rel="stylesheet" href="/sidebar/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
            <header class="order-list">
                <h2>Daftar Pesanan Baru</h2>
                <div class="order">
                    <div class="order-header">
                        <span>#08098</span>
                        <span>20/05/2024 12.20</span>
                    </div>
                    <div class="order-items">
                        <div class="order-item">
                            <img src="dodol-tape.png" alt="Dodol Tape">
                            <div class="item-details">
                                <p>Dodol Tape</p>
                                <p>Rp. 35.000 x2</p>
                            </div>
                        </div>
                        <div class="order-item">
                            <img src="pia-tape.png" alt="Pia Tape">
                            <div class="item-details">
                                <p>Pia Tape</p>
                                <p>Rp. 35.000 x2</p>
                            </div>
                        </div>
                        <div class="order-item">
                            <img src="pia-tape.png" alt="Pia Tape">
                            <div class="item-details">
                                <p>Pia Tape</p>
                                <p>Rp. 35.000 x2</p>
                            </div>
                        </div>
                    </div>
                    <div class="order-footer">
                        <p>Total Pembayaran: Rp 152.000</p>
                        <button class="confirm" onclick="changeColor(this)">Confirm</button>
                        <button class="reject" onclick="changeColor(this)">Reject</button>
                    </div>
                </div>
               
              </header>
        </div>
            
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

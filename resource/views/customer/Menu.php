<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Oleh-Oleh Madurasa</title>
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
    
        <main class="content">
            <header class="header">
                <h1>Toko Oleh-Oleh Madurasa</h1>
                <p>Sunday, June 20 2021</p>
                <h2>Pilih Menu</h2>
                <div style="display: flex; justify-content: center;">
                    <div class="tabs">
                        <a href="tab active" class="tab active">Semua</a>
                        <a href="V_JajananBasah.html" class="tab">Jajanan Basah</a>
                        <a href="V_JajananKering.html" class="tab">Jajanan Kering</a>
                    </div>
                </div>
            </header>
            <section class="menu-items">
                <div class="menu-item">
                    <img src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/akurat/gallery/2021/10/big/gal_615e9a208197b3-16279292-41158991.jpg" alt="Prol Tape">
                    <h2>Prol Tape</h2>
                    <p>Rp. 50.000</p>
                    <p2>Memiliki bahan dasar tape yang diolah menggunakan paduan tepung maizena dengan toping keju mozarela</p2>
                </div>
                <div class="menu-item">
                    <img src="https://carica.id/wp-content/uploads/2022/01/JenangWaluh-200x135.jpg" alt="Jenang Waloh">
                    <h2>Jenang Waloh</h2>
                    <p>Rp. 30.000</p>
                    <p2>Labu kuning yang memiliki khasiat tinggi dan rendah kalori diolah dalam bentuk labu</p2>
                </div>
                <div class="menu-item">
                    <img src="https://salsawisata.com/wp-content/uploads/2023/03/Edamame.jpg" alt="Jenang Waloh">
                    <h2>Edamame</h2>
                    <p>Rp. 25.000</p>
                    <p2>Dibuat dengan edamame pilihan yang disangrai dan diolah menggunaakn bumbu rempah-rempah</p2>
                </div>
                <div class="menu-item">
                    <img src="https://salsawisata.com/wp-content/uploads/2023/03/Olahan-Kopi-dan-Kakao.jpg" alt="Jenang Waloh">
                    <h2>Brownis Kopi</h2>
                    <p>Rp. 60.000</p>
                    <p2>Brownis spesial dengan ciri khas kopi rengganis jember yang memiliki kadar manis pas dan nagih</p2>
                </div>
                <div class="menu-item">
                    <img src="https://scontent.fbwx2-1.fna.fbcdn.net/v/t1.6435-9/88096514_852171608543232_2955276677510332416_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=LhiG7hLwe8gQ7kNvgFm2tdW&_nc_ht=scontent.fbwx2-1.fna&oh=00_AYCYvfLvl09gQ5a-ZrPCXl7aZxyMrmA_jobLgajWa1bIvA&oe=66712FA5" alt="Jenang Waloh">
                    <h2>Pia Edamame</h2>
                    <p>Rp. 45.000</p>
                    <p2>Perpaduan edamame dengan tepung pilihan yang diolah menjadi pia bercita rasa khas dengan beberapa toping</p2>
                </div>
                <div class="menu-item">
                    <img src="https://salsawisata.com/wp-content/uploads/2023/03/Pia-Tape.jpg" alt="Jenang Waloh">
                    <h2>Pia Tape</h2>
                    <p>Rp. 20.000</p>
                    <p2>kreasi kuliner yang menawarkan sensasi rasa yang luar biasa dalam setiap gigitannya dengan bahan dasar adonan pastry yang tipis dan lembut</p2>
                </div>
                <div class="menu-item">
                    <img src="https://salsawisata.com/wp-content/uploads/2023/03/Brownies-Tape.jpg" alt="Jenang Waloh">
                    <h2>Coklat D'Jember</h2>
                    <p>Rp. 50.000</p>
                    <p2>Cokelat D'Jember, perwujudan kemewahan rasa yang dihasilkan dari biji kakao pilihan. Dibuat dengan cinta dan keahlian tinggi dengan berbagai variasi rasa pilihan</p2>
                </div>
                <div class="menu-item">
                    <img src="https://salsawisata.com/wp-content/uploads/2023/03/Suwar-Suwir.jpg" alt="Jenang Waloh">
                    <h2>Suwar-suwir</h2>
                    <p>Rp. 32.000</p>
                    <p2>Olahan tape yang diproses menjadi camilan dengan cita rasa khas </p2>
                </div>
            </section>
        </main>
        <section class="order-summary">
            <h2>Membuat Pesanan</h2>
            <div class="order-list">
                <p>Prol Tape</p>
                <input type="number" value="2">
                <p>Rp. 70.000</p>
            </div>
            <div class="order-list">
                <p>Pia Tape</p>
                <input type="number" value="2">
                <p>Rp. 70.000</p>
            </div>
            <div class="order-list">
                <p>Dodol Tape</p>
                <input type="number" value="1">
                <p>Rp. 12.000</p>
            </div>
            <div class="total">
                <p>Total Menu: 5</p>
                <p>Subtotal untuk Produk: Rp. 152.000</p>
                <p>Total Pembayaran: Rp. 152.000</p>
            </div>
            <button class="order-button">Pesan</button>
            <button class="cancel-button">Batal</button>
        </section>
        <!-- <section class="order-summary">
            <h2>Membuat Pesanan</h2>
            <div class="order-details">
                <h3>Menu di pesan</h3>
                <ul id="order-list"></ul>
                <div class="total">
                    <p>Total Menu: <span id="total-menu">0</span></p>
                    <p>Subtotal Untuk Produk: Rp. <span id="subtotal">0</span></p>
                    <p>Total Pembayaran: Rp. <span id="total-payment">0</span></p>
                </div>
            </div>
            <button class="order-button">Pesan</button>
            <button class="cancel-button">Batal</button>
        </section> -->
    </div>
    <script src="/sidebar/script.js"></script>
    <script src="/Costumer/script.js"></script>
</body>
</html>

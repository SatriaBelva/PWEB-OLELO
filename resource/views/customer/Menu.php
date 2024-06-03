<?php
// Koneksi ke database
require_once 'app/config/env.php';

$host     = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$database = $_ENV['DB_NAME'];

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel menu
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

// Menyimpan hasil query ke dalam array
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Oleh-Oleh Madurasa</title>
    <link rel="stylesheet" href="resource/views/css/styles-customer.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
    .menu-item:hover {
        background-color: lightgray;
        cursor: pointer;
    }

    .menu-item:active {
        transform: scale(0.95); /* Efek scaling ketika menu di-klik */
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
                <!-- <div style="display: flex; justify-content: center;">
                    <div class="tabs">
                        <a href="tab active" class="tab active">Semua</a>
                        <a href="V_JajananBasah.html" class="tab">Jajanan Basah</a>
                        <a href="V_JajananKering.html" class="tab">Jajanan Kering</a>
                    </div>
                </div> -->
            </header>
            <section class="menu-items">
                <?php foreach ($data as $row): ?>
                <div class="menu-item" style="text-align:left;">
                    <h2> <?php echo htmlspecialchars($row['nama'])?> </h2>
                    <p>Rp<?php echo htmlspecialchars($row['harga'])?></p>
                    <p2> <?php echo htmlspecialchars($row['kategori'])?></p2>
                </div>
                <?php endforeach; ?>
            </section>
        </main>
            <section class="order-summary" style="display:none;"> <!-- Menambahkan inline style untuk menyembunyikan order-summary -->
                <h2>Membuat Pesanan</h2>
                <div class="order-list">
                </div>
                <div class="total">
                    <p>Total Menu: 0</p>
                    <p>Subtotal untuk Produk: Rp. 0</p>
                    <p>Total Pembayaran: Rp. 0</p>
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
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var menuItems = document.querySelectorAll('.menu-item');
        var orderList = document.querySelector('.order-list');
        var cancelButton = document.querySelector('.cancel-button');
        var orderSummary = document.querySelector('.order-summary'); // Menambahkan variabel untuk elemen order-summary

        menuItems.forEach(function (menuItem) {
            menuItem.addEventListener('click', function () {
                var itemName = menuItem.querySelector('h2').innerText;
                var itemPrice = menuItem.querySelector('p').innerText;
                var newItem = document.createElement('div');
                newItem.innerHTML = '<p>' + itemName + '</p>' +
                    '<input type="number" value="1" onchange="updateTotal(this, ' + itemPrice.slice(3) + ')">' + // Memanggil fungsi updateTotal saat jumlah barang diubah
                    '<p id="price-per-pcs">' + itemPrice + '</p>'; // Menambahkan id untuk memperbarui harga per pcs
                orderList.appendChild(newItem);
                orderSummary.style.display = 'block'; // Menampilkan order-summary setelah pengguna memilih menu
            });
        });

        cancelButton.addEventListener('click', function () {
            orderList.innerHTML = ''; // Menghapus semua elemen dalam bagian pemesanan
            orderSummary.style.display = 'none'; // Menyembunyikan order-summary saat pembatalan
        });
    });

    function updateTotal(input, hargaPerPcs) {
        var qty = input.value;
        var totalPrice = qty * hargaPerPcs;
        var pricePerPcs = input.parentElement.querySelector('#price-per-pcs'); // Mendapatkan elemen harga per pcs
        pricePerPcs.innerText = 'Rp' + hargaPerPcs.toFixed(2) + '/pcs'; // Memperbarui teks harga per pcs
        input.parentElement.querySelector('p:last-child').innerText = 'Rp' + totalPrice.toFixed(2); // Memperbarui teks total harga
    }
    </script>
</body>
</html>

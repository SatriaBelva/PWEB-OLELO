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
        .order-list div {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            padding: 5px 0;
        }
        .order-list p {
            margin: 0;
        }
        .order-list input[type="number"] {
            width: 50px;
            margin-left: 10px;
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
    
        <main class="content">
            <header class="header">
                <h1>Toko Oleh-Oleh Madurasa</h1>
                <p>Sunday, June 20 2021</p>
                <h2>Pilih Menu</h2>
            </header>
            <section class="menu-items">
                <?php foreach ($menus as $menus): ?>
                <div class="menu-item" style="text-align:left;" data-nama="<?php echo htmlspecialchars($menus['nama']); ?>" data-harga="<?php echo htmlspecialchars($menus['harga']); ?>" data-kategori="<?php echo htmlspecialchars($menus['kategori']); ?>" data-id = "<?php echo htmlspecialchars($menus['Id_menu'])?>">
                    <h2> <?php echo htmlspecialchars($menus['nama'])?> </h2>
                    <p>Rp<?php echo htmlspecialchars($menus['harga'])?>/pcs</p>
                    <p> <?php echo htmlspecialchars($menus['kategori'])?></p>
                </div>
                <?php endforeach; ?>
            </section>
        </main>
        <section class="order-summary">
            <h2>Membuat Pesanan</h2>
            <form id="order-form" action="<?=urlpath('order')?>" method="POST">
                <div class="order-list">
                    <!-- Pesanan akan ditampilkan di sini -->
                </div>
                <div class="total">
                    <p>Total Menu: <span id="total-menu">0</span></p>
                    <p>Total Pembayaran: Rp. <span id="total-payment">0</span></p>
                </div>
                <button type="submit" class="order-button">Pesan</button>
            </form>
            <button class="cancel-button">Batal</button>
        </section>
    </div>

    <script src="/sidebar/script.js"></script>
    <script src="/Costumer/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var menuItems = document.querySelectorAll('.menu-item');
            var orderList = document.querySelector('.order-list');
            var totalMenuElement = document.getElementById('total-menu');
            var totalPaymentElement = document.getElementById('total-payment');
            var orderForm = document.getElementById('order-form');
            var orderArray = []; // Array to store the orders

            menuItems.forEach(function (menuItem) {
                menuItem.addEventListener('click', function () {
                    var itemId = menuItem.getAttribute('data-id')
                    var itemName = menuItem.getAttribute('data-nama');
                    var itemPrice = parseFloat(menuItem.getAttribute('data-harga'));
                    var itemCategory = menuItem.getAttribute('data-kategori');
                    var itemQuantity = 1; // Default quantity 1

                    orderArray.push({
                        id: itemId,
                        name: itemName,
                        price: itemPrice,
                        category: itemCategory,
                        quantity: itemQuantity
                    });

                    var newItem = document.createElement('div');
                    newItem.innerHTML = `<p>${itemName} - Rp${itemPrice} (${itemCategory}) 
                                        <input type="number" name="quantity[]" value="${itemQuantity}" min="1" data-name="${itemName}" class="quantity-input" style="color: red;"></p>`;
                    orderList.appendChild(newItem);

                    updateSummary();

                    document.querySelector('.order-summary').style.display = 'block';
                });
            });
            document.querySelector('.cancel-button').addEventListener('click', function () {
                orderList.innerHTML = ''; // Clear order list
                orderArray = []; // Reset order array
                updateSummary(); // Reset summary
                document.querySelector('.order-summary').style.display = 'none'; // Hide order-summary
            });

            function updateSummary() {
                var totalMenu = orderArray.length;
                var totalPayment = orderArray.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                
                totalMenuElement.textContent = totalMenu;
                totalPaymentElement.textContent = `Rp${totalPayment}`;
            }
            orderList.addEventListener('input', function (event) {
                if (event.target.classList.contains('quantity-input')) {
                    var itemName = event.target.getAttribute('data-name');
                    var newQuantity = parseInt(event.target.value);

                    // Update the quantity in the order array
                    orderArray.forEach(item => {
                        if (item.name === itemName) {
                            item.quantity = newQuantity;
                        }
                    });
                    updateSummary();
                }
            });

            orderForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent default form submission

                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'orderData';
                input.value = JSON.stringify(orderArray);
                orderForm.appendChild(input);

                // Use FormData to handle form submission
                var formData = new FormData(orderForm);
                $.ajax({
                    url: '<?= urlpath('order')?>', // Specify your server URL here
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success === true) {
                            alert('Order placed successfully!');
                            resetForm();
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('Please ensure all fields are filled out correctly!');
                    }
                });
            });

            function resetForm() {
                orderForm.reset();
            }
        });

        // document.addEventListener('DOMContentLoaded', function () {
        //     var menuItems = document.querySelectorAll('.menu-item');
        //     var orderList = document.querySelector('.order-list');
        //     var totalMenuElement = document.getElementById('total-menu');
        //     var totalPaymentElement = document.getElementById('total-payment');
        //     var orderForm = document.getElementById('order-form');
        //     var orderArray = []; // Array untuk menyimpan pesanan

        //     menuItems.forEach(function (menuItem) {
        //         menuItem.addEventListener('click', function () {
        //             var itemName = menuItem.getAttribute('data-nama');
        //             var itemPrice = menuItem.getAttribute('data-harga');
        //             var itemKategori = menuItem.getAttribute('data-kategori');
        //             var itemJumlah = 1; // Default jumlah 1

        //             // Menambahkan item ke array pesanan
        //             orderArray.push({
        //                 nama: itemName,
        //                 harga: itemPrice,
        //                 kategori: itemKategori,
        //                 jumlah: itemJumlah
        //             });

        //             // Menambahkan item ke daftar tampilan
        //             var newItem = document.createElement('div');
        //             newItem.innerHTML = '<p>' + itemName + ' - Rp' + itemPrice + ' (' + itemKategori + ') ' + 
        //                                 '<input type="number" name="jumlah[]" value="' + itemJumlah + '" min="1" data-nama="' + itemName + '" class="jumlah-input">' + 
        //                                 '</p>';
        //             orderList.appendChild(newItem);

        //             // Mengupdate total menu dan total pembayaran
        //             updateSummary();

        //             document.querySelector('.order-summary').style.display = 'block';
        //         });
        //     });

        //     // Event listener for cancel button
        //     document.querySelector('.cancel-button').addEventListener('click', function () {
        //         orderList.innerHTML = ''; // Clear order list
        //         orderArray = []; // Reset array pesanan
        //         updateSummary(); // Reset summary
        //         document.querySelector('.order-summary').style.display = 'none'; // Hide order-summary
        //     });

        //     // Fungsi untuk mengupdate total menu dan total pembayaran
        //     function updateSummary() {
        //         var totalMenu = orderArray.length;
        //         var totalPayment = orderArray.reduce((sum, item) => sum + (item.harga * item.jumlah), 0);
                
        //         totalMenuElement.textContent = totalMenu;
        //         totalPaymentElement.textContent = totalPayment;
        //     }

        //     // Mengupdate jumlah item dalam array pesanan saat input jumlah diubah
        //     orderList.addEventListener('input', function(event) {
        //         if (event.target.classList.contains('jumlah-input')) {
        //             var itemName = event.target.getAttribute('data-nama');
        //             var newJumlah = parseInt(event.target.value);

        //             // Update jumlah dalam array pesanan
        //             orderArray.forEach(item => {
        //                 if (item.nama === itemName) {
        //                     item.jumlah = newJumlah;
        //                 }
        //             });
        //             // Update total
        //             updateSummary();
        //         }
        //     });

        //     // Menambahkan array pesanan ke form saat submit
        //     orderForm.addEventListener('submit', function () {
        //         var input = document.createElement('input');
        //         input.type = 'hidden';
        //         input.name = 'orderData';
        //         input.value = JSON.stringify(orderArray);
        //         orderForm.appendChild(input);

        //         $.ajax({
        //           url:,
        //           method: 'post',
        //           data: orderForm,
        //           dataType: 'json',
        //           async: true,
        //           processData: false,
        //           contentType: false,
        //           success: function(response) {
        //             if (response.success) {
        //                     alert('Pesanan berhasil ditambahkan!');
        //                     handleClearButtonClick();
        //                     resetForm();
        //                 } else {
        //                     alert('Terjadi kesalahan: ' + response.message);
        //                 }
        //             },
        //             error: function(xhr, status, error) {
        //                 alert('Pastikan semua kolom sudah terisi!');
        //             }
        //         });
        //     });
        // })
    </script>
</body>
</html>


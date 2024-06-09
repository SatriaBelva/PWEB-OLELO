<?php

include_once('C:/PWEB/olelo/models/user.php');
include_once('C:/PWEB/olelo/models/customer.php');
include_once 'function/main.php';
include_once 'app/config/static.php';

class CustomerController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if($user_role == '3'){
            view('customer/menu', ['url' => 'menu', 'menus' => menu::getAllMenu($_SESSION['user'])]);
        }
        // else{
        //     header('location: restricted');
        // }
    }
    public static function pesanan() {
        if (isset($_SESSION['user']['user']['Id_customer'])) {
            $id = $_SESSION['user']['user']['Id_customer'];
            $pesanan = Pesanan::pesananCustomerbyID($id);
            $all_detail_pesanan = [];

            foreach ($pesanan as $p) {
                $id_transaksi = $p['id_transaksi'];
                $details = Pesanan::getAllDetailPesanan($id_transaksi);
                $all_detail_pesanan[$id_transaksi] = $details;
            }

            view('customer/pesanan', ['pesanan' => $pesanan, 'all_detail_pesanan' => $all_detail_pesanan]);
        } else {
            echo "Id_customer tidak ditemukan dalam session.";
        }
    }
    static function riwayatcustomer(){
        view('customer/riwayatcustomer');
    }

    static function ordercustomer(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $items = isset($_POST['items']) ? $_POST['items'] : [];
        $totalMenu = isset($_POST['totalMenu']) ? $_POST['totalMenu'] : 0;
        $totalPayment = isset($_POST['totalPayment']) ? $_POST['totalPayment'] : 0;

        // Instantiate OrderModel
        $orderModel = new OrderModel();

        // Loop through items and prepare data
        $orderData = [];
        foreach ($items as $item) {
            list($name, $price) = explode('|', $item);
            $orderData[] = ['name' => $name, 'price' => $price];
        }

        // Save order to database
        $orderModel->saveOrder($orderData, $totalMenu, $totalPayment);

        // Clear the session order data
        unset($_SESSION['order']);

        // Redirect to a success page
        header('Location: menu');
        exit;
        }
    }
}
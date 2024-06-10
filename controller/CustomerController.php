<?php

include_once 'models/user.php';
include_once 'models/customer.php';
include_once 'function/main.php';
include_once 'app/config/static.php';

class CustomerController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if($user_role == '3'){
            view('customer/menu', ['url' => 'menu', 'menus' => menu::getAllMenu($_SESSION['user'])]);
        }
        else{
            header('Location:'.BASEURL.'menu-karyawan');
        }
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['orderData'])) {
                $orderData = $_POST['orderData'];
    
                $Tanggal = date("Y-m-d H:i:s");
                $idCustomer = $_SESSION['user']['user']['Id_customer'];
                $orders = json_decode($orderData);
                $transactionData = array(
                    'Tanggal' => $Tanggal,
                    'customer_id_customer' => $idCustomer, 
                    'menu_id_menu' => array(), 
                    'jumlah' => array()
                );
        
                foreach ($orders as $order) {
                    $transactionData['menu_id_menu'][] = $order->id;
                    $transactionData['jumlah'][] = $order->quantity;
                }
        
                try {
                    $lastInsertedTransactionId = Pesanan::insertNewTransaction($transactionData);
                    
                    echo json_encode(array("success" => true, "message" => "Order processed successfully. Transaction ID: " . $lastInsertedTransactionId));
                    exit(); // Stop further execution
                } catch (Exception $e) {
                    echo json_encode(array("success" => false, "message" => "Error: " . $e->getMessage()));
                    exit(); // Stop further execution
                }
            } else {
                echo json_encode(array("success" => false, "message" => "Order data is missing"));
                exit(); // Stop further execution
            }
        } else {
            echo json_encode(array("success" => false, "message" => "Invalid request method"));
            exit(); // Stop further execution
        }        
        // Check if the form is submitted
    }
}
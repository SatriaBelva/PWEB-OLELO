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
            view('customer/menu', ['url' => 'menu']);
        }
        // else{
        //     header('location: restricted');
        // }
    }
    static function pesanan(){
        view('customer/pesanan');
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
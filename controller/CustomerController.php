<?php

include_once('C:/PWEB/olelo/models/user.php');
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
}
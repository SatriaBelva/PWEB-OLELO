<?php

include_once('C:/PWEB/olelo/models/user.php');
include_once 'function/main.php';
include_once 'app/config/static.php';

class OwnerController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if ($user_role == '1'){
            view('owner/menu', ['url' => 'menu']);
        }
        // else{
        //     header('location: restricted');
        // }
    }

    static function pesanan(){
        view('owner/pesanan');
    }
    static function riwayat(){
        view('owner/riwayat');
    }
    static function tambahmenu(){
        view('owner/add_menu');
    }
    static function laporan(){
        view('owner/laporan');
    }
}
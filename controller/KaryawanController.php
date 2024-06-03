<?php

include_once('C:/PWEB/olelo/models/user.php');
include_once 'function/main.php';
include_once 'app/config/static.php';

class KaryawanController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if ($user_role == '2'){
            view('karyawan/menu', ['url' => 'menu']);
        }
        // else{
        //     header('location: restricted');
        // }
    }

    static function pesanan(){
        view('karyawan/pesanan');
    }
    static function riwayat(){
        view('karyawan/riwayat');
    }
    static function tambahmenu(){
        view('karyawan/add_menu');
    }
    static function laporan(){
        view('karyawan/laporan');
    }
}
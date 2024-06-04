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

    static function addMenuOwner() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $kategori = $_POST['kategori'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $Jumlah_stok = $_POST['Jumlah_stok'];
            
            
            // Simpan data ke database menggunakan model
            if (Menu::saveMenu($nama, $deskripsi, $Jumlah_stok, $harga, $kategori)) {
                echo "Data berhasil disimpan.";
            } else {
                echo "Data gagal disimpan.";
            }
            
            // Redirect ke halaman lain setelah menyimpan data
            header('Location: menu-owner');
        } else {
            // Tampilkan form tambah menu jika metode bukan POST
            view('karyawan/add_menu', ['url' => 'menu-karyawan']);
        }
    }
}
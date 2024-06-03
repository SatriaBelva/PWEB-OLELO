<?php

include_once('C:/PWEB/olelo/models/user.php');
include_once('C:/PWEB/olelo/models/menu.php');
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

    static function addMenu() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $kategori = $_POST['kategori'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $Jumlah_stok = $_POST['Jumlah_stok'];
            
            // Handle file upload
            // $gambar = '';
            // if (isset($_FILES['gambar-produk']) && $_FILES['gambar-produk']['error'] === UPLOAD_ERR_OK) {
            //     $gambarDir = 'uploads/';
            //     $gambar = $gambarDir . basename($_FILES['gambar-produk']['name']);
            //     move_uploaded_file($_FILES['gambar-produk']['tmp_name'], $gambar);
            // }

            // var_dump($namaMenu, $kategori, $harga, $deskripsi, $stok);

            // Simpan data ke database menggunakan model
            if (Menu::saveMenu($nama, $deskripsi, $Jumlah_stok, $harga, $kategori)) {
                echo "Data berhasil disimpan.";
            } else {
                echo "Data gagal disimpan.";
            }
            
            // Redirect ke halaman lain setelah menyimpan data
            header('Location: menu-karyawan');
        } else {
            // Tampilkan form tambah menu jika metode bukan POST
            view('karyawan/add_menu', ['url' => 'menu-karyawan']);
        }
    }
    
    public static function listMenus() {
        $menus = Menu::getAllMenus();
        view('karyawan/menu', ['menus' => $menus]);
    }
}
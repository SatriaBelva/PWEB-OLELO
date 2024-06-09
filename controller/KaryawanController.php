<?php

include_once 'models/user.php';
include_once 'models/menu.php';
include_once 'function/main.php';
include_once 'app/config/static.php';

class KaryawanController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if ($user_role == '2'){
            view('karyawan/menu', ['url' => 'menu', 'menus' => menu::getAllMenu($_SESSION['user'])]);
        }
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
    static function editMenu() {
        $menu = Menu::getMenuById();
        if ($menu) {
            view('karyawan/edit_menu', ['menu' => $menu]);
        } else {
            // Tampilkan pesan jika menu tidak ditemukan
            echo "Menu tidak ditemukan.";
        }
    }

     static function saveEdit() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            $post = array_map('htmlspecialchars', $_POST);
            $contact = Contact::update([
                'id' => $_GET['id'],
                'phone_number' => $post['phone_number'],
                'owner' => $post['owner'],
                'city_fk' => $post['city']
            ]);
            if ($contact) {
                header('Location: '.BASEURL.'dashboard/contacts');
            }
            else {
                header('Location: '.BASEURL.'contacts/edit?id='.$_GET['id'].'&editFailed=true');
            }
        }
    }

    static function addMenu() {
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
            header('Location: menu-karyawan');
        } else {
            // Tampilkan form tambah menu jika metode bukan POST
            view('karyawan/add_menu', ['url' => 'menu-karyawan']);
        }
    }

    // static function getAllMenu()
    // {
    //     if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
    //         header('Location: ' . BASEURL . 'login?auth=false');
    //         exit;
    //     } else {
    //         // Ambil data akun pemerintah dari model
    //         $proposals = menu::getAllMenu($_SESSION['user']['id']);
    //         view('karyawan/menu', [
    //             'url' => 'proposal',
    //             'menu' => $menu,
    //         ]);
    //     }
    // }
    static function show(){
        view('karyawan/menu', ['url' => 'menu-karyawan', 'menus' => menu::getAllMenu($_SESSION['user'])]);
    }
}






















// Handle file upload
// $gambar = '';
// if (isset($_FILES['gambar-produk']) && $_FILES['gambar-produk']['error'] === UPLOAD_ERR_OK) {
//     $gambarDir = 'uploads/';
//     $gambar = $gambarDir . basename($_FILES['gambar-produk']['name']);
//     move_uploaded_file($_FILES['gambar-produk']['tmp_name'], $gambar);
// }

// var_dump($namaMenu, $kategori, $harga, $deskripsi, $stok);
<?php

include_once 'models/user.php';
include_once 'models/pesanan.php';
include_once 'models/karyawan.php';
include_once 'function/main.php';
include_once 'app/config/static.php';

class OwnerController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if ($user_role == '1'){
            view('owner/menu', ['url' => 'menu', 'menus' => menu::getAllMenu($_SESSION['user'])]);
        }
        // else{
        //     header('location: restricted');
        // }
    }

    static function pesanan() {
        $pesanan = Pesanan::getAllPesanan();
        $all_detail_pesanan = [];
    
        foreach ($pesanan as $p) {
            $details = Pesanan::getAllDetailPesanan($p['id_transaksi']);
            $all_detail_pesanan[$p['id_transaksi']] = $details;
        }
    
        view('owner/pesanan', ['pesanan' => $pesanan, 'all_detail_pesanan' => $all_detail_pesanan]);
    }
    
    static function riwayat(){
        $total           = Pesanan::total();
        $totalPesanan    = Pesanan::totalPesanan();
        $totalTransaksi  = Pesanan::totalTransaksi();
        $detailTransaksi = Pesanan::detailTransaksi();
        view('owner/riwayat', ['total' => $total, 'detailTransaksi' => $detailTransaksi ,'totalPesanan' => $totalPesanan, 'totalTransaksi' => $totalTransaksi]);
    }
    static function tambahmenu(){
        view('owner/add_menu');
    }
    static function laporan(){
        $bestSeller      = Pesanan::bestSeller();
        view('owner/laporan', ['bestSeller' => $bestSeller]);
    }
    static function daftarkaryawan(){
        $getKaryawan     = Pesanan::getKaryawan();
        view('owner/daftarkaryawan', ['getKaryawan' => $getKaryawan]);
    }
    static function editmenu(){
        view('owner/edit_menu');
    }
    static function hapusKaryawan(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
           $id = $_GET['id'];
        }
        $hapusKaryawan = Karyawan::hapusKaryawan($id);
        
        header('Location:'.BASEURL.'daftarkaryawan-owner');
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

    // static function getAllMenu()
    // {
    //     if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'pemerintah') {
    //         header('Location: ' . BASEURL . 'login?auth=false');
    //         exit;
    //     } else {
    //         // Ambil data akun pemerintah dari model
    //         $proposals = menu::getAllMenu($_SESSION['user']['id']);
    //         view('owner/menu', [
    //             'url' => 'proposal',
    //             'menu' => $menu,
    //         ]);
    //     }
    // }
}
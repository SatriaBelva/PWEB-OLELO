<?php

include_once 'models/user.php';
include_once 'models/menu.php';
include_once 'function/main.php';
include_once 'app/config/static.php';

class KaryawanController {
    static function index() {
        $user = $_SESSION[ 'user' ];
        $user_role = $user[ 'role_id' ];
        if ( $user_role == '2' ) {
            view( 'karyawan/menu', [ 'url' => 'menu', 'menus' => menu::getAllMenu( $_SESSION[ 'user' ] ) ] );
        }
    }

    static function pesanan() {
        $pesanan = Pesanan::getAllPesanan();
        $all_detail_pesanan = [];

        foreach ( $pesanan as $p ) {
            $details = Pesanan::getAllDetailPesanan( $p[ 'id_transaksi' ] );
            $all_detail_pesanan[ $p[ 'id_transaksi' ] ] = $details;
        }
        view( 'karyawan/pesanan', [ 'pesanan' => $pesanan, 'all_detail_pesanan' => $all_detail_pesanan ] );
    }
    static function riwayat() {
        $total           = Pesanan::total();
        $totalPesanan    = Pesanan::totalPesanan();
        $totalTransaksi  = Pesanan::totalTransaksi();
        $detailTransaksi = Pesanan::detailTransaksi();
        view( 'karyawan/riwayat', [ 'total' => $total, 'detailTransaksi' => $detailTransaksi, 'totalPesanan' => $totalPesanan, 'totalTransaksi' => $totalTransaksi ] );
    }
    static function tambahmenu() {
        view( 'karyawan/add_menu' );
    }
    static function laporan() {
        $bestSeller      = Pesanan::bestSeller();
        view( 'karyawan/laporan', [ 'bestSeller' => $bestSeller ] );
    }
    static function editMenu() {
        $id          = $_GET[ 'id' ];
        $nama        = $_POST[ 'nama' ];
        $kategori    = $_POST[ 'kategori' ];
        $harga       = $_POST[ 'harga' ];
        $deskripsi   = $_POST[ 'deskripsi' ];
        $Jumlah_stok = $_POST[ 'Jumlah_stok' ];
        $ekstensiGambarValid   = [ 'jpg', 'jpeg', 'heic', 'png' ];
        $ekstensiGambar        = explode( '.', $namaGambar );
        $ekstensiGambar        = strtolower( end( $ekstensiGambar ) );

        $uniqID  = uniqid();
        $newExt = '.jpg';
        $imgFile = $_FILES['gambarProduk'];
        $imgtmpName = $_FILES[ 'gambarProduk' ][ 'tmp_name' ];
        $namaGambarBaru = $uniqID.$newExt;
        $fileDestination = 'uploads_dir/'.$namaGambarBaru;

        if ( move_uploaded_file( $imgtmpName, $fileDestination ) ) {
            // Simpan data ke database menggunakan model
            if ( Menu::updateMenu( $id, $nama, $deskripsi, $Jumlah_stok, $harga, $kategori, $namaGambarBaru)) {
                echo 'Data berhasil disimpan.';
            } else {
                echo 'Data gagal disimpan.';
            }
        }

        $menuUpdate  = Menu::updateMenu( $id, $nama, $deskripsi, $Jumlah_stok, $harga, $kategori, $namaGambarBaru);
        $menus       = Menu::getAllMenu();
        if ( $menuUpdate ) {
            header( 'Location:'.BASEURL.'menu-karyawan' );
        } else {
            // Tampilkan pesan jika menu tidak ditemukan
            echo 'Menu tidak ditemukan.';
        }
    }

    static function saveEdit() {
        if ( !isset( $_SESSION[ 'user' ] ) ) {
            header( 'Location: '.BASEURL.'login?auth=false' );
            exit;
        } else {
            $post = array_map( 'htmlspecialchars', $_POST );
            $contact = Contact::update( [
                'id' => $_GET[ 'id' ],
                'phone_number' => $post[ 'phone_number' ],
                'owner' => $post[ 'owner' ],
                'city_fk' => $post[ 'city' ]
            ] );
            if ( $contact ) {
                header( 'Location: '.BASEURL.'dashboard/contacts' );
            } else {
                header( 'Location: '.BASEURL.'contacts/edit?id='.$_GET[ 'id' ].'&editFailed=true' );
            }
        }
    }

    static function addMenu() {
        if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
            $nama                  = $_POST[ 'nama' ];
            $kategori              = $_POST[ 'kategori' ];
            $harga                 = $_POST[ 'harga' ];
            $deskripsi             = $_POST[ 'deskripsi' ];
            $Jumlah_stok           = $_POST[ 'Jumlah_stok' ];
            $ekstensiGambarValid   = [ 'jpg', 'jpeg', 'heic', 'png' ];
            $ekstensiGambar        = explode( '.', $namaGambar );
            $ekstensiGambar        = strtolower( end( $ekstensiGambar ) );

            $uniqID  = uniqid();
            $newExt = '.jpg';
            $imgFile = $_FILES['gambarProduk'];
            $imgtmpName = $_FILES[ 'gambarProduk' ][ 'tmp_name' ];
            $namaGambarBaru = $uniqID.$newExt;
            $fileDestination = 'uploads_dir/'.$namaGambarBaru;

            if ( move_uploaded_file( $imgtmpName, $fileDestination ) ) {
                // Simpan data ke database menggunakan model
                if ( Menu::saveMenu( $nama, $deskripsi, $Jumlah_stok, $harga, $kategori, $namaGambarBaru ) ) {
                    echo 'Data berhasil disimpan.';
                } else {
                    echo 'Data gagal disimpan.';
                }
            }
            // Redirect ke halaman lain setelah menyimpan data
            header( 'Location: menu-karyawan' );
        } else {
            // Tampilkan form tambah menu jika metode bukan POST
            view( 'karyawan/add_menu', [ 'url' => 'menu-karyawan' ] );
        }
    }

    // static function getAllMenu()
    // {
    //     if ( !isset( $_SESSION[ 'user' ] ) || $_SESSION[ 'user' ][ 'role' ] !== 'pemerintah' ) {
    //         header( 'Location: ' . BASEURL . 'login?auth=false' );
    //         exit;
    //     } else {
    //         // Ambil data akun pemerintah dari model
    //         $proposals = menu::getAllMenu( $_SESSION[ 'user' ][ 'id' ] );
    //         view( 'karyawan/menu', [
    //             'url' => 'proposal',
    //             'menu' => $menu,
    // ] );
    //     }
    // }
    static function show() {
        view( 'karyawan/menu', [ 'url' => 'menu-karyawan', 'menus' => menu::getAllMenu( $_SESSION[ 'user' ] ) ] );
    }

    public static function updateMenu() {
        $id = $_GET[ 'id' ];
        $menu = menu::getMenuById( $id );
        view( 'karyawan/edit_menu', [ 'menu' => $menu ] );
    }
    public static function diterima() {
        $id = $_GET[ 'id' ];
        $status = Pesanan::diterima( $id );
        $pesanan = Pesanan::getAllPesanan();
        $all_detail_pesanan = [];

        foreach ( $pesanan as $p ) {
            $details = Pesanan::getAllDetailPesanan( $p[ 'id_transaksi' ] );
            $all_detail_pesanan[ $p[ 'id_transaksi' ] ] = $details;
        }
        view( 'karyawan/pesanan', [ 'pesanan' => $pesanan, 'all_detail_pesanan' => $all_detail_pesanan ] );
    }
    public static function ditolak() {
        $id = $_GET[ 'id' ];
        $status = Pesanan::ditolak( $id );
        $pesanan = Pesanan::getAllPesanan();
        $all_detail_pesanan = [];

        foreach ( $pesanan as $p ) {
            $details = Pesanan::getAllDetailPesanan( $p[ 'id_transaksi' ] );
            $all_detail_pesanan[ $p[ 'id_transaksi' ] ] = $details;
        }
        view( 'karyawan/pesanan', [ 'pesanan' => $pesanan, 'all_detail_pesanan' => $all_detail_pesanan ] );
    }

}

// Handle file upload
// $gambar = '';
// if ( isset( $_FILES[ 'gambar-produk' ] ) && $_FILES[ 'gambar-produk' ][ 'error' ] === UPLOAD_ERR_OK ) {
//     $gambarDir = 'uploads/';
//     $gambar = $gambarDir . basename( $_FILES[ 'gambar-produk' ][ 'name' ] );
//     move_uploaded_file( $_FILES[ 'gambar-produk' ][ 'tmp_name' ], $gambar );
// }

// var_dump( $namaMenu, $kategori, $harga, $deskripsi, $stok );
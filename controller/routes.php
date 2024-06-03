<?php

include_once 'function/main.php';
include_once 'app/config/static.php';
include_once 'controller/main.php';

Router::url('index', 'get', 'AuthController::index');
Router::url('restricted', 'get', 'AuthController::restricted');

//auth
Router::url('login', 'get', 'AuthController::login');
Router::url('login', 'post', 'AuthController::sessionLogin');
Router::url('register', 'get', 'AuthController::register');
Router::url('register', 'post', 'AuthController::newRegister');
Router::url('logout', 'get', 'AuthController::logout');

//dashboard Owner
Router::url('menu-owner', 'get', 'OwnerController::index');
Router::url('pesanan-owner', 'get', 'OwnerController::pesanan');
Router::url('riwayat-owner', 'get', 'OwnerController::riwayat');
Router::url('tambahmenu-owner', 'get', 'OwnerController::tambahmenu');
Router::url('laporan-owner', 'get', 'OwnerController::laporan');

//dashboard Karyawan
Router::url('menu-karyawan', 'get', 'KaryawanController::index');
Router::url('pesanan-karyawan', 'get', 'KaryawanController::pesanan');
Router::url('riwayat-karyawan', 'get', 'KaryawanController::riwayat');
Router::url('tambahmenu-karyawan', 'get', 'KaryawanController::tambahmenu');
Router::url('laporan-karyawan', 'get', 'KaryawanController::laporan');
Router::url('tambahmenu-karyawan', 'post', 'KaryawanController::addMenu');
Router::url('tambahmenu-karyawan', 'get', 'KaryawanController::addMenu');


// dashboard Customer
Router::url('menu', 'get', 'CustomerController::index');
Router::url('pesanan', 'get', 'CustomerController::pesanan');
Router::url('riwayatcustomer', 'get', 'CustomerController::riwayatcustomer');

Router::url('/', 'get', function () {
    header('Location: index');
});

// new Router();
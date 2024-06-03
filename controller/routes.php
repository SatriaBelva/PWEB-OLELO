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
Router::url('menu', 'get', 'OwnerController::index');

//dashboard Karyawan
Router::url('menu', 'get', 'KaryawanController::index');

// dashboard Customer
Router::url('menu', 'get', 'CustomerController::index');
Router::url('pesanan', 'get', 'CustomerController::pesanan');
Router::url('riwayatcustomer', 'get', 'CustomerController::riwayatcustomer');

Router::url('/', 'get', function () {
    header('Location: index');
});

// new Router();
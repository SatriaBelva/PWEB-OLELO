<?php

class Pesanan {
    // Mengambil semua pesanan
    public static function getAllPesanan() {
        global $conn;
        $sql = "SELECT t.id_transaksi, t.Tanggal, c.nama, t.Status 
                FROM transaksi t 
                JOIN customer c ON (t.customer_id_customer = c.id_customer)";

        $result = $conn->query($sql);
        $arr = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    // Mengambil detail pesanan berdasarkan id_transaksi
    public static function getAllDetailPesanan($id_transaksi) {
        global $conn;
        $sql = "SELECT m.nama, m.harga, dt.Jumlah, m.harga * dt.Jumlah as sub_total
                FROM detail_transaksi dt 
                JOIN menu m ON m.Id_menu = dt.menu_id_menu
                WHERE dt.transaksi_id_transaksi = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_transaksi);
        $stmt->execute();
        $result = $stmt->get_result();
        $arr = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public static function total(){
        global $conn;
        $sql = "SELECT SUM(dt.Jumlah*m.harga) as total FROM detail_transaksi dt JOIN menu m ON (dt.menu_id_menu = m.Id_menu)";

        $result = $conn->query($sql);
        $arr = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }
    public static function totalPesanan(){
        global $conn;
        $sql = "SELECT SUM(Jumlah) as totalPesanan FROM detail_transaksi";

        $result = $conn->query($sql);
        $arr = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }
    public static function totalTransaksi(){
        global $conn;
        $sql = "SELECT COUNT(id_transaksi) as totalTransaksi FROM transaksi";

        $result = $conn->query($sql);
        $arr = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }
    public static function detailTransaksi(){
        global $conn;
        $sql = 
        "SELECT t.id_transaksi as id, c.nama as nama, COUNT(dt.menu_id_menu) AS jumlah_menu_dipesan, SUM(dt.Jumlah * m.harga) AS total_harga, GROUP_CONCAT(m.nama SEPARATOR ', ') AS daftar_menu
        FROM transaksi t
        JOIN customer c ON c.Id_customer = t.customer_id_customer
        JOIN detail_transaksi dt ON dt.transaksi_id_transaksi = t.id_transaksi
        JOIN menu m ON dt.menu_id_menu = m.Id_menu
        GROUP BY t.id_transaksi, c.nama";


        $result = $conn->query($sql);
        $arr = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }
    public static function bestSeller(){
        global $conn;
        $sql = 
        "SELECT m.nama as nama, SUM(dt.Jumlah) as jumlah
        FROM menu m
        JOIN detail_transaksi dt ON (dt.menu_id_menu = m.Id_menu)
        GROUP BY m.nama ORDER BY jumlah DESC";

        $result = $conn->query($sql);
        $arr = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public static function pesananCustomerbyID($id) {
        global $conn;
        $sql = "SELECT c.nama, t.id_transaksi, t.Tanggal, t.status
                FROM customer c
                JOIN transaksi t ON t.customer_id_customer = c.Id_customer
                WHERE c.Id_customer = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan semua hasil sebagai array asosiatif
    }

    public static function getKaryawan(){
        global $conn;
        $sql = 
        "SELECT * FROM karyawan";

        $result = $conn->query($sql);
        $arr = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public static function insertNewTransaction($data=[]){
        global $conn;
        
        $conn->begin_transaction();
        
        try {
            $status = 'Diproses';
            $sql = 'INSERT INTO transaksi (Tanggal, customer_id_customer, status) VALUES (?, ?, ?)';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sis', $data['Tanggal'], $data['customer_id_customer'],  $status);
            $stmt->execute();
            $last_id = $conn->insert_id;
            
            $sql = 'INSERT INTO detail_transaksi (transaksi_id_transaksi, menu_id_menu, Jumlah) VALUES (?, ?, ?)';
            $stmt = $conn->prepare($sql);
            
            foreach ($data['menu_id_menu'] as $key => $menu) {
                $menu_id = $menu;
                $jumlah = $data['jumlah'][$key];
                $stmt->bind_param('iii', $last_id, $menu_id, $jumlah);
                $stmt->execute();
            }
            
            $conn->commit();
            
        } catch (Exception $e) {
            $conn->rollback();
            throw $e; 
        }
        return $last_id;
    }    

    public static function diterima($id) {
        global $conn;
        $sql = "UPDATE `transaksi` SET `Status`='Diterima' WHERE id_transaksi = ?"; // Menggunakan id_transaksi untuk kondisi UPDATE

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    public static function ditolak() {
        
    }
}

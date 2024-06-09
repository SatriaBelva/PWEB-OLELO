<?php

class Pesanan {
    // Mengambil semua pesanan
    public static function getAllPesanan() {
        global $conn;
        $sql = "SELECT t.id_transaksi, t.Tanggal, c.nama 
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
        $sql = "SELECT c.nama, t.id_transaksi, t.Tanggal
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
}

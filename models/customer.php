<?php

class Customer {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public static function getAllMenus() {
        // Query untuk mendapatkan semua data menu
        $sql = "SELECT * FROM menu";
        $result = Database::query($sql);
        
        $menus = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $menus[] = $row;
            }
        }
        
        return $menus;
    }

    public static function getCustomer(){
        $sql = "SELECT * FROM customer";
        $result = $conn->query($sql);

        // Menyimpan hasil query ke dalam array
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        // Tutup koneksi
        $conn->close();
    }
}


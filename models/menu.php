<?php

include_once 'app/config/db_connect.php';

class Menu {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Fungsi untuk mendapatkan semua data menu
    public static function getAllMenus() {
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

    public static function saveMenu($nama, $deskripsi, $Jumlah_stok, $harga, $kategori) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO menu (nama, deskripsi, Jumlah_stok, harga, kategori) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $nama, $deskripsi, $Jumlah_stok, $harga, $kategori);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }

        $stmt->close();
    }
}
?>

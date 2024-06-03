<?php

include_once 'app/config/db_connect.php';

class Menu {
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

    public static function getMenuById($id) {
        $sql = "SELECT * FROM menu WHERE Id_menu = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Function untuk mengupdate data menu
    public static function updateMenu($id, $nama, $kategori, $harga, $deskripsi, $jumlah_stok) {
        $sql = "UPDATE menu SET nama=?, kategori=?, harga=?, deskripsi=?, jumlah_stok=? WHERE Id_menu=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisii", $nama, $kategori, $harga, $deskripsi, $jumlah_stok, $id);
        return $stmt->execute();
    }
}


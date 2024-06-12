<?php

include_once 'app/config/db_connect.php';

class Menu {
    public static function saveMenu($nama, $deskripsi, $Jumlah_stok, $harga, $kategori, $namaGambarBaru) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO menu (nama, deskripsi, Jumlah_stok, harga, kategori, Gambar) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss", $nama, $deskripsi, $Jumlah_stok, $harga, $kategori, $namaGambarBaru);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }

        $stmt->close();
    }

    static function getAllMenu(){
        // Query untuk mengambil data dari tabel menu
        global $conn;
        $sql = "SELECT Id_menu, nama, Deskripsi, Jumlah_stok, Gambar, harga, kategori FROM menu";

        $result = $conn->query($sql);
        $arr = [];

        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $row['harga'] = number_format($row['harga'], 0, ',', '.');
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public static function getMenuById($id) {
        global $conn;
        $sql = "SELECT * FROM menu WHERE Id_menu = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
        }
        
    // Function untuk mengupdate data menu
    public static function updateMenu($id, $nama, $deskripsi, $jumlah_stok, $harga, $kategori, $namaGambarBaru) {
        global $conn;
        $sql = "UPDATE menu SET nama=?, deskripsi=?, jumlah_stok=?, harga=?, kategori=?, Gambar=? WHERE Id_menu=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssi", $nama, $deskripsi, $jumlah_stok, $harga, $kategori, $namaGambarBaru, $id);
        return $stmt->execute();
    }
            

}


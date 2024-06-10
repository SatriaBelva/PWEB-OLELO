<?php
include_once 'app/config/db_connect.php';
class Karyawan{
    public static function hapusKaryawan($id){
        global $conn;
        $stmt = $conn->prepare("DELETE FROM karyawan WHERE Id_karyawan = ?");
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    
        $stmt->close();
    }
}
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

    public static function getKaryawan(){
        global $conn;
        $sql = "SELECT Id_karyawan, nama, no_hp, alamat, TTL, YEAR(TTL) AS tahun, ELT(MONTH(TTL), 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember') AS bulan, DAY(TTL) AS hari FROM karyawan";
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
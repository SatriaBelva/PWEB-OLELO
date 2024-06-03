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
}


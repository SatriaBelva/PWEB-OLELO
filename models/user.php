<?php

include_once 'app/config/db_connect.php';

class User
{
    static function login($data = [])
    {
        global $conn;

        $email = $data['email'];
        $password = $data['password'];

        // Fungsi untuk memeriksa pengguna di tabel tertentu
        function checkUser($conn, $table, $email, $password) {
            $stmt = $conn->prepare("SELECT * FROM $table WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($user = $result->fetch_assoc()) {
                $hashedPassword = $user['passwords'];
                if (password_verify($password, $hashedPassword)) {
                    return $user;
                }
            }
            return false;
        }

        // Daftar tabel yang akan diperiksa
        $tables = ['customer', 'karyawan', 'admin'];

        // Memeriksa setiap tabel
        foreach ($tables as $table) {
            if ($user = checkUser($conn, $table, $email, $password)) {
                // Menambahkan nama tabel dan role_id ke hasil
                return [
                    'table' => $table,
                    'user' => $user,
                    'role_id' => $user['role_id']
                ];
            }
        }

        // Jika tidak ditemukan di ketiga tabel
        return false;
    }

    static function register($data = [])
    {
        global $conn;

        $name = $data['name'];
        $password = $data['password'];
        $email = $data['email'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users SET name = ?, password = ?, email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $name, $hashedPassword, $email);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }


}
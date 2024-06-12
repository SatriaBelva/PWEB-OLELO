<?php

include_once 'models/user.php';
include_once 'function/main.php';
include_once 'app/config/static.php';


class AuthController {
    static function index(){
        view('auth/login', ['url' => 'login']);
    }
    static function restricted(){
        view('restricted',['url'=> 'restricted']);
    }
    static function login(){
        view('auth/login', ['url' => 'login']);
    }
    static function logout()
     {
        if ( ini_get( 'session.use_cookies' ) ) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params[ 'path' ],
                $params[ 'domain' ],
                $params[ 'secure' ],
                $params[ 'httponly' ]
            );
        }
        session_destroy();

        header( 'Location: auth/login' );
        exit();
    }

    static function register(){
        view('auth/register', ['url' => 'register']);
    }
    public static function newRegister()
    {
        global $conn;

        // Ambil data dari form
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $passwords = $_POST['passwords'];
        $TTL = $_POST['TTL'];

        // Hash password
        $hashedPassword = password_hash($passwords, PASSWORD_BCRYPT);
        
        $tables = ['customer', 'karyawan', 'admin'];

        foreach ($tables as $table) {
            $stmt = $conn->prepare("SELECT * FROM $table WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Email sudah ada
                echo "<script>
                    alert('Email sudah terdaftar di tabel $table. Silakan gunakan email lain.');
                    window.location.href = window.location.href;
                  </script>";
            $stmt->close();
            return;
            }
            $stmt->close();
        }

        // SQL untuk memasukkan data ke tabel users
        $stmt = $conn->prepare("INSERT INTO customer (role_id, nama, alamat, email, passwords, no_hp, TTL) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $role_id = 3; // Misalnya 1 untuk admin, 2 untuk karyawan, dan 3 untuk customer
        $stmt->bind_param("sssssis", $role_id, $nama,  $alamat, $email, $hashedPassword, $no_hp, $TTL);

        // Eksekusi query
        if ($stmt->execute()) {
            view('auth/login');
        } else {
            echo "Registrasi gagal: " . $stmt->error;
        }
        
        $stmt->close();
    }
    static function sessionLogin(){
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login(
            [
            'email' => $post['email'], 
            'password' => $post['password']
            ]);
        if ($user) {
            unset($user['password']);
            if($user['role_id'] == '1'){
                $_SESSION['user'] = $user;
                header('Location: menu-owner');
            }
            elseif($user['role_id'] == '2'){
                $_SESSION['user'] = $user;
                header('Location: menu-karyawan');
            }
            elseif($user['role_id'] == '3'){
                $_SESSION['user'] = $user;
                header('Location: menu');
            }
        }
        else {
            header('Location: '.BASEURL.'login?failed=true');
        }
    }
}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLELO Register</title>
    <link rel="stylesheet" href="resource/views/css/register.css">
</head>
<body>
    <div class="container">
        <div class="illustration">
            <img src="/assets/komputer-regist.png" alt="Illustration">
        </div>
        <div class="register-form">
            <h1>Silakan Isi formulir untuk Mendaftar!</h1>
            <form action="<?= urlpath('register')?>" method="POST">
                <label for="nama">Nama:</label>
                <input type="nama" id="nama" name="nama" required>

                <label for="no_hp">No Handphone:</label>
                <input type="no_hp" id="no_hp" name="no_hp" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="alamat">Alamat:</label>
                <input type="alamat" id="alamat" name="alamat" required>

                <label for="alamat">TTL:</label>
                <input type="date" id="alamat" name="alamat" required>
                
                <label for="passwords">Password:</label>
                <input type="passwords" id="passwords" name="passwords" required>

                <button type="submit">Register</button>
            </form>
            <p>Sudah memiliki akun?<a href=" <?= urlpath('login') ?>"><b>Login</b></a></p>
        </div>
    </div>
</body>
</html>
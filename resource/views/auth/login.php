<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resource/views/css/login.css">
    <title>OLELO Login</title>
    <!-- <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #E5E5FF;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        background-color: #F5F5FF;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 800px;
        width: 100%;
    }

    .login-form {
        flex: 1;
        padding: 40px;
        box-sizing: border-box;
    }

    .login-form h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .login-form form {
        display: flex;
        flex-direction: column;
    }

    .login-form label {
        margin-bottom: 10px;
        color: #333;
    }

    .login-form input {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .login-form button {
        padding: 10px;
        background-color: #6B6BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-form button:hover {
        background-color: #5555FF;
    }

    .login-form p {
        margin-top: 10px;
        color: #333;
        text-align: center;
    }

    .login-form a {
        color: #6B6BFF;
        text-decoration: none;
    }

    .login-form a:hover {
        text-decoration: underline;
    }

    .illustration {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        box-sizing: border-box;
    }

    .illustration img {
        max-width: 100%;
        height: auto;
    }
    </style> -->
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h1>Selamat Datang di OLELO!</h1>
            <form action="<?= urlpath('login')?>" method="POST" >
                <label for="email">email:</label>
                <input type="text" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="passwords" name="password" required>
                
                <button type="submit">Login</button>
            </form>
            <p>Tidak memiliki akun? <a href="<?= urlpath('register')?>">Register</a></p>
        </div>
        <div class="illustration">
            <img src="resource/views/img/komputer-login.png" alt="Illustration">
        </div>
    </div>
</body>
</html>

<?php
session_start();
$host = "localhost";
$dbname = "barbershopsalon"; // Ganti dengan nama database Anda
$username = "root"; // Ganti jika Anda menggunakan username lain
$password = ""; // Ganti jika Anda menggunakan password

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = ""; // Variabel untuk menyimpan pesan kesalahan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Verifikasi login
    $sql = "SELECT * FROM users WHERE username = 'admin' AND password = 'admin123'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password menggunakan password_verify
        if (password_verify($inputPassword, $user['password'])) {
            if ($user['role'] === 'admin') {
                $_SESSION['username'] = $inputUsername; // Simpan username di session
                header("Location: admin_dashboard.php"); // Arahkan ke halaman admin
                exit();
            } else {
                $error = "Anda Bukan Admin";
            }
        } else {
            $error = "Username atau Password salah";
        }
    } else {
        $error = "Username atau Password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">  
    <title>Login Admin - STYLESPOT</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('Gambar/HomePage.png');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box-large {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            width: 1000px;
            height: 400px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }
        .box-small {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            position: absolute;
            top: 30px;
            right: 30px;
            z-index: 1;
        }
        .text-container {
            max-width: 500px;
            margin-bottom: 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
            letter-spacing: 3px;
        }
        .text-container h1 {
            margin: 0;
            font-size: 40px;
        }
        .text-container p {
            margin: 10px 0 0;
            font-size: 16px;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 90%;
            padding: 8px;
            border: none;
            border-radius: 5px;
        }
        .login-button {
            background-color: #FFFFFF;
            color: #000000;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 30%;
            margin: 20px auto 0;
            display: block;
            text-align: center;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
        .alternative-login {
            margin-top: 15px;
        }
        .alternative-login a {
            color: white;
            text-decoration: none;
        }
        .alternative-login a:hover {
            text-decoration: underline;
        }
        .signup {
            margin-top: 20px;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="box-large">
        <div class="text-container">
            <h1>Hallo, Welcome Admin!</h1>
            <p>Selamat datang di Dashboard Admin Pemetaan Barbershop Bandung Raya. Kami sangat senang Anda bergabung dengan kami!</p>
            <p>Silakan masuk untuk mengelola barbershop, memantau statistik, dan memberikan pengalaman yang luar biasa bagi pengguna kami.</p>
        </div>
        <div class="box-small">
            <form method="POST" action="login.php">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                </div>
                <button type="submit" class="login-button">Login</button>
                <div class="error"><?php if (!empty($error)) echo $error; ?></div>
                <div class="alternative-login">
                    <p>or Login With</p>
                    <a href="#">Google</a> | <a href="#">Facebook</a>
                </div>
                <div class="signup">
                    <p>Don't have an account? <a href="#">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

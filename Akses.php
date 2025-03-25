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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Verifikasi login
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $inputUsername, $inputPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['role'] === 'admin') {
            $_SESSION['username'] = $inputUsername; // Simpan username di session
            header("Location: admin_dashboard.php"); // Arahkan ke halaman admin
            exit();
        } else {
            echo "<script>alert('Anda Bukan Admin');</script>";
        }
    } else {
        echo "<script>alert('Username atau Password salah');</script>";
    }
} else {
    // Jika bukan POST, arahkan kembali ke halaman login
    header("Location: login.php");
    exit();
}

$conn->close();
?>
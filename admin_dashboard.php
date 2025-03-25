<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Arahkan ke halaman login jika belum login
    exit();
}

// Ambil data dari database jika diperlukan
// Misalnya, ambil jumlah admin dan data barbershop
$host = "localhost";
$dbname = "barbershopsalon"; // Ganti dengan nama database Anda
$username = "root"; // Ganti jika Anda menggunakan username lain
$password = ""; // Ganti jika Anda menggunakan password

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil jumlah admin
$sql = "SELECT COUNT(*) as total_admin FROM users WHERE role = 'admin'";
$result = $conn->query($sql);
$totalAdmin = $result->fetch_assoc()['total_admin'];

// Ambil jumlah barbershop
$sql = "SELECT COUNT(*) as total_barbershop FROM barbershop"; // Ganti dengan nama tabel barbershop Anda
$result = $conn->query($sql);
$totalBarbershop = $result->fetch_assoc()['total_barbershop'];

// Ambil jumlah pengunjung (misalnya dari tabel log pengunjung)
$sql = "SELECT COUNT(*) as total_pengunjung FROM visitors"; // Ganti dengan nama tabel pengunjung Anda
$result = $conn->query($sql);
$totalPengunjung = $result->fetch_assoc()['total_pengunjung'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - STYLESPOT</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .container {
            display: flex;
            padding: 20px;
        }
        .sidebar {
            width: 25%;
            background-color: #ccc;
            padding: 20px;
            border-radius: 10px;
            margin-right: 20px;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar p {
            text-align: center;
            font-size: 18px;
        }
        .map-container {
            flex: 1;
            position: relative;
        }
        #map {
            height: 60vh;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>STYLESPOT - Dashboard Admin</h1>
    </div>
    <div class="container">
        <div class="sidebar">
            <h2>Statistik</h2>
            <p>Jumlah Admin: <?php echo $totalAdmin; ?></p>
            <p>Data Barbershop: <?php echo $totalBarbershop; ?></p>
            <p>Pengunjung Website: <?php echo $totalPengunjung; ?></p>
        </div>
        <div class="map-container">
            <h2>Peta Lokasi</h2>
            <div id="map"></div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-6.9176, 107.6191], 12); // Koordinat Bandung
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Tambahkan marker barbershop jika ada
        // Contoh marker, Anda bisa menggantinya dengan data dari database
        var marker = L.marker([-6.9176, 107.6191]).addTo(map)
            .bindPopup("<strong>Barbershop Contoh</strong><br>Alamat: Contoh Alamat");

        // Tambahkan lebih banyak marker sesuai kebutuhan
    </script>
</body>
</html>
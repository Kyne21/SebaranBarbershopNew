<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "barbershopsalon";

$conn = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil tipe data dari request
$type = isset($_GET['type']) ? $_GET['type'] : 'harga';

// Query berdasarkan tipe
if ($type === 'gender') {
    $sql = "SELECT 
                CASE 
                    WHEN gender = 0 THEN 'Pria'
                    WHEN gender = 1 THEN 'Wanita'
                END AS kategori,
                COUNT(*) AS jumlah
            FROM sebaran
            GROUP BY gender";
} else {
    $sql = "SELECT 
                CASE 
                    WHEN harga = 1 THEN 'Terjangkau'
                    WHEN harga = 2 THEN 'Sedang'
                    WHEN harga = 3 THEN 'Mahal'
                END AS kategori,
                COUNT(*) AS jumlah
            FROM sebaran
            GROUP BY harga";
}

$result = $conn->query($sql);

// Array untuk data chart
$dataPoints = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataPoints[] = array("label" => $row['kategori'], "y" => $row['jumlah']);
    }
}

// Tutup koneksi
$conn->close();

// Output sebagai JSON
header('Content-Type: application/json');
echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
?>
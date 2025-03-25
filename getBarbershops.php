<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbershopsalon";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM sebaran";
$result = $conn->query($sql);
$barbershops = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $barbershops[] = $row;
    }
}

echo json_encode($barbershops);
$conn->close();
?>
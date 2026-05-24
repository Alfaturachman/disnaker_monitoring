<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil raw data JSON dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Ambil id_user dari data JSON
$id_user = isset($data['id_user']) ? $conn->real_escape_string($data['id_user']) : '';

// Periksa apakah id_user ada
if (empty($id_user)) {
    echo json_encode([
        "status" => false,
        "message" => "Parameter 'id_user' is required."
    ]);
    $conn->close();
    exit();
}

// Query SELECT untuk mengambil semua data dari tabel kategori
$sql = "SELECT * FROM media";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode([
        "status" => true,
        "message" => "Data kategori ditemukan",
        "data" => $data
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Tidak ada data kategori ditemukan"
    ]);
}

$conn->close();

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

// Query untuk menghitung total masing-masing status di tabel media berdasarkan id_user
$sql_status = "
    SELECT 
        YEAR(tanggal) AS tahun,
        SUM(CASE WHEN status = 'disetujui' THEN 1 ELSE 0 END) AS disetujui,
        SUM(CASE WHEN status = 'belum disetujui' THEN 1 ELSE 0 END) AS belum_disetujui,
        SUM(CASE WHEN status = 'tolak' THEN 1 ELSE 0 END) AS tolak
    FROM media
    GROUP BY YEAR(tanggal)
    ORDER BY tahun DESC
";


$result_status = $conn->query($sql_status);
$data_status = ["disetujui" => 0, "belum_disetujui" => 0, "tolak" => 0];

if ($result_status && $result_status->num_rows > 0) {
    $row = $result_status->fetch_assoc();
    $data_status["disetujui"] = (int)$row['disetujui'];
    $data_status["belum_disetujui"] = (int)$row['belum_disetujui'];
    $data_status["tolak"] = (int)$row['tolak'];
}

// Buat response JSON
echo json_encode([
    "status" => true,
    "message" => "success",
    "data" => $data_status
], JSON_PRETTY_PRINT);

// Tutup koneksi database
$conn->close();

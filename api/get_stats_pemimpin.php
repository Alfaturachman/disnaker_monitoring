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

// Query SQL untuk mendapatkan total status per bulan berdasarkan id_user
$sql = "
    SELECT 
        YEAR(tanggal) AS tahun, 
        MONTH(tanggal) AS bulan,
        SUM(CASE WHEN status = 'disetujui' THEN 1 ELSE 0 END) AS total_disetujui,
        SUM(CASE WHEN status = 'belum disetujui' THEN 1 ELSE 0 END) AS total_belum_disetujui,
        SUM(CASE WHEN status = 'tolak' THEN 1 ELSE 0 END) AS total_ditolak
    FROM media
    GROUP BY YEAR(tanggal), MONTH(tanggal)
    ORDER BY YEAR(tanggal) ASC, MONTH(tanggal) ASC
";

$result = $conn->query($sql);

$rekap_per_bulan = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rekap_per_bulan[] = [
            "tahun" => (int)$row['tahun'],
            "bulan" => (int)$row['bulan'],
            "total_disetujui" => (int)$row['total_disetujui'],
            "total_belum_disetujui" => (int)$row['total_belum_disetujui'],
            "total_ditolak" => (int)$row['total_ditolak']
        ];
    }
}

// Buat response JSON
$response = [
    "status" => true,
    "message" => "success",
    "data" => $rekap_per_bulan
];

echo json_encode($response, JSON_PRETTY_PRINT);

// Tutup koneksi database
$conn->close();

<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Baca input JSON
$input = json_decode(file_get_contents("php://input"), true);

// Debug log
error_log("JSON Input: " . print_r($input, true));

// Ambil dan sanitasi data dari JSON body
$id_media = isset($input['id_media']) ? $conn->real_escape_string($input['id_media']) : null;
$status = isset($input['selectedStatus']) ? $conn->real_escape_string($input['selectedStatus']) : null;

// Validasi input
if (!$id_media) {
    echo json_encode([
        "status" => false,
        "message" => "ID media harus disertakan"
    ]);
    exit();
}

if (!$status || !in_array($status, ['disetujui', 'belum disetujui', 'tolak'])) {
    echo json_encode([
        "status" => false,
        "message" => "Status tidak valid. Gunakan 'disetujui', 'belum disetujui', atau 'tolak'"
    ]);
    exit();
}

// Bangun query update
$sql = "UPDATE media SET status = '$status' WHERE id = '$id_media'";
error_log("Executing SQL: $sql");

// Eksekusi query
if ($conn->query($sql) === TRUE) {
    echo json_encode([
        "status" => true,
        "message" => "Status media berhasil diperbarui.",
        "data" => ["id_media" => $id_media, "status" => $status]
    ]);
} else {
    error_log("Database error: " . $conn->error);
    echo json_encode([
        "status" => false,
        "message" => "Gagal memperbarui status media.",
        "error_detail" => $conn->error
    ]);
}

$conn->close();

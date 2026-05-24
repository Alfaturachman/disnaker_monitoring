<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil input JSON
$input = json_decode(file_get_contents("php://input"), true);

// Debug log (opsional, bisa di-comment jika tidak diperlukan di produksi)
error_log("JSON Input: " . print_r($input, true));

// Ambil dan sanitasi data
$id_surat = isset($input['id_surat']) ? $conn->real_escape_string($input['id_surat']) : null;
$balasan = isset($input['balasan']) ? $conn->real_escape_string($input['balasan']) : null;

// Validasi input
if (!$id_surat) {
    echo json_encode([
        "status" => false,
        "message" => "ID surat harus disertakan"
    ]);
    exit();
}

if ($balasan === null) {
    echo json_encode([
        "status" => false,
        "message" => "Balasan harus disertakan"
    ]);
    exit();
}

// Query update
$sql = "UPDATE tb_surat SET balasan = '$balasan' WHERE id = '$id_surat'";
error_log("Executing SQL: $sql");

if ($conn->query($sql) === TRUE) {
    echo json_encode([
        "status" => true,
        "message" => "Balasan surat berhasil diperbarui."
    ]);
} else {
    error_log("Database error: " . $conn->error);
    echo json_encode([
        "status" => false,
        "message" => "Gagal memperbarui balasan surat.",
        "error_detail" => $conn->error
    ]);
}

$conn->close();

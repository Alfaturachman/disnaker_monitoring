<?php
require_once 'connection.php';
header("Content-Type: application/json");

// Ambil data JSON dari body request
$data = json_decode(file_get_contents("php://input"), true);

// Validasi input
if (!isset($data['id_media'])) {
    echo json_encode([
        "status" => false,
        "error" => "ID media tidak ditemukan"
    ]);
    exit();
}

// Escape input
$id_media = $conn->real_escape_string($data['id_media']);

// Hapus media berdasarkan ID
$sql_delete_media = "DELETE FROM `media` WHERE `id` = '$id_media'";
if ($conn->query($sql_delete_media)) {
    if ($conn->affected_rows > 0) {
        echo json_encode([
            "status" => true,
            "message" => "Media berhasil dihapus",
            "id_media" => $id_media
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "error" => "Media tidak ditemukan"
        ]);
    }
} else {
    echo json_encode([
        "status" => false,
        "error" => "Gagal menghapus media: " . $conn->error
    ]);
}

$conn->close();

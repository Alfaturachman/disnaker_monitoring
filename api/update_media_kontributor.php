<?php
require_once 'connection.php';
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("POST Request received for media update");

    $id_media = intval($_POST['id_media']);
    $id_user = intval($_POST['id_user']);

    // Cek apakah media dimiliki user
    $result = mysqli_query($conn, "SELECT gambar FROM media WHERE id = $id_media AND id_user = $id_user");
    if (!$result || mysqli_num_rows($result) === 0) {
        echo json_encode([
            "status" => false,
            "message" => "Media tidak ditemukan atau tidak memiliki akses"
        ]);
        exit();
    }

    $row = mysqli_fetch_assoc($result);
    $current_gambar = $row['gambar'];
    $file_name = $current_gambar;

    // Proses upload jika ada gambar baru
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        if ($_FILES['gambar']['size'] > 5 * 1024 * 1024) {
            echo json_encode(["status" => false, "message" => "Ukuran file melebihi 5MB"]);
            exit();
        }

        $upload_dir = "../uploads/";
        $absolute_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $upload_dir;

        if (!is_dir($absolute_path)) {
            mkdir($absolute_path, 0777, true);
        }

        $file_ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $file_name = time() . "." . $file_ext;
        $file_path = $absolute_path . $file_name;

        if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $file_path)) {
            echo json_encode(["status" => false, "message" => "Gagal upload file"]);
            exit();
        }

        if ($current_gambar && file_exists($absolute_path . $current_gambar)) {
            unlink($absolute_path . $current_gambar);
        }
    }

    // Siapkan kolom yang ingin diperbarui
    $fields = [];

    if (!empty($_POST['id_kategori'])) {
        $id_kategori = intval($_POST['id_kategori']);
        $fields[] = "id_kategori = $id_kategori";
    }

    if (!empty($_POST['nama'])) {
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $fields[] = "nama = '$nama'";
    }

    if (!empty($_POST['judul'])) {
        $judul = mysqli_real_escape_string($conn, $_POST['judul']);
        $fields[] = "judul = '$judul'";
    }

    if (!empty($_POST['url'])) {
        $url = mysqli_real_escape_string($conn, $_POST['url']);
        $fields[] = "url = '$url'";
    }

    if (!empty($_POST['deskripsi'])) {
        $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
        $fields[] = "deskripsi = '$deskripsi'";
    }

    // Jika ada gambar baru
    if ($file_name !== $current_gambar) {
        $fields[] = "gambar = '$file_name'";
    }

    // Jika tidak ada yang diubah
    if (empty($fields)) {
        echo json_encode([
            "status" => false,
            "message" => "Tidak ada data yang dikirim untuk diperbarui"
        ]);
        exit();
    }

    // Susun query update
    $update_sql = "UPDATE media SET " . implode(", ", $fields) . " WHERE id = $id_media AND id_user = $id_user";

    if (mysqli_query($conn, $update_sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo json_encode([
                "status" => true,
                "message" => "Data media berhasil diperbarui",
                "data" => [
                    "id_media" => $id_media
                ]
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Tidak ada perubahan data"
            ]);
        }
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Gagal memperbarui data: " . mysqli_error($conn)
        ]);
    }
} else {
    echo json_encode([
        "status" => false,
        "message" => "Metode request tidak valid"
    ]);
}

$conn->close();

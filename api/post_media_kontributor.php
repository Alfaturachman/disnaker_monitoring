<?php
require_once 'connection.php';
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debug: Log request data
    error_log("POST Request received");
    error_log("FILES: " . print_r($_FILES, true));
    error_log("POST: " . print_r($_POST, true));

    // Periksa apakah ada file yang diunggah
    if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
        $error_code = isset($_FILES['gambar']) ? $_FILES['gambar']['error'] : 'File tidak ada';
        error_log("File upload error: " . $error_code);
        echo json_encode([
            "status" => false,
            "message" => "File tidak ditemukan atau gagal diunggah. Error code: " . $error_code
        ]);
        exit();
    }

    // Validasi ukuran file (contoh: maksimal 5MB)
    if ($_FILES['gambar']['size'] > 5 * 1024 * 1024) {
        echo json_encode([
            "status" => false,
            "message" => "Ukuran file melebihi batas yang diizinkan (5MB)"
        ]);
        exit();
    }

    // Ambil data dari form-data
    $id_user = isset($_POST['id_user']) ? intval($_POST['id_user']) : null;
    $id_kategori = isset($_POST['id_kategori']) ? intval($_POST['id_kategori']) : null;
    $nama = isset($_POST['nama']) ? $conn->real_escape_string($_POST['nama']) : null;
    $judul = isset($_POST['judul']) ? $conn->real_escape_string($_POST['judul']) : null;
    $url = isset($_POST['url']) ? $conn->real_escape_string($_POST['url']) : null;
    $status = 'belum disetujui';
    $tanggal = isset($_POST['tanggal']) ? date("Y-m-d H:i:s", strtotime($_POST['tanggal'])) : date("Y-m-d H:i:s");
    $deskripsi = isset($_POST['deskripsi']) ? $conn->real_escape_string($_POST['deskripsi']) : null;

    // PERBAIKAN: Gunakan path relatif saja
    $upload_dir = "../uploads/";

    // Cek path saat ini
    error_log("Current working directory: " . getcwd());
    error_log("Script location: " . __DIR__);

    // Buat path absolut dari lokasi script
    $absolute_upload_dir = __DIR__ . "/" . $upload_dir;
    error_log("Absolute upload directory: " . $absolute_upload_dir);

    // Cek dan buat direktori jika belum ada
    if (!is_dir($absolute_upload_dir)) {
        if (!mkdir($absolute_upload_dir, 0777, true)) {
            error_log("Failed to create directory: " . $absolute_upload_dir);
            echo json_encode([
                "status" => false,
                "message" => "Gagal membuat direktori upload"
            ]);
            exit();
        }
        error_log("Directory created: " . $absolute_upload_dir);
    }

    // Pastikan direktori dapat ditulis
    if (!is_writable($absolute_upload_dir)) {
        chmod($absolute_upload_dir, 0777);
        if (!is_writable($absolute_upload_dir)) {
            error_log("Directory not writable: " . $absolute_upload_dir);
            echo json_encode([
                "status" => false,
                "message" => "Direktori upload tidak dapat diakses untuk menulis"
            ]);
            exit();
        }
    }

    // Ambil ekstensi file dan buat nama baru
    $file_ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

    // Validasi ekstensi file
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($file_ext, $allowed_extensions)) {
        echo json_encode([
            "status" => false,
            "message" => "Format file tidak didukung. Gunakan: " . implode(', ', $allowed_extensions)
        ]);
        exit();
    }

    $file_name = time() . "_" . uniqid() . "." . $file_ext;
    $file_path = $absolute_upload_dir . $file_name;

    error_log("Uploading file to: " . $file_path);
    error_log("Temp file: " . $_FILES['gambar']['tmp_name']);
    error_log("File size: " . $_FILES['gambar']['size']);
    error_log("File exists before upload: " . (file_exists($_FILES['gambar']['tmp_name']) ? 'YES' : 'NO'));

    // Coba pindahkan file
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $file_path)) {
        error_log("File successfully uploaded to: " . $file_path);
        error_log("File exists after upload: " . (file_exists($file_path) ? 'YES' : 'NO'));

        // Simpan data ke database menggunakan prepared statement
        $sql = "INSERT INTO media (id_kategori, id_user, nama, judul, url, status, tanggal, gambar, deskripsi, view)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo json_encode(["status" => false, "message" => "Gagal mempersiapkan statement: " . $conn->error]);
            exit();
        }

        $stmt->bind_param(
            "iisssssss",
            $id_kategori,
            $id_user,
            $nama,
            $judul,
            $url,
            $status,
            $tanggal,
            $file_name,
            $deskripsi
        );

        if ($stmt->execute()) {
            echo json_encode([
                "status" => true,
                "message" => "Data media berhasil dikirim",
                "data" => [
                    "id_kategori" => $id_kategori,
                    "nama" => $nama,
                    "judul" => $judul,
                    "url" => $url,
                    "status" => $status,
                    "tanggal" => $tanggal,
                    "gambar" => $file_name,
                    "deskripsi" => $deskripsi,
                    "upload_path" => $file_path // Untuk debugging
                ]
            ]);
        } else {
            error_log("SQL error: " . $stmt->error);
            echo json_encode([
                "status" => false,
                "message" => "Gagal menyimpan data: " . $stmt->error
            ]);
        }

        $stmt->close();
    } else {
        $error = error_get_last();
        error_log("Failed to move uploaded file: " . print_r($error, true));
        echo json_encode([
            "status" => false,
            "message" => "Gagal mengupload file: " . ($error ? $error['message'] : 'Unknown error')
        ]);
    }
} else {
    echo json_encode([
        "status" => false,
        "message" => "Metode request tidak valid"
    ]);
}

$conn->close();

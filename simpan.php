<?php
$koneksi = new mysqli("localhost", "root", "", "pemilu2025");

$id = $_POST['id'];
$pilihan = $_POST['pilihan'];

// Cek apakah ID sudah pernah digunakan
$cek = $koneksi->query("SELECT * FROM suara WHERE id = '$id'");
if ($cek->num_rows > 0) {
    http_response_code(400);
    echo "ID ini sudah digunakan untuk memilih.";
    exit;
}

// Simpan suara
$stmt = $koneksi->prepare("INSERT INTO suara (id, pilihan) VALUES (?, ?)");
$stmt->bind_param("ss", $id, $pilihan);
$stmt->execute();
echo "Terima kasih, suara Anda telah disimpan.";
?>
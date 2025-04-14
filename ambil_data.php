<?php
$koneksi = new mysqli("localhost", "root", "", "pemilu2025");

$data = [];
$sql = "SELECT pilihan, COUNT(*) as jumlah FROM suara GROUP BY pilihan";
$result = $koneksi->query($sql);

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
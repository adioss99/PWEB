<?php
require_once('db.php');

$db = new mysqli(HOST,USER,PASS, DB);
if ($db->connect_error) {
    die("Koneksi Gagal");
}
$sql = "SELECT * FROM penulis";

$result = $db->query($sql);
$data = [];
while ($row = $result->fetch_assoc()) {
    array_push($data,$row);
}
header("Content-Type: application/json");
echo json_encode($data);
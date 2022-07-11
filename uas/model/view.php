<?php
require_once('db.php');

$conn = new mysqli(HOST, USER, PASS, DB);

// Check connection
if ($conn->connect_error) {
    exit("Connection failed: " . $conn->connect_error);
}

// Get last id
$lastid = intval((!empty($_GET['lastid'])) ? $_GET['lastid'] : 0);

// Query to db
if (isset($_POST['search'])) {
    $judul_buku = (!empty($_POST['judul_buku'])) ? $_POST['judul_buku'] : '';
    $harga = (!empty($_POST['harga'])) ? $_POST['harga'] : null;
    $order = ($_POST['judul_buku'] == 'A') ? 'ASC' : 'DESC';

    if (is_null($rating)) {
        $sql = "SELECT * FROM buku WHERE judul_buku LIKE '%$judul_buku%' ORDER BY judul_buku $order LIMIT 12 OFFSET $lastid";
    } else {
        $sql = "SELECT * FROM buku WHERE judul_buku LIKE '%$judul_buku%' AND harga = '$harga' ORDER BY title $order LIMIT 12 OFFSET $lastid";
    }
} else {
    $sql = "SELECT * FROM buku ORDER BY judul_buku ASC LIMIT 8 OFFSET $lastid";
}

$result = $conn->query($sql);

$show = [];
while ($row = $result->fetch_assoc()) {
    $show[] = [
        'judul_buku' => $row['judul_buku'],
        'harga' => $row['harga'],
        'id_buku' => $row['id_buku'],
        'id_buku' => $row['id_buku']
    ];
}

echo json_encode($show);
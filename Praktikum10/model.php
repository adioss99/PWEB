<?php
$db = mysqli_connect('localhost', 'root', '', 'sakila');
// $db = mysqli_connect('localhost', '202410101145', 'secret', 'uas202410101145');

$page = isset($_GET['page']) ? $_GET['page'] : 0;

$sql = $db->query( "SELECT * FROM film LIMIT {$page},8");
$data = [];

while($row = $sql->fetch_assoc()){
    array_push($data, $row);
}

echo json_encode($data);
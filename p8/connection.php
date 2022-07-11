<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";

$conn = mysqli_connect($db_host, $db_user, $db_pass, "sakila");

if (!$conn) {
  die("Koneksi Gagal: " . mysqli_connect_error());
}

<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";

$conn = mysqli_connect($db_host, $db_user, $db_pass, "UTS_202410101145");

if (!$conn) {
  die("Failed: " . mysqli_connect_error());
}

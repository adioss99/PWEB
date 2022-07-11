<?php

include 'connect.php';


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM uts WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {

        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

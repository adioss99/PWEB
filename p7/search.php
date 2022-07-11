<?php
include 'connection.php';

$title = $_POST['title'];
$rating = $_POST['rating'];
$sort = $_POST['sort'];

// var_dump($_POST);
$query = "SELECT * FROM film WHERE title LIKE '%$title%' AND rating LIKE '%$rating%' ORDER BY $sort";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if ($count == 0) {
  echo "Data not found";
} else {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-lg-3 mb-4">';
    echo '<div class="card">';
    echo '<img src="photo-1560109947-543149eceb16.avif" class="card-img-top" class="card-img-top" alt="' . $row['title'] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
    echo '<div class="card-text">';
    echo '<div class="row">';
    echo '<div class="col-lg-6">';
    echo '<span>Rating: ' . $row['rating'] . '</span>';
    echo '</div>';
    echo '<div class="col-lg-6">';
    echo '<button type="button" class="btn btn-sm btn-primary float-end ms-1"><i class="bi bi-pencil-square"></i></button>';
    echo '<button type="button" class="btn btn-sm btn-danger float-end"><i class="bi bi-trash3-fill"></i></button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
}

<?php
include 'connection.php';

$title = $_POST['title'];
$rating = $_POST['rating'];
$sort = $_POST['sort'];

$query = "SELECT * FROM film WHERE title LIKE '%$title%' AND rating LIKE '$rating' ORDER BY $sort";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

if ($count == 0) {
  echo "Data not found";
} else {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-lg-3 col-sm-6 mb-4">';
    echo '<div class="card card-content text-dark" >';
    echo '<img src="photo-1560109947-543149eceb16.avif" class="rounded-3" alt="' . $row['title'] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
    echo '<div class="card-text">';
    echo '<div class="row">';
    echo '<div class="col-lg-6">';
    echo '<span>Rating: ' . $row['rating'] . '</span>';
    echo '</div>';
    echo '<div class="col-lg-6 mt-2">';
    echo '<button type="button" class="btn btn-sm btn-primary "><i class="bi bi-pencil-square"></i></button>';
    echo '<button type="button" class="btn btn-sm btn-danger "><i class="bi bi-trash3-fill"></i></button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<br>';
    echo '<a type="button" class="btn btn-sm btn-outline-info col-lg-12" href="detail.php?id='.$row['film_id'].'"><i class="bi bi-eye-fill"></i></a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
}

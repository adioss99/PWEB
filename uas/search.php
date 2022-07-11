<?php
include 'model/db.php';

$judul_buku = $_POST['judul_buku'];
$genre = $_POST['genre'];
$sort = $_POST['sort'];

$query = "SELECT * FROM buku WHERE judul_buku LIKE '%$judul_buku%' AND id_genre LIKE '%$genre%' ORDER BY $sort";
// var_dump($_POST);
// var_dump($query);
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if ($count == 0) {
  echo "Data not found";
} else {
  while ($row = mysqli_fetch_assoc($result)) {
    echo'<div class="col-xl-3 col-md-6 mb-4">
        <div class="card">
            <a href= "detail.php?id='.$row['id_buku'].'"><img src="assets/'.$row['id_buku'].'.jpg" class="card-img-top image-crop"></a>
            <div class="card-body">
                <h6 class="card-text">'.$row['judul_buku'].'</h6>
                <div class="d-flex justify-content-between">
                    <p class="text-danger">Harga: '.$row['harga'].'</p>
                    <div>
                        <a href="update.php?id='.$row['id_buku'].'"><button class="btn btn-warning btn-sm"><i class="fas fa-edit" style="color:white"></i></button></a>
                        <a href="model/delete.php?id='.$row['id_buku'].'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>';
  }
}
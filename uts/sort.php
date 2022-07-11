<?php

include 'connect.php';

$sort = $_POST['sort'];

$query = "SELECT * FROM uts ORDER BY $sort";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if ($count == 0) {
  echo "Data not found";
} else {
  while ($row = mysqli_fetch_assoc($result)) :
    echo'<tr>';
        echo '<td>'.$row['fakultas'].'</td>';
        echo '<td>'.$row['jumlahAnimo'].'</td>';
        echo'<td>';
        echo'<a href="update.php?id='.$row['id'].'" class="btn btn-warning btn-sm mr-3">Edit <i class="bi bi-pencil-square"></i></a>';
        echo'<a href="delete.php?id='. $row['id'].'" class="btn btn-danger btn-sm">Hapus <i class="bi bi-trash3-fill"></i></a>';
        echo'</td>';
    echo'</tr>';
  endwhile;
}
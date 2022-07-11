<!-- <?php
require_once 'model/db.php';
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.html");
}
?>
?> -->

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta id="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <style>
    body{
    background-color: #06283D;
    }
    header{            
        color: #DFF6FF;
    }
  </style>

  <title>Detail</title>

</head>
<body>
  <?php
  function detail($query){
    global $conn;
    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0)
      $row = mysqli_fetch_assoc($result);
    
    return $row;
  }
  $id = $_GET['id'];
  $query ="SELECT * FROM buku WHERE id_buku = '$id'";
  $row = detail($query);
  ?>
  <div class="container">
    <h1 class="text-center text-white pt-3 mb-2">Detail Buku</h1>
        <div class="row p-5">
          <div class="col-lg-3">
            <img src="assets/<?= $row['id_buku'] ?>.jpg" class="card-img rounded-3" >
          </div>
          <div class="card card-content col-lg-9 p-3">
            <div>
                <h1><?= $row['judul_buku'] ?> </h1>
                <h3 class="pt-5">Sinopsis</h3>
                <h6><?= $row['sinopsis'] ?> </h6>
                <ul class="list-inline pt-4">
                    <li class="list-inline-item" style="margin-right: 5rem;">
                    <?php                    
                    $query ="SELECT * FROM penulis WHERE id_penulis = '" . $row['id_penulis'] . "'";
                    $penulis = detail($query);
                    ?>
                      <label class="fw-bold">Penulis</label>
                      <p id="penulis"><?= $penulis['nama_penulis'] ?></p>
                    </li>
                    <li class="list-inline-item" style="margin-right: 5rem;">
                    <?php                    
                    $query ="SELECT * FROM penerbit WHERE id_penerbit = '" . $row['id_penerbit'] . "'";
                    $penerbit = detail($query);
                    ?>
                      <label class="fw-bold">Penerbit</label>
                      <p id="penerbit"> <?= $penerbit['nama_penerbit'] ?></p>
                    </li>
                    <li class="list-inline-item" style="margin-right: 5rem;" id="genre">
                    <?php                    
                    $query ="SELECT * FROM genre WHERE id_genre = '" . $row['id_genre'] . "'";
                    $genre = detail($query);
                    ?>
                      <label class="fw-bold">Genre</label>
                      <p id="genre"><?= $genre['nama_genre'] ?></p>
                    </li>
                </ul>
                <h5>Harga</h5>
                <h4 class="text-danger">Rp.<?= $row['harga'] ?> </h4>
            </div>
        </div>
        <div class="col-lg-3 mt-3">
          <a href="admin.php" class="btn btn-primary w-100"><i class="bi bi-arrow-left-short"></i> Kembali</a>
        </div>
    </div>
  </div>
    <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
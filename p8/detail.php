<?php
include 'connection.php';
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <style>
    body {
    background-color: #062C30;
    }
  </style>

  <title>Popular Movies</title>

</head>
<body>
  <div class="container">
  <h1 class="text-center text-white pt-3 pb-2">Popular Movies</h1>
    <div class="row ">
      <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';">
        <ol class="breadcrumb">
          <a href="index.php" class="breadcrumb-item text-white"><i class="bi bi-house"></i> Home</a>
          <li class="breadcrumb-item fw-bold active text-white"> Details</li>
        </ol>
      </nav>
      <?php
      if (isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $query ="SELECT * FROM film WHERE film_id = '$id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result)  
          ?>
          <div class="col-lg-3">
            <img src="photo-1560109947-543149eceb16.avif" class="card-img rounded-3" >
          </div>
          <div class="card card-content col-lg-9 ">
            <div>
              <h1><?= $row['title'] ?></h1>
              <div>
                <span class="fw-bold border border-dark rounded-3 badge badge-white text-dark bg-white"><?=$row['rating']?></span>
                <span class="fw-bold "> <?= $row['special_features'] ?> &bull; <?= floor($row['length'] / 60) ?>h <?=$row['length'] % 60?>m</span>
              </div>
              <h3 class="pt-5">Overview</h3>
              <h6><?= $row['description'] ?></h6>
              <ul class="list-inline pt-4">
                <li class="list-inline-item" style="margin-right: 5rem;">
                  <label class="fw-bold">Languange</label>
                  <?php
                    $languange = "SELECT * FROM language WHERE language_id = '" . $row['language_id'] . "'";
                    $result_lang = mysqli_query($conn, $languange);
                    if (mysqli_num_rows($result_lang) > 0) {
                      $row_lang = mysqli_fetch_assoc($result_lang) ?>
                        <p><?= $row_lang['name'] ?></p>
                    <?php 
                    }
                  ?>
                </li>
                <li class="list-inline-item" style="margin-right: 5rem;">
                  <label class="fw-bold">Rental Duration</label>
                  <p><?= $row['rental_duration'] ?> days</p>
                </li>
                <li class="list-inline-item" style="margin-right: 5rem;">
                  <label class="fw-bold">Rental Rate</label>
                  <p>&#36;<?= $row['rental_rate']?></p>
                </li>
                <li class="list-inline-item" style="margin-right: 5rem;">
                  <label class="fw-bold">Replacement Cost</label>
                  <p>&#36;<?= $row['replacement_cost'] ?></p>
                </li>
              </ul>
            </div>
          <?php
          
        } else {
          echo "<h5 class='text-danger text-center'>Data not found</h5>";
        }
      }?>
      </div>
      <div class="col-lg-3 mt-3">
        <a href="index.php" class="btn btn-primary w-100"><i class="bi bi-arrow-left-short"></i> Back</a>
      </div>
    </div>
  </div>
    <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
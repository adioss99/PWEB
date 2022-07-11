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
<body></body>
  
<div class="background">
<h1 class="text-center text-white pt-3">Popular Movies</h1>
  <div class="container">
    <div class="row mb-3">
      <div class="col-lg-3">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';">
          <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold active text-white"><i class="bi bi-house"></i> Home</li>
          </ol>
        </nav>
      </div>
      <div class="col-lg-9">
        <a href="#" class="btn btn-primary float-end"><i class="bi bi-plus-square"></i> Create</a>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3">
        <form>
          <div class="card">
            <div class="card-header">
              <h4>Sorting</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="sort">Sort By</label>
                <select class="form-select" id="sort" name="sort">
                  <option value="title ASC" selected>Title Ascending</option>
                  <option value="title DESC">Title Descending</option>
                </select>
              </div>
            </div>
          </div>

          <div class="card mt-3">
            <div class="card-header">
              <h4>Filters</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="title" >Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
              </div>
              <div class="form-group mt-3">
                <label for="rating">Rating</label>
                <select class="form-select" id="rating" name="rating">
                  <option value="%" selected>none</option>
                  <option value="G">G</option>
                  <option value="PG">PG</option>
                  <option value="PG-13">PG-13</option>
                  <option value="R">R</option>
                  <option value="NC-17">NC-17</option>
                </select>
              </div>
            </div>
          </div>

          <div class="d-grid gap-2">
            <button type="button" class="btn btn-primary mt-3 mb-3" id="search"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
          </div>
        </form>
      </div>

      <div class="col-lg-9">
        <div class="row" id="film">
          <?php
          $sql = "SELECT * FROM film";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
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
          } else {
            echo "No results";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $(document).ready(function() {
      $(document).on('click', '#search', function() {
        var sort = $('#sort').val();
        var title = $('#title').val();
        var rating = $('#rating').val();

        $.ajax({
          url: 'search.php',
          type: 'POST',
          data: {
            sort: sort,
            title: title,
            rating: rating
          },
          success: function(response) {
            $('#film').html(response);
          }
        });
      });
    });
  </script>
</body>
</html>
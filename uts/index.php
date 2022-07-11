<?php
include('connect.php')
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <title>UTS 20-1145</title>
    </head>
    <body>
        <h1 class="text-center fw-bold mt-3">Data Animo Mahasiswa Baru</h1>
        <div class="container py-5">
            <div class="row mb-3">
                <div class="col-lg-12">
                    <a href="add.php" class="btn btn-primary float-end"><i class="bi bi-plus-square"></i> Add</a>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3">
                    <form>
                        <div class="card">
                            <div class="card-header">
                                <h4>Sorting</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="sort">Sort Animo Fakultas</label>
                                    <select class="form-select" id="sort" name="sort">
                                        <option value="jumlahAnimo ASC" selected>Terkecil</option>
                                        <option value="jumlahAnimo DESC">Terbesar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid pt-1">
                            <button type="button" class="btn btn-primary" id="search"><i class="bi bi-filter-left"></i> Sort</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Fakultas</th>
                                    <th scope="col">Jumlah Animo</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="animo">
                                <?php
                                $sql = "SELECT * FROM uts";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        echo'<tr>';
                                            echo '<td>'.$row['fakultas'].'</td>';
                                            echo '<td>'.$row['jumlahAnimo'].'</td>';
                                            echo'<td>';
                                            echo'<a href="update.php?id='.$row['id'].'" class="btn btn-warning btn-sm ">Edit <i class="bi bi-pencil-square"></i></a>';
                                            echo'<a href="delete.php?id='. $row['id'].'" class="btn btn-danger btn-sm">Hapus <i class="bi bi-trash3-fill"></i></a>';
                                            echo'</td>';
                                        echo'</tr>';
                                    endwhile;
                                }else{
                                    echo "<tr>";
                                    echo "No results";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '#search', function() {
                    var sort = $('#sort').val();
                    $.ajax({
                        url: 'sort.php',
                        type: 'POST',
                        data: {
                            sort: sort
                        },
                        success: function(response) {
                            $('#animo').html(response);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
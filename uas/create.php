<?php
// if auth
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <script src="https://kit.fontawesome.com/b6eec55ff3.js" crossorigin="anonymous"></script>

    <title>Tambah buku</title>

    <link rel="stylesheet" href="style/create.css" />
</head>

<body>
    <header class="mb-4">
        <div class="judul text-center my-4">
            <h1>
                <i class="fa-solid fa-square-plus"></i> Tambah Data Buku
                <br>
            </h1>
        </div>
    </header>
    <div class="container ">
        <!-- form -->
        <div class="row mt-4">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class=" row mb-3">
                    <label class="col-sm-2" for="formFile" class="form-label">Thumbnail</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="thumbnail" name="thumbnail" accept="image/jpeg" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2">Harga</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="harga" name="harga" value="1" required>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2">Sinopsis</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="sinopsis" name="sinopsis"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2">Penulis</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <select class="form-control" id="penulisForm" name="penulis">
                                <option value="-">-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="genreForm" class="col-sm-2">Genre</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <select class="form-control" id="genreForm" name="genre">
                                <option value="-">-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2">Penerbit</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="penerbitForm" name="penerbit">
                            <option value="-">-</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-5 text-end">
                    <div class="offset-sm-2 col-sm-10">
                        <a href="admin.php" class="btn btn-secondary mr-1 col-sm-2">
                            <i class="fas fa-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" name="submit" class="btn btn-primary col-sm-3"><i class="fa-solid fa-cloud-arrow-down"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.get('model/genre.php', function(response) {
                $.each(response, function(key, value) {
                    $('#genreForm').append(
                        '<option value="' + value.id_genre + '">' + value.nama_genre + '</option>'
                    );
                });
            });
            $.get('model/penulis.php', function(response) {
                $.each(response, function(key, value) {
                    $('#penulisForm').append(
                        '<option value="' + value.id_penulis + '">' + value.nama_penulis + '</option>'
                    );
                });
            });
            $.get('model/penerbit.php', function(response) {
                $.each(response, function(key, value) {
                    $('#penerbitForm').append(
                        '<option value="' + value.id_penerbit + '">' + value.nama_penerbit + '</option>'
                    );
                });
            });

            $('form').submit(function(event) {
                event.preventDefault();
                var data = new FormData(this);
                console.log(data);
                $.ajax({
                    url: "model/add.php?action=create",
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        alert("Data buku berhasil ditambahkan");
                        location.replace("admin.php");
                    }
                }).fail(function() {
                    alert("error");
                });

            });
        });
    </script>
</body>

</html>
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

    <title>Edit buku</title>

    <link rel="stylesheet" href="style/create.css" />
</head>

<body>
    <div class="modal fade" id="genreModal" tabindex="-1" aria-labelledby="genreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-judul" id="genreModalLabel">Edit Genre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div>
                    <div class="row p-3" id="genreMdl">
                    </div>
                    <form>
                        <div class="col p-3">
                            <div>
                                <h6 for="judul" class="form-label">Genre</h6>
                                <input type="email" class="form-control" id="judul" placeholder="masukkan genre baru">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
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
                            <!-- <a class="btn btn-secondary "  data-bs-toggle="modal" data-bs-target="#genreModal"><i class="fa-solid fa-pen-to-square"></i></a> -->
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
                <input type="hidden" name="id_buku">
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
            const params = new URLSearchParams(document.location.search);
            const id = params.get("id");

            $.get('model/add.php?action=edit&id=' + id, function(data) {
                data = data[0];
                //console.log(data[0]);
                $("[name='id_buku']").val(id);
                $("[name='judul_buku']").val(data.judul_buku);
                $("[name='penulis']").val(data.id_penulis);
                $("[name='harga']").val(data.harga);
                $("[name='sinopsis']").val(data.sinopsis);
                $("[name='genre']").val(data.id_genre);
                $("[name='penerbit']").val(data.id_penerbit);
            });

            $('form').submit(function(event) {
                event.preventDefault();
                var data = new FormData(this);
                console.log(data);
                $.ajax({
                    url: "model/add.php?action=update",
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        alert("Data buku berhasil diupdate");
                        location.replace("admin.php");
                    }
                }).fail(function() {
                    alert("error");
                });

            });
            // get genre
            $.get('model/genre.php', function(response) {
                $.each(response, function(key, value) {
                    $('#genreForm').append(
                        '<option value="' + value.id_genre + '">' + value.nama_genre + '</option>'
                    );
                    // $('#genreMdl').append(
                    //     '<div class="col-6">' + value.genre +'</div>'+
                    //     '<div class="col-2"><a class="btn btn-xs" href=""><i class="text-danger fa-regular fa-trash-can"></i></a></div>'
                    // );
                });
            });

            // get penulis
            $.get('model/penulis.php', function(response) {
                $.each(response, function(key, value) {
                    $('#penulisForm').append(
                        '<option value="' + value.id_penulis + '">' + value.nama_penulis + '</option>'
                    );
                });
            });

            // get penerbit
            $.get('model/penerbit.php', function(response) {
                $.each(response, function(key, value) {
                    $('#penerbitForm').append(
                        '<option value="' + value.id_penerbit + '">' + value.nama_penerbit + '</option>'
                    );
                });
            });
        });
    </script>
</body>

</html>
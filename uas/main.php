<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    </script>
    <style>
        body{
            background-color: #DFF6FF;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aleo:wght@300&family=Poppins:wght@800&display=swap" rel="stylesheet">
    <title>Dashboard admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg header">
        <div class="container justify-content-between">
            <span class="navbar-brand mb-0 h1"></span>
            <button class="navbar-toggler mb-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: -100px;">
                    <li class="nav-item">
                        <img src="https://user-images.githubusercontent.com/30518462/173987387-04cb79d8-62a6-4867-8d8a-81e5af0b6c93.png" style="height: 50px; width:70px;">
                    </li>
                    <li class="nav-item">
                        <h4> <a class="nav-link active" id="men" aria-current="page" href="index.html">ViBook</a></h4>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid mb-4 pb-5">   
        <div class="row">
            <div class="col-sm-3 mt-4">    
                <form>            
                    <div class="card">
                        <div class="card-header text-black">
                            Cari
                        </div>
                        <div class="card-body card-left">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari Buku" aria-label="Search By Movie Title" aria-describedby="basic-addon2" id="judul_buku">
                            </div>                            
                            <div class="form-floating mb-3">
                                <select class="form-select"  id="genreForm" name="genre" aria-label="Floating label select example">
                                    <option value="">-</option>
                                </select>
                                <label for="genre">Cari genre buku</label>
                            </div>
                            <div class="form-floating">
                                <select name="sort" class="form-select sort" id="sort">
                                    <option  name="sort" value="judul_buku ASC">A-Z</option>
                                    <option  name="sort" value="judul_buku DESC">Z-A</option>
                                </select>
                                <label for="sort">Urutkan berdasarkan</label>
                            </div>
                        </div>
                    </div>
                    <button type="button" style="background-color: #1025A1" class="btn btn-primary w-100 mt-3" id="search"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                </div>      
            </form>


            <div class="col-sm-9">
                <div class="row mt-4" id="hasil">
                    <!-- content -->
                </div>
                <div class="d-grid mb-4">
                    <button class="btn btn-primary" style="background-color: #06283D;" id="loadmore">Load More</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let id = 0;

        function show(id) {
            $.get(`model/view.php?lastid=${id}`, function(response) {
                response = JSON.parse(response);
                response.forEach(element => {
                    $("#hasil").append(`<div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card">
                                                <a href= "deskripsi.php?id=${element.id_buku}"><img src="assets/${element.id_buku}.jpg" class="card-img-top image-crop"></a>
                                                <div class="card-body">
                                                    <h6 class="card-text">${element.judul_buku}</h6>
                                                    <div class="d-flex justify-content-between">
                                                        <p class="text-danger">Harga : ${element.harga}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`);
                });
            }).fail(function(xhr, status, error) {
                $("#hasil").html(`<div class='col-12'><div class='alert alert-danger' role='alert'><strong>Error ${xhr.status}!</strong>${xhr.responseText}</div></div>`);
            });
        }

        $("#loadmore").click(function() {
            id = id + 8;
            show(id);
        });
        $(document).ready(function() {
            show(id);
        });

        $(document).ready(function() {
            $.get('model/genre.php', function(response) {
                $.each(response, function(key, value) {
                    $('#genreForm').append(
                        '<option value="' + value.id_genre + '">' + value.nama_genre + '</option>'
                    );
                });
            });
        });
    </script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
        $(document).on('click', '#search', function() {
            var title = $('#judul_buku').val();
            var sort = $('#sort').val();
            var genre = $('#genreForm').val();

            $.ajax({
            url: 'cari.php',
            type: 'POST',
            data: {
                sort: sort,
                judul_buku: title,
                genre: genre
            },
            success: function(response) {
                $('#hasil').html(response);
            }
            });
        });
        });
    </script>
</body>

</html>
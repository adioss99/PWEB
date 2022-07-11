<?php
session_start();
if(isset($_SESSION["login"])){
    header("Location: admin.php");
}
require 'model/db.php';
if(isset($_POST["login"])){
    if(login($_POST) > 0 ){
        echo "
        <script>
            alert('Login berhasil')
        </script>";
    }else{
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aleo:wght@300&family=Poppins:wght@800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b6eec55ff3.js" crossorigin="anonymous"></script>
    <title>Login </title>
    <style>
        
        body{
            background-color: #06283D;
        }
        label{
            color: #06283D;
        }
    </style>
</head>

<body>            
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Email    : admin@mail.com<br>
            Password : asdf
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
    <section class="vh-100">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form action="" method="post">
                            <div class="card-body p-5">
                                <div class=" text-center">
                                    <i class="fa-solid fa-user-gear text-center fa-2xl"></i>
                                    <h3 class="mb-5">Admin Area</h3>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                    <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" style="border-color: #06283D;"/>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" style="border-color: #06283D;"/>
                                </div>
                                <?php if(isset($error)):?>
                                    <p style="color: red; font-style: italic">Email dan password salah
                                    <a class="btn-sm text-primary text-end" data-toggle="modal" data-target="#exampleModal">?akun</a></p>
                                <?php endif;?>
                                <button class="btn btn-primary btn-lg btn-block mt-3"style="background-color: #06283D;" type="submit" name="login">Login
                                </button>
                                <div class="mt-2">
                                    <a class="btn-sm text-danger" href="index.html"><i class="fa-solid fa-arrow-left" ></i> Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
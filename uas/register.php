<?php
require 'model/db.php';
session_start();

// if auth
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.html");
}

if (isset($_POST["register"])) {
    // var_dump($_POST);
    if (register($_POST) > 0) {
        echo "
        <script>
            alert('User baru berhasil ditambahkan')
        </script>";
        header("Location: admin.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/create.css">
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
    <title>Register | Admin</title>
    <style>
        body {
            background-color: #06283D;
        }

        label {
            color: #06283D;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form action="" method="POST">
                            <div class="card-body p-5">
                                <h3 class="text-center">Registrasi</h3>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="name">Nama</label>
                                    <input type="name" id="name" name="name" class="form-control form-control-lg" style="border-color: #06283D;" required />
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" style="border-color: #06283D;" required />
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" style="border-color: #06283D;" required />
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="password">Konfirmasi Password</label>
                                    <input type="password" id="password" name="password2" class="form-control form-control-lg" style="border-color: #06283D;" required />
                                </div>
                                <button class="btn btn-primary btn-lg btn-block mt-3" style="background-color: #06283D;" type="submit" name="register">Register</button>
                                <div class="mt-1">
                                    <a class="btn-sm text-danger" href="admin.php"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
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
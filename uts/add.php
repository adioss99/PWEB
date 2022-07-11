<?php

include('connect.php');

if(isset($_POST["submit"])){

    $fakultas = $_POST["fakultas"];
    $animo = $_POST["jumlahAnimo"];

    $query = "INSERT INTO uts (fakultas,jumlahAnimo) VALUES ('$fakultas','$animo')";

    mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn)>0){
        echo "<h3 class='text-success'>Data berhasil tersimpan</h3>";
    }else{
        echo "<h3 class='text-danger'>Data gagal tersimpan</h3>";
        
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

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
    <div class="container py-5">
        <h3 class="text-center">Tambah data</h3>
        <div class="row mb-3">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" class="form-control" name="fakultas" id="fakultas" required>
                </div>
                <div class="form-group pt-3">
                    <label for="jumlahAnimo">Jumlah Animo</label>
                    <input type="text" class="form-control" name="jumlahAnimo" id="jumlahAnimo"required>
                </div>
                <div class="form-group pt-3">
                    <a href="index.php" class="btn btn-secondary col-lg-1">Kembali</a>
                    <button type="submit" class="btn btn-primary  col-lg-2" name="submit"><i class="bi bi-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
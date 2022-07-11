<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "uas";

define("HOST",$host);
define("USER",$user);
define("PASS",$pass);
define("DB",$db);

$conn = mysqli_connect($host,$user,$pass,$db);

// registrasi
function register($data){
    global $conn;
    // var_dump($data);
    $name = strtolower($data["name"]);
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    
    // cek email
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    
    if (mysqli_fetch_assoc($result)){
        echo"
            <script>
                alert('Email sudah terdaftar');
            </script>
        ";
        return false;
    }

    if($password !== $password2){
        echo"
            <script>
                alert('Konfirmasi password tidak sesuai');
            </script>
        ";
        return false;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn,"INSERT INTO user VALUES(NULL,'$name','$email','$password')");
    return mysqli_affected_rows($conn);
}

// login
function login($data){
    global $conn;
    $email = $data["email"];
    $password = $data["password"];

    $result=mysqli_query($conn,"SELECT * FROM user WHERE email = '$email'");
    if(mysqli_num_rows($result) === 1 ){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            // set session
            $_SESSION["login"] = true;
            header("Location: admin.php");
            exit;
        }
    }
}
<!-- index.php ini meupakan halaman utama yang berisi header situs berita dan navbar -->
<!DOCTYPE html>
<html>
<head>
    <!-- Membuat judul tab -->
	<title>Membuat Halaman Web Dinamis Dengan PHP</title>
    <!-- mengimpor bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>
<body>
    <!-- berisi nama situs dan navbar -->
<div class="content ">
    <!-- judul situs dengan background light -->
	<header class="bg-light">
        <!-- posisi nama situs berada di tengah dengan padding 2rem -->
		<h1 class="judul text-center" style="padding: 2rem;">GET NEWS ID</h1>
	</header>
    <!-- navbar dengan background hitam dan tulisan berwarna putih -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
        <!-- container dengan padding left 3rem -->
        <div class="container-fluid" style="padding-left: 3rem;">
            <!-- setting pada navbar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <!-- isi menu pada navbar -->
                <div class="navbar-nav">
                    <!-- menu home akan ditampung pada variabel page dengan nama home -->
                    <a class="nav-link active" href="index.php?page=home">HOME</a>
                    <!-- menu ABOUT US akan ditampung pada variabel page dengan nama about -->
                    <a class="nav-link active" href="index.php?page=about">ABOUT US</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- berisi code php untuk memindahkan bagian menu -->
	<div class="body">
        <?php 
        // percabangan untuk mencari apakah halaman ada atau tidak
        if(isset($_GET['page'])){
            // mencari page
            $page = $_GET['page'];
            // switch untuk memindahkan page
            switch ($page) {
                // apabila pada menu navbar yang dipilih home, maka situs akan berubah ke page home
                case 'home':
                    include "page/home.php";
                    break;
                // apabila pada menu navbar yang dipilih about, maka situs akan berubah ke page about
                case 'about':
                    include "page/about.php";
                    break;	
                // default apabila halaman tidak ditemukan
                default:
                    echo "<center><h3>Halaman tidak di temukan !</h3></center>";
                    break;
            }
        // halaman default
        }else{
            include "page/home.php";
        }
        ?>
	</div>
</div>
</body>
</html>
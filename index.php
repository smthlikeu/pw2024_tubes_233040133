<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$wisata = query("SELECT * FROM wisata");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $wisata = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulinz</title>
    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "layout/header.php" ?>

    <div class="jumbotron jumbotron-fluid" id="home">
        <div class="container">
            <h1 class="display-4">SELAMAT DATANG</h1>
            <p class="lead">Temukan rekomendasi tempat wisata yang wajib anda kunjungi di bandung</p>
        </div>
    </div>

    <div class="container" id="konten">
    <div class="row wrap">
        <?php foreach ($wisata as $wst) : ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card" style="width: 100%;">
                    <img src="assets/img/<?= $wst['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $wst['judul'] ?></h5>
                        <p class="card-text"><?= $wst['deskripsi'] ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>








    <?php require "layout/footer.php" ?>
    <!-- bootsrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
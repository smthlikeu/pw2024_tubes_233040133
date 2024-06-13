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
    <style>

    </style>
</head>

<body>
    <div class="circle"></div>
    <div class="circle"></div>


    <?php require "layout/header.php" ?>

    <div class="jumbotron" id="home">
        <div class="container">
            <h1 class="display-4">SELAMAT DATANG</h1>
            <p class="lead">Temukan rekomendasi tempat wisata yang wajib anda kunjungi di bandung</p>
        </div>
    </div>

    <div class="group">
        <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
            <g>
                <path
                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                </path>
            </g>
        </svg>
        <input placeholder="Search" type="search" class="input" name="keyword" id="keyword">
    </div>


    <div class="container" id="konten">
        <div class="row wrap justify-content-start">
            <?php foreach ($wisata as $wst) : ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 custom-card">
                    <img src="assets/img/<?= $wst['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $wst['judul'] ?></h5>
                        <p class="card-text"><?= $wst['deskripsi'] ?></p>
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
    <script>
    // AJAX js
    document.getElementById('keyword').addEventListener('input', function() {
        var keyword = this.value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'search.php?keyword=' + keyword, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('konten').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
    </script>
</body>

</html>
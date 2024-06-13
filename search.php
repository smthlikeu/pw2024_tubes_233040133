<?php
require 'functions.php';

$keyword = $_GET['keyword'];
$wisata = cari($keyword);
?>

<div class="container" id="konten">
    <div class="row wrap justify-content-start">
        <?php foreach ($wisata as $wst) : ?>
        <div class="col-12 col-sm-6 col-md-4 mb-4">
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
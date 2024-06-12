<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}


require 'functions.php';
$wisata = query("SELECT * FROM wisata");
$users = query("SELECT * FROM users");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $wisata = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    <style>
    </style>
</head>

<body>


    <h1>Daftar wisata</h1>

    <a href="index.php">Halaman index</a>
    <br>

    <a href="tambah.php">
        <button class="tambah">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                </svg> Tambah Data Wisata
            </span>
        </button>
    </a>

    <form action="" method="post">

        <input type="text" name="keyword" size="40" autofocus="" placeholder="masukan keyword pencarian"
            autocomplete="off">
        <button type="submit" name="cari">Cari!</button>

    </form>

    <table class="table table-bordered">

        <tr>
            <th>no.</th>
            <th>gambar</th>
            <th>judul</th>
            <th>deskripsi</th>
            <th>aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $wisata as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <img src="assets/img/<?= $row["gambar"]; ?>" width="75" alt="">
            </td>
            <td><?= $row["judul"]  ?></td>
            <td><?= $row["deskripsi"]  ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>ubah
                </a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                    </svg>Hapus
                </a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Username</th>
            <th>email</th>
            <th>no hp</th>
            <th>Pasword</th>
            <th>Role</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $users as $user) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $user["username"]  ?></td>
            <td><?= $user["email"]  ?></td>
            <td><?= $user["no_hp"]  ?></td>
            <td><?= $user["password"]  ?></td>
            <td><?= $user["role"]  ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
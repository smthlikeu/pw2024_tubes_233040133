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
$users = query("SELECT * FROM users");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $wisata = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Table user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    <style>
    </style>
</head>

<body>

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
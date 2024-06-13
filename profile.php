<?php
session_start();
require 'functions.php';

// cek apakah pengguna sudah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// ambil username dari sesi
$username = $_SESSION['username'];

// ambil data pengguna dari database
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>

    </style>
</head>

<body>

    <a href="index.php" class="btn btn-primary back-to-index">Kembali ke Halaman Index</a>


    <div class="container">
        <div class="card-wrap">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="card-inner">
                <h1>Profil</h1>
                <div class="card-inner2">
                    <p>
                        Username: <?= htmlspecialchars($username); ?>
                    </p>
                    <p>
                        Email: <?= htmlspecialchars($user['email']); ?>
                    </p>
                    <p>
                        No HP: <?= htmlspecialchars($user['no_hp']); ?>
                    </p>
                </div>
            </div>
        </div>

        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>
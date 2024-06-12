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
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="card-inner">
                <h1>Profil</h1>
                <p><strong>Username:</strong> <?= htmlspecialchars($username); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                <p><strong>No HP:</strong> <?= htmlspecialchars($user['no_hp']); ?></p>
            </div>
        </div>
    </div>

</body>

</html>
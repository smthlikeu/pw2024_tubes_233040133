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
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .profile-container {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-container h1 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h1>Profil Pengguna</h1>
    <p><strong>Username:</strong> <?= htmlspecialchars($username); ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
    <p><strong>No HP:</strong> <?= htmlspecialchars($user['no_hp']); ?></p>
</div>

</body>
</html>

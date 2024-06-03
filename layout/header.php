<?php 
session_start();
require_once 'functions.php';
// Mengambil username dari sesi
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <!-- Bootsrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .navbar-blur {
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.3);
        /* Adjust the transparency */
    }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-blur fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="" alt="HayUlin" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Discover</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Trips</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Review</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">More</a>
                    </li>
                </ul>
                <form class="d-flex align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <?= $username; ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->






    <!-- bootsrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
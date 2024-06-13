<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'functions.php';
// Mengambil username dari sesi
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-blur fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Ulinz
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#explore">Explore</a>
                    </li>
                </ul>
                <form class="d-flex align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAfdJREFUSEu11UuoSFEUBuDvkphgIKG8ihCFgVAyQiEjjzEppZCipDBBjL1CKY+ZIlEiSYkMiJIByiMGSJJMGHidpXNq2519T13dPdtn/Xv9a+317//06OfV08/5dREMwkosw2xMrAt6jUe4jkv4USq0N4LFOIFJHV0+w0bcbsOVCHZhH50dNjl/YjsO5SRtBHuwt4+z2YKj6dmcYAlu9DF5HPtVzWU+HjQ5UoIBeILpLQRfsBOX69hqHMDQFuxdLGwjCLVcLFS/Dmez2Kb8OpL4AtyLfdrBhaqDVQWCkfiUxcbgXQF/GFtzgrcYVzgwCh+z2Gi8L+AfYk5O8A1DCgfW43QWC+0fL+A/Y0RO8LUwtMDFkHfUQw4xxLwOYliBIHINzwmeY8p/SDQ9+rRRYzrkM1jbQhDafoz7lSV8qONx/3MrH5pVPcroKF+nsCHvYDmuZsjoagVeFDqbhmuJCTawRbiVE8Q+Kp1Zo35jMl51XNtUhOE1Kzqd12xyqwjmmwn4POKRfS+QhOrOYU0dj+uMV/z3kbV1EN/CSfcnCd9UkjtS+39YyUDMqHUe5jY2wW7GsbSYkl3vrh2164fU5Aq73oZ4wf+s3hIsxUmM75hBCCEUc6cN11Xh4NqfQmEx/AmI4b9E2EEo6Aqig9bVRdBRfHe43wn+AAntVBlfO442AAAAAElFTkSuQmCC" />
                            <?= $username; ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <?php if ($role == 'admin') : ?>
                            <li><a class="dropdown-item" href="admin.php">Admin</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
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

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $wisata = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
    body {
        display: flex;
    }

    .wrapper {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    #sidebar {
        width: 250px;
        background: #343a40;
        min-height: 100vh;
    }

    #sidebar .sidebar-link {
        color: white;
    }

    .main {
        flex: 1;
        padding: 20px;
    }

    .d-none {
        display: none;
    }
    </style>
</head>

<body>
    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <a href="#">Ulinz</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" onclick="showSection('dashboard')">
                    <i class="lni lni-agenda"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" onclick="showSection('tabel-wisata')">
                    <i class="lni lni-agenda"></i>
                    <span>Tabel Wisata</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" onclick="showSection('tabel-users')">
                    <i class="lni lni-agenda"></i>
                    <span>Tabel Users</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
    <div class="wrapper">
        <div id="dashboard" class="main">
            <div class="text-center">
                <h1>Dashboard Admin</h1>
            </div>
        </div>
        <div id="tabel-wisata" class="main d-none">
            <h1>Daftar Wisata</h1>

        </div>
        <div id="tabel-users" class="main d-none">
            <h1>Daftar Users</h1>
            <!-- Konten tabel users akan dimasukkan di sini -->
            <!-- ... -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
    function showSection(sectionId) {
        document.querySelectorAll('.main').forEach(section => {
            section.classList.add('d-none');
        });
        document.getElementById(sectionId).classList.remove('d-none');
    }
    </script>
</body>

</html>
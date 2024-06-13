<?php 
require 'functions.php';

if ( isset($_POST["register"]) ) {
    if ( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('User baru berhasil ditambahkan');
                window.location.href = 'login.php';
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="css/registrasi.css">
</head>

<body>

    <div class="login-box">

        <form action="" method="post">
            <div class="user-box">
                <input type="text" name="username" id="username" maxlength="20" required="">
                <label for="username">Username</label>
            </div>

            <div class="user-box">
                <input type="email" name="email" id="email" required="">
                <label for="email">Email</label>
            </div>

            <div class="user-box">
                <input type="text" name="no_hp" id="no_hp" required="">
                <label for="no_hp">No HP</label>
            </div>

            <div class="user-box">
                <input type="password" name="password" id="password" required="">
                <label for="password">Password</label>
            </div>

            <div class="user-box">
                <input type="password" name="password2" id="password2" required="">
                <label for="password2">Konfirmasi Password</label>
            </div>

            <center>
                <button type="submit" name="register">Buat Akun<span></span></button>
            </center>

        </form>
        <a href="login.php" class="register-link">Sudah punya akun?</a>
    </div>

</body>

</html>
<?php 
session_start();
require 'functions.php';

// cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}



if( isset($_POST["login"]) ) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // // cek remember me
            if( isset($_POST["remember"]) ) {
                // buat cookie
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }
            if ($row['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit();
        }
    }
    $error = true;
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<?php if( isset($error) ) : ?>
    <script>
            alert('Username / Password Salah!');
    </script>
<?php endif; ?>


    <div class="login-box">
    
        <form action="" method="post">
            <div class="user-box">
                <input type="text" name="username" id="username" maxlength="20" required="">
                <label for="username">Username</label>
            </div>

            <div class="user-box">
                <input type="password" name="password" id="password" required="">
                <label for="password">Password</label>
            </div>

            <div class="container">
                <input type="checkbox" name="remember" id="remember" style="display: none;">
                <label for="remember" class="check">
                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                        <path d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                    Remember me
                </label>
            </div>
            
            <center>
                <button type="submit" name="login">Login<span></span></button>
            </center>
        </form>
        <a href="registrasi.php" class="register-link">Belum punya akun?</a>
    </div>

</body>
</html>

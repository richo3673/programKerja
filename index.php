<?php
include 'koneksiMVC.php';

error_reporting(0);

session_start();

if (isset($_SESSION['NIM'])) {
    header("Location: menu.php");
}

if (isset($_POST['submit'])) {
    $NIM = $_POST['NIM'];
    $password = md5($_POST['password']);
    global $mysqli;
    $sql = "SELECT * FROM users WHERE NIM='$NIM' AND password='$password'";
    $result = mysqli_query($mysqli, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['NIM'] = $row['NIM'];
        header("Location: menu.php");
    } else {
        echo "<script>alert('NIM atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Login</title>
</head>
<body>
<div class="alert alert-warning" role="alert">
    <?php echo $_SESSION['error']?>
</div>

<div class="container"><p class="login-text" style="font-size: 2rem; font-weight: 800;">Selamat Datang</p>
    <form action="" method="POST" class="login-email">
        <p class="login-text" style="font-size: 1.3;rem; font-weight: 800;">Silahkan Login untuk Melanjutkan</p>
        <div class="input-group">
            <input type="NIM" placeholder="NIM" name="NIM" value="<?php echo $NIM; ?>" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
        </div>
        <div class="input-group">
            <button name="submit" class="btn">Login</button>
        </div>
        <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
    </form>
</div>
</body>
</html>
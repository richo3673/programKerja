<?php

include 'koneksiMVC.php';

error_reporting(0);

session_start();

if (isset($_SESSION['NIM'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $NIM = $_POST['NIM'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $angkatan = $_POST['angkatan'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        global $mysqli;
        $sql = "SELECT * FROM users WHERE nama='$nama'";
        $result = mysqli_query($mysqli, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (NIM, nama, jabatan, angkatan, password)
                    VALUES ('$NIM', '$nama', '$jabatan', '$angkatan', '$password')";
            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $NIM = "";
                $nama = "";
                $jabatan = "";
                $angkatan = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! NIM Sudah Terdaftar.')</script>";
        }

    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
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

    <title>Niagahoster Register</title>
</head>
<body>
<div class="container">
    <form action="" method="POST" class="login-email">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
        <div class="input-group">
            <input type="text" placeholder="NIM" name="NIM" value="<?php echo $NIM; ?>" required>
        </div>
        <div class="input-group">
            <input type="text" placeholder="Nama" name="nama" value="<?php echo $nama; ?>" required>
        </div>
        <div class="input-group">
            <input type="text" placeholder="Jabatan" name="jabatan" value="<?php echo $jabatan; ?>" required>
        </div>
        <div class="input-group">
            <input type="text" placeholder="Angkatan" name="angkatan" value="<?php echo $angkatan; ?>" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
        </div>
        <div class="input-group">
            <button name="submit" class="btn">Register</button>
        </div>
        <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
    </form>
</div>
</body>
</html>
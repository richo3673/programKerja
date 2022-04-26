<?php

session_start();
if (!isset($_SESSION['NIM'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Berhasil Login</title>
</head>
<body>
<div class="container-logout">
    <form action="" method="POST" class="login-email">
        <?php echo "<h1>Selamat Datang, " . $_SESSION['NIM'] ."!". "</h1>"; ?>

<div class="input-group">
    <a href="logout.php" class="btn">Logout</a>
</div>
<div class="input-group">
    <a href="c_programkerja.php" class="btn">Menu Proker</a>
</div>
        <div class="input-group">
            <a href="c_user.php" class="btn">Edit Profil</a>
        </div>
    </form>
</div>
</body>
</html>
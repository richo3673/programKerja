<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Profil Anda</title>
</head>
<body>
<div class="container">
    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Edit Profile</p>
    <form action="c_user.php" method="get" name="cari" class="login-email">
        <div class="input-group">
            NIM Anda:
            <input type='text' name='NIM' value='<?php
            if (isset($user[0][0]["NIM"])) {
                echo $user[0][0]["NIM"];
            } ?>' readonly="readonly"><br>
        </div>
        <div class="input-group">
            Nama Anda: <input type='text' name='nama' value='<?php
            if (isset($user[0][0]["nama"])) {
                echo $user[0][0]["nama"];
            } ?>'><br>
        </div>
        <div class="input-group">
            Jabatan: <input type='text' name='jabatan' value='<?php
            if (isset($user[0][0]['jabatan'])) {
                echo $user[0][0]['jabatan'];
            } ?>'readonly="readonly"><br>
        </div>
        <div class="input-group">
            Angkatan: <input type='text' name='angkatan' value='<?php
            if (isset($user[0][0]['angkatan'])) {
                echo $user[0][0]['angkatan'];
            } ?>'
            ><br>
        </div>
        <br>
        <div class="input-group">
            <input type="submit" name="update" value="Update" class="btn">
        </div>
        <div class="input-group">
            <a href="menu.php" class="btn">&laquo; Kembali</a>
        </div>
    </form>
</div>
</body>
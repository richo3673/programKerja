<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Daftar Program Kerja</p>
    <table id="customers">
        <thead>
        <tr>
            <th>No</th>
            <th>Nomor Program Kerja</th>
            <th>Nama Program Kerja</th>
            <th>Surat Keterangan</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //    echo "<table><tr>",
        //    "<td>.$proker[0][nomorProgram].</td>",
        //    "<td>$proker[0][namaProgram]</td>",
        //    "<td>$proker[0][suratKeterangan]</td>",
        //    "</tr></table>";
        $count = count($proker[0]); //this will give you the count of elements of your array...
        for ($i = 1; $i < $count; $i++) //loop through the array..
        {
            echo "<tr><td>$i</td><td>" . $proker[0][$i]["nomorProgram"] . "</td><td>" . $proker[0][$i]["namaProgram"] . "</td><td>" . $proker[0][$i]["suratKeterangan"] . "</td></tr>";
        }

        ?>
        </tbody>
    </table>

<a href="menu.php" class="button button1">&laquo; Kembali</a>

</body>
</div>A
</html>
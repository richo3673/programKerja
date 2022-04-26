
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
</div>
<div class="container2">
        <form action="c_programkerja.php" method="post" name="input">
            <div class="input-group">
                <h2>Tambah proker</h2>
            Nomor Program Anda :
            <input type="text" name="nomorProgram" required><br>
                <p>Nama Program :&emsp;&emsp;&emsp;&ensp;<input type="text" name="namaProgram" required><br></p>
                <p>Surat Keterangan :&emsp;&emsp;&nbsp; <input type="text" name="suratKeterangan" required><br></p>
            <input type="submit" name="input" value="Input" class="button button2" >
        </form>

        <section>
            <h2>Hapus proker</h2>
            <form action="c_programkerja.php" method="post" name="delete">
                Nomor Program Anda: <input type="text" name="nomorProgram" required><br>
                <input type="submit" name="delete" value="Hapus" class="button button2">
            </form>
        </section>
        <section>
            <h2>Update proker</h2>
            <form action="c_programkerja.php" method="post" name="cari">
                Cari Nomor Program: <input type="text" name="nomorProgram2" value='<?php
                if (isset($search[0][0]["nomorProgram"])) {
                    echo $search[0][0]["nomorProgram"];
                }
                ?>' <?php if(isset($search[0][0]["nomorProgram"]) !="") echo "Readonly"; else echo "required"; ?> >
                <input type="submit" name="cari" value="Cari" class="button button2"><br>
                <form action="c_programkerja.php" method="post" name="update">
                    <p>Nama Program :&emsp;&emsp;&nbsp; <input type='text' name='namaProgram' value='<?php
                    if (isset($search[0][0]["namaProgram"])) {
                        echo $search[0][0]["namaProgram"];
                    } ?>'
                        ><br></p>
                    <p>Surat Keterangan :&emsp;&ensp;<input type='text' name='suratKeterangan' value='<?php
                    if (isset($search[0][0]["suratKeterangan"])) {
                        echo $search[0][0]["suratKeterangan"];
                    } ?>'
                        ><br></p>
                    <input type="submit" name="update" value="Update" class="button button2">
                </form>
            </form>
        </section>

</body>
</div>

    <a href="menu.php" class="button button1">&laquo; Kembali</a>
</div>
</html>
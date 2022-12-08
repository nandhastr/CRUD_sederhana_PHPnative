<!-- menyiapkan data dari database  -->
<?php 
//menyambungkan dengan function.php
require 'functions.php';
//menampilkan data dari tabel / query database 
$mahasiswa = query('SELECT * FROM Mahasiswa');

// //jika tombol cari di klik maka keyword akan - 
// muncul sesuai yang di ketikan di input pencarian
    if (isset($_POST["search"])) {
   
        $mahasiswa = cari ($_POST["keyword"]);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   

    <title>halaman admin</title>
</head>
<body style="background-color: lightblue;">
    <center><h1><b>DAFTAR MAHASISWA</b></h1></center><BR></BR>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukan yang anda cari" autocomplete="off"> 
        <button type="submit" name="search" class="btn btn-outline-secondary">Cari</button> <br> <br>
    </form>
    

    <button class="btn btn-outline-secondary"><a href="tambah.php" style="text-decoration: none; color: black;"> <b> Tambah data mahasiswa </b></a></button> <br><br>

    <table class="table table-dark table-hover" border="1">



        <tr>
            <th>No.</th>
            <th>aksi</th>
            <th>gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i=1; ?>
        <?php  foreach ($mahasiswa as $row) :?>
        <tr>
            <td><?= $i?></td>
            <td>
                <button class="btn btn-outline-secondary" ><a  style="text-decoration: none; color: white;" href="update.php?id=<?=$row['id'];?>"onclick="return confirm('Yakin mau diubah ?');">ubah</a></button>
                <button class="btn btn-outline-secondary"><a style="text-decoration: none; color: white; " href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin mau di hapus ?');">hapus</a></button> 
                
            </td>
            <td><img src="gambar/<?= $row["gambar"];?>" alt="" width="40"></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>

        <?php $i++; ?>
   <?php endforeach; ?>

    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
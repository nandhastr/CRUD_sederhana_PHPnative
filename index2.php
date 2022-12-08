<?php 
//koneksi ke database
    $conn = mysqli_connect("localhost","root","","datamhs");


    //ambil data dari tabel mahasisiwa / query
    //result ini variabel yang di sarankan oleh php
     $result = mysqli_query($conn,"SELECT * FROM mahasiswa");
   
     //ambil data (fetch) dari tabel mahasiswa
     //mysqli_fecth_row() // mengembalikan objek numerik
     //mysqli_fecth_assoc() //mengembalikan array asosiatif
     //mysqli_fetch_array() // mengembalikan array numerik dan assosiatif
     //mysqli_fetch_object // mengembalikan array objek

    //  while ($mhs = mysqli_fetch_assoc($result)){
    //     var_dump ($mhs);
    //  }
    
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
<body>
    <center><h1><b>DAFTAR MAHASISWA</b></h1></center><BR></BR>

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
        <?php  while ($row = mysqli_fetch_assoc($result)):  ?>
        <tr>
            <td><?= $i?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td><img src="gambar/<?= $row["gambar"];?>" alt="" width="40"></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>

        <?php $i++; ?>
   <?php endwhile; ?>

    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
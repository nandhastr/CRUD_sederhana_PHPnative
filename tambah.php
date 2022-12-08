<?php 
require 'functions.php';


//cek apakah tombol submit sudah di tekan ataau belum
if(isset($_POST['submit'])){
  
    
    //cek apakah data berhasil di tambahkan atau tidak
   if(tambah($_POST)>0){
    echo "
    <script>
        alert('data berhasil di tambahkan');
        document.location.href='index.php';
    </script>
    ";
   }else{
    echo "
    <script>
        alert('data gagal di tambahkan');
        document.location.href='index.php';
    </script>
    ";
   }

}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <!-- fungsi required adalah sbg alarm untuk mengisi wajib input -->
            <li>
                <label for="nim">NIM :</label>
                <input type="text" id="nim" name="nim" required autocomplete="off">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required autocomplete="off">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required autocomplete="off">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" required autocomplete="off">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="file" id="gambar" name="gambar" >
            </li>
            <li>
                <button type="submit" name="submit" class="btn btn-outline-primary" >Tambah Data</button>
            </li>
        </ul>

    </form>
</body>
</html>
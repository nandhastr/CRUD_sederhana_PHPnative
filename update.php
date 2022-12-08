<?php 
require 'functions.php';
//ambil data di url
$id= $_GET["id"];
//quuery data mhsswa berdasarkan id

$mhs = query ("SELECT * FROM mahasiswa WHERE id = $id")[0];


//cek apakah tombol submit sudah di tekan ataau belum
if(isset($_POST['submit'])){
  
    
    
    //cek apakah data berhasil di update atau tidak
   if(update($_POST)>0){
    echo "
    <script>
        alert('data berhasil di update');
        document.location.href='index.php';
    </script>
    ";
   }else{
    echo "
    <script>
        alert('data gagal di update');
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
    <title>Update data mahasiswa</title>
</head>
<body  style="background-color: lightgray;">
  <h1>Update Data Mahasiswa</h1>
   
    <form action="" method="post" enctype="multipart/form-data" >

     <input type="hidden" name="id" value="<?= $mhs["id"];?>">
     <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"];?>">
        
        <ul>
            <!-- fungsi required adalah sbg alarm untuk mengisi wajib input -->
            <li>
                <label for="nim">NIM :</label>
                <input type="text" id="nim" name="nim" required 
                value="<?=$mhs["nim"];?>" autocomplete="off">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required 
                value="<?=$mhs["nama"];?>" autocomplete="off">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required 
                value="<?=$mhs["email"];?>" autocomplete="off">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" required 
                value="<?=$mhs["jurusan"];?>" autocomplete="off">
            </li>
            <li>
                <label for="gambar">Gambar</label> <br>
                <img src="gambar/<?= $mhs["gambar"];?>" width="40"> <br>
                <input type="file" id="gambar" name="gambar" 
                >
            </li>
            <li>
                <button type="submit" name="submit" class="btn btn-outline-success">Update Data</button>
                <button class="btn btn-outline-danger"> <a href="index.php" >Batal</a> </button>
            </li>
        </ul>
       
    </form>


</body>
</html>
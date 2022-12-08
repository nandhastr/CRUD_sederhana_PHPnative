<?php 

//koneksi ke database
$conn = mysqli_connect("localhost","root","","datamhs");

    
function query($query){
    global $conn;
    $result= mysqli_query($conn, $query);
    $rows =[];
    while ($row= mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;

}

function tambah($data){
     global $conn;
    //ambil data dari form yang di input user
    //htmlspecialchars = untuk melindungi inputan dari user
    $nama =htmlspecialchars( $data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);

    //upload gambar
    $gambar = upload();
    if (!$gambar){

        return false;
    }

     
    //query insert data ke dslam tabel 
    $query = "INSERT INTO mahasiswa VALUES 
    ('','$nama' ,'$nim','$email','$jurusan','$gambar')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

    function upload(){
        $namafile= $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        //cek apakah ada gambar yang diupload atau tidak
        if($error===4){

            echo"<script>
            alert ('pilih gambar dulu');
            </script>";
            return false;
        }
        //cek jenis yang di upload
        $ekstensigambarvalid = ['jpg','jpeg','png'];
        $ekstensigambar = explode('.', $namafile);
        $ekstensigambar = strtolower (end($ekstensigambar));
        if(!in_array($ekstensigambar , $ekstensigambarvalid)){
            echo"<script>
            alert ('yang anda upload bukan gambar');
            </script>";
            return false;

        }
        //cek ukuran gambar
        if($ukuranfile > 10000000){
            echo"<script>
            alert ('ukuran gambar terlalu besar');
            </script>";
            return false;
        }
        //lolos pengecekan jenis file, ukuran slannjutnya proses upload gambar
        //generate nama gambar agar tidak sama dengan yang lain saat di upload
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensigambar;

         //lolos pengecekan jenis file, ukuran slannjutnya proses upload gambar
        move_uploaded_file($tmpName,'gambar/'.$namafilebaru);

        return $namafilebaru;



}

function hapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id= $id");

    return mysqli_affected_rows($conn);
}

function update ($data){
    global $conn;
    //ambil data dari form yang di input user
    //htmlspecialchars = untuk melindungi inputan dari user
    $id=$data["id"];
    $nama =htmlspecialchars( $data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);

    $gambarlama = htmlspecialchars( $data['gambarlama']);
    //cek apakah user upload gambar baru
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    }else{
        $gambar = upload();

    }
    

     
    //query update data ke dslam tabel 
    $query ="UPDATE mahasiswa SET 
        nama='$nama',
        nim='$nim',
        email='$email',
        jurusan='$jurusan',
        gambar='$gambar' WHERE id = $id ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

function cari($keyword){
    $query = "SELECT FROM mahasiswa WHERE
    nama LIKE '%$keyword%' OR 
    nim like '%$keyword%' OR
    email like '%$keyword%' OR
    jurusan like '%$keyword%' ";

    return query($query);
}

?>
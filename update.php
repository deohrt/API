<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $pengertian = $_POST["pengertian"];
    $ukuran = $_POST["ukuran"];
    $karakteristik = $_POST["karakteristik"];
    $sejarah = $_POST["sejarah"];
    
    $perintah = "UPDATE tbPlanet SET nama='$nama', pengertian='$pengertian', ukuran='$ukuran', karakteristik='$karakteristik', sejarah='$sejarah' WHERE id='$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data"; 
    }else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan. Gagal Menyimpan Data";
    }
}else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Data";
}

echo json_encode($response);
mysqli_close($connect);
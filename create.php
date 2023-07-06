<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["nama"];
    $pengertian = $_POST["pengertian"];
    $ukuran = $_POST["ukuran"];
    $karakteristik = $_POST["karakteristik"];
    $sejarah = $_POST["sejarah"];
    
    $perintah = "INSERT INTO tbPlanet(nama, pengertian, ukuran, karakteristik, sejarah) VALUES('$nama', '$pengertian', '$ukuran', '$karakteristik', '$sejarah')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
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
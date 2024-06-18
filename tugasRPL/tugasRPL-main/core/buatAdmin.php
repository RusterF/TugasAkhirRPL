<?php
include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];
$cek1 = mysqli_query($konek,"SELECT * from `admin` WHERE username = '$username' ") or die (mysqli_error($connect));

$cek = mysqli_num_rows($cek1);

if($cek >0){
    header("location:../page/registerAdmin.php?pesan=gagal");
}else{
    $data = mysqli_query($konek,"INSERT INTO `admin`( `username`, `password`) VALUES ('$username','$password')") or die (mysqli_error($connect));

    if($data){
        header("location:../page/loginAdmin.php");
    }else{
        header("location:../page/registerAdmin.php?pesan=gagal");
    }
}


?>
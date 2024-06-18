<?php
include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];
$nama = $_POST["nama"];
$cek1 = mysqli_query($konek,"SELECT * from `mekanik` WHERE username = '$username' ") or die (mysqli_error($connect));

$cek = mysqli_num_rows($cek1);
$row = mysqli_fetch_assoc($cek1);
if($cek >0 || $row["username"!==$username]){
    header("location:../page/admin/mekanik.php?pesan=kon");
}else{
    $data = mysqli_query($konek,"INSERT INTO `mekanik`( `username`, `password`, nama) VALUES ('$username','$password','$nama')") or die (mysqli_error($connect));

    if($data){
        header("location:../page/admin/mekanik.php");
    }else{
        header("location:../page/admin/mekanik.php");
    }
}
?>
<?php
include "koneksi.php";
session_start();
$username = $_POST["username"];
$password = $_POST["password"];
$data = mysqli_query($konek,"SELECT * from mekanik WHERE username = '$username' and password = '$password'") or die (mysqli_error($connect));

$cek = mysqli_num_rows($data);

if($cek >0){
    $row = mysqli_fetch_assoc($data);
    $_SESSION["id"]=$row["id"];
    header("location:../page/mekanik/dashboard.php");
}else{
    header("location:../page/loginMekanik.php?pesan=gagal");
}
?>
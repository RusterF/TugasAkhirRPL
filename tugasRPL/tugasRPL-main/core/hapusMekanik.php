<?php
include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];
$id = $_GET["id"];
$queri = mysqli_query($konek,"DELETE FROM `mekanik` WHERE id=$id") or die (mysqli_error($connect));
if($queri){
    header("location:../page/admin/mekanik.php");
}else{
    header("location:../page/admin/mekanik.php");
}
?>
<?php
include "koneksi.php";

session_start();
if (empty($_SESSION["id"])) {
    header("location:../login.php");
}

$id = $_GET["id"];
$queri = mysqli_query($konek,"DELETE FROM `permintaan` WHERE id=$id") or die (mysqli_error($connect));
if($queri){
    $queri = mysqli_query($konek, "UPDATE `mekanik` SET `status`='senggang' WHERE id=" . $_SESSION["id"]) or die(mysqli_error($connect));
    header("location:../page/mekanik/orderNow.php");
}else{
    header("location:../page/mekanik/orderNow.php");
}
?>
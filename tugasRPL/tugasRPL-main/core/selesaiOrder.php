<?php
include "koneksi.php";
session_start();
if (empty($_SESSION["id"])) {
    header("location:../login.php");
}
$id = $_GET["id"];
$biaya = $_POST["biaya"];
$detail = $_POST["detail"];
    $data = mysqli_query($konek, "UPDATE `permintaan` SET status='selesai', biaya='$biaya', detail='$detail' WHERE id=$id");

    if ($data) {
        $queri = mysqli_query($konek, "UPDATE `mekanik` SET `status`='senggang', total_permintaan=total_permintaan+1 WHERE id=" . $_SESSION["id"]) or die(mysqli_error($connect));
        header("location:../page/mekanik/orderNow.php");
    } else {
        header("location:../page/mekanik/orderNow.php");
    }
?>

<?php
include "koneksi.php";

$id = $_GET["id"];
    $data = mysqli_query($konek, "UPDATE `permintaan` SET status='pengerjaan' WHERE id=$id");

    if ($data) {
        header("location:../page/mekanik/orderNow.php");
    } else {
        header("location:../page/mekanik/orderNow.php");
    }
?>

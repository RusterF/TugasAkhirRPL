<?php
include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];
$nama = $_POST["nama"];
$id = $_GET["id"];

$cek1 = mysqli_query($konek, "SELECT * FROM `mekanik` WHERE username = '$username' ") or die (mysqli_error($connect));
$row = mysqli_fetch_assoc($cek1);
if (mysqli_num_rows($cek1) > 0 || $row["username"] === $username) {
    header("location:../page/admin/mekanik.php");
} else {
    $data = mysqli_query($konek, "UPDATE `mekanik` SET `nama`='$nama', `username`='$username', `password`='$password' WHERE id=$id");

    if ($data) {
        header("location:../page/admin/mekanik.php");
    } else {
        header("location:../page/admin/mekanik.php");
    }
}
?>

<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location:../login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bengkel Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex align-items-center">
                <button class="toggle-btn btn btn-light" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#" class="text-decoration-none text-light">Bengkel Website</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="./order.php" class="sidebar-link">
                        <i class="lni lni-inbox"></i>
                        <span>Permintaan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="./mekanik.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Mekanik</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../../core/logout.php" class="sidebar-link">
                        <i class="lni lni-exit"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="main p-3">
        <div class="container mt-5">
        <?php
            include '../../core/koneksi.php';
            $query = mysqli_query($konek, "SELECT o.*, m.nama AS nama_mekanik, a.username AS nama_admin
                                           FROM `permintaan` o
                                           INNER JOIN mekanik m ON o.id_mekanik = m.id
                                           INNER JOIN `admin` a ON o.id_admin = a.id
                                           WHERE o.id = '$_GET[id]'");

            while ($data = mysqli_fetch_array($query)) {
                $id_order = $data['id'];
                $status = $data['status'];
                $nama_pelanggan = $data['nama'];
                $plat_kendaraan_pelanggan = $data['plat_kendaraan'];
                $keluhan_order = $data['keluhan'];
                $tanggal_order = $data['tanggal'];
                $detail_perbaikan = $data['detail'];
                $biaya_order = $data['biaya'];
                $nama_mekanik = $data['nama_mekanik'];
                $nama_admin = $data['nama_admin'];

                echo "<div class='card mb-3'>";
                echo "<div class='card-header bg-secondary text-white'><h5>Order Details</h5></div>";
                echo "<div class='card-body bg-light'>";
                echo "<p><strong>ID Order:</strong> $id_order</p>";
                echo "<p><strong>Status:</strong> $status</p>";
                echo "<p><strong>Nama Pelanggan:</strong> $nama_pelanggan</p>";
                echo "<p><strong>Plat Kendaraan Pelanggan:</strong> $plat_kendaraan_pelanggan</p>";
                echo "<p><strong>Keluhan Order:</strong> $keluhan_order</p>";
                echo "<p><strong>Tanggal Order:</strong> $tanggal_order</p>";
                if ($detail_perbaikan !== NULL) {
                    echo "<p><strong>Detail Perbaikan:</strong> $detail_perbaikan</p>";
                } else {
                    echo "<p><strong>Detail Perbaikan:</strong> Belum Diperbaiki</p>";
                }
                if ($biaya_order !== NULL) {
                    echo "<p><strong>Biaya Order:</strong> $biaya_order</p>";
                } else {
                    echo "<p><strong>Biaya Order:</strong> Belum Ditentukan</p>";
                }
                echo "<p><strong>Nama Mekanik:</strong> $nama_mekanik</p>";
                echo "<p><strong>Username Admin:</strong> $nama_admin</p>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
        </div>
    </div>
    <footer class="bg-dark text-white py-3 mt-auto">
        <div class="container text-center">
            <p>Bengkel Website &copy; 2024</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>


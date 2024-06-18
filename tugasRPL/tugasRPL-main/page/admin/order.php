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
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-secondary text-white">
                                <h2 class="text-center">Tambah Order</h2>
                            </div>
                            <div class="card-body">
                                <form action="../../core/buatOrder.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label for="nama" class="form-label">Nama Pelanggan:</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="plat_kendaraan" class="form-label">Plat Kendaraan:</label>
                                        <input type="text" class="form-control" id="plat_kendaraan" name="plat_kendaraan" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="keluhan" class="form-label">Keluhan:</label>
                                        <input type="text" class="form-control" id="keluhan" name="keluhan" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="id_mekanik" class="form-label">Pilih Mekanik:</label>
                                        <select class="form-select form-select-sm" name="id_mekanik" id="id_mekanik" required>
                                            <option value="">Pilih Mekanik</option>
                                            <?php
                                            include '../../core/koneksi.php';
                                            $query = mysqli_query($konek, "SELECT * FROM mekanik WHERE status='senggang'");
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                echo '<option value="' . $row['id'] . '">' . $row['nama'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-secondary text-white">
                                <h2 class="text-center">Riwayat Order</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-dark table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id Order</th>
                                            <th scope="col">Nama Pelanggan</th>
                                            <th scope="col">Plat Kendaraan</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../core/koneksi.php';
                                        $query = mysqli_query($konek, "SELECT * FROM Permintaan");
                                        $totalHarga = 0;
                                        while ($data = mysqli_fetch_array($query)) {
                                            $totalHarga += $data['biaya'];
                                        ?>
                                            <tr>
                                                <td><?php echo $data['id']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['plat_kendaraan']; ?></td>
                                                <td>
                                                    <a class="btn btn-success" href="detail.php?id=<?php echo $data['id']; ?>">Detail</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h3 class="text-center">Total Pendapatan: <?php echo $totalHarga; ?></h3>
                    </div>
                </div>
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

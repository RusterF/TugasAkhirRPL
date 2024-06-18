<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location:../login.php");
}
?>

<?php
include '../../core/koneksi.php';
$id = $_GET['id'];
$queri = mysqli_query($konek, "SELECT *
                        FROM mekanik
                        WHERE id = '$id'");
$data = mysqli_fetch_array($queri);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bengkel Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-secondary text-white">
                                <h2 class="text-center">Edit Mekanik</h2>
                            </div>
                            <div class="card-body">
                                <form action="../../core/editMekanik.php?id= <?php echo $id ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label for="name">Nama Mekanik:</label>
                                        <input type="text" class="form-control" value="<?php echo $data['nama'] ?>"
                                            id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name">Username:</label>
                                        <input type="text" class="form-control" value="<?php echo $data['username'] ?>"
                                            id="username" name="username" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name">Password:</label>
                                        <input type="password" class="form-control"
                                            value="<?php echo $data['password'] ?>" id="password" name="password"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container mt-5">

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-secondary text-white">
                                <h2 class="text-center">Data Mekanik</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-dark table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Mekanik</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Password</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../core/koneksi.php';
                                        $query = mysqli_query($konek, "select * from mekanik");
                                        while ($data = mysqli_fetch_array($query)) { ?>
                                            <tr>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['username']; ?></td>
                                                <td><?php echo $data['password']; ?></td>

                                                <td>

                                                    <?php
                                                    echo '<a class="btn btn-success" href="./editMekanik.php?id=' . $data['id'] . '">Edit</a>';
                                                    echo " ";
                                                    echo '<a class="btn btn-danger" href="../../core/hapusMekanik.php?id=' . $data['id'] . '">Hapus</a>';
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
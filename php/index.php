<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'kelompok3web');
if (!$koneksi) {
    die('gagal koneksi ke database');
} else {
    echo "alert('koneksi berhasil')";
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="..\css\bootstrap.css">

    <title>Menu</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-secondary">
            <a class="navbar-brand" href="index.php">
                <img src="..\img\zero-two.jpg" alt="judul" width="30" height="30" class="d-inline-block align-top rounded-circle">
                Toko Ali 2
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="jumbotron mt-3">
            <div class="container text-center">
                <img src="../img/zero-two.jpg" alt="judul" width="25%" class="rounded-circle img-thumbnail mb-3">
                <h2>Sistem Informasi Penjualan</h2>
                <h1>Toko Ali 2</h1>
            </div>
        </section>
        <div class="album py-5 bg-white">
            <div class="container text-center ">
                <div class="row justify-content-around mb-3">
                    <div class="col-md-6">
                        <a href="barang.php">
                            <div class="card text-white bg-secondary mb-3">
                                <div class="card-header ">
                                    Tabel Barang
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="supplier.php">
                            <div class="card text-white bg-secondary mb-3">
                                <div class="card-header ">
                                    Tabel Supplier
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-around mb-3">
                    <div class="col-md-6">
                        <a href="transbeli.php">
                            <div class="card text-white bg-secondary mb-3">
                                <div class="card-header ">
                                    Tabel Transaksi Pembelian
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="transjual.php">
                            <div class="card text-white bg-secondary mb-3">
                                <div class="card-header ">
                                    Tabel Transaksi Penjualan
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="footer  mt-auto py-3 bg-secondary fixed-bottom">
        <div class="container text-center">
            <span class="text-light">&copy; 2022 | Toko Ali 2</span>
        </div>
    </footer>

    <script src="..\js\jquery-3.6.0.min.js"></script>
    <script src="..\js\bootstrap.bundle.min.js"></script>

</body>

</html>
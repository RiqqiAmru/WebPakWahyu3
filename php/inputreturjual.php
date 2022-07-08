<?php

function query($query)
{
  $conn = mysqli_connect('localhost', 'root', '', 'kelompok3web');

  // query isi tabel
  $result = mysqli_query($conn, $query);

  // ubah data ke array
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
// minta data barang dari database
$barang = query("SELECT * FROM returjual");


?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="..\bootstrap-4.6.1-dist\css\bootstrap.min.css">

  <title>Tabel Retur Jual</title>
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
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light bg-dark my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </header>

  <main>

    <body style="margin-top: 50px; background-color: #636363;">
      <br>
      <h1 style="text-align: center;">TABEL RETUR JUAL</h1>

      <div class="container">


        <div class="row ">
          <div class="col ">
            <form action="saveee.php" method="POST">
              <table class="table table-dark table-hover" style="width: 400px; margin-left: auto; margin-right: auto; margin-top: auto;">
                <thead class="thead-dark">
                  <th colspan="3" style="text-align: center;">Form Retur Jual</th>

                </thead>
                <tbody>
                  <tr>
                    <td>No retur Jual</td>
                    <td>:</td>
                    <td><input type="text" name="no-retur-jual"></td>
                  </tr>
                  <tr>
                    <td>Nota</td>
                    <td>:</td>
                    <td><input type="text" name="notaa"></td>
                  </tr>
                  <tr>
                    <td>Tanggal Retur</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal-retur"></td>
                  </tr>
                  <tr>
                    <td>Kode Barang</td>
                    <td>:</td>
                    <td><input type="text" name="kodebarang"></td>
                  </tr>
                  <tr>
                    <td>Qty</td>
                    <td>:</td>
                    <td><input type="number" name="qtyy"></td>
                  </tr>
                  <tr>
                    <td>Keterangan Barang</td>
                    <td>:</td>
                    <td><textarea name="ket-barang" cols="22" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td>Kode Pegawai</td>
                    <td>:</td>
                    <td><input type="text" name="kodepegawai"></td>
                  </tr>
                  <tr>
                    <td colspan="2"><input type="reset" value="HAPUS"></td>
                    <td align="right"><input type="submit" value="KIRIM / SIMPAN" name="t7" id="t7"></td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
          <div class="col ">

            <table class="table table-dark table-hover" style="width: auto; margin-left: auto; margin-right: auto; margin-top: auto;" border="1">
              <thead class="thead-dark">
                <th colspan="9" style="text-align: center;">Data Retur Jual</th>

              </thead>
              <tbody>
                <tr class="text-center">
                  <th scope="col">No</th>
                  <th scope="col">No Retur Jual </th>
                  <th scope="col">Nota</th>
                  <th scope="col">tanggal retur</th>
                  <th scope="col">Kode Barang</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Keterangan Barang</th>
                  <th scope="col">Kode Pegawai</th>
                </tr>
                <?php $no = 1;
                foreach ($barang as $b) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['no_retur_jual']; ?></td>
                    <td><?= $b['notaa']; ?></td>
                    <td><?= $b['tgl_retur']; ?></td>
                    <td><?= $b['kodebarang']; ?></td>
                    <td><?= $b['qtyy']; ?></td>
                    <td><?= $b['ket_barang']; ?></td>
                    <td><?= $b['kodepegawai']; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>

      <button type="button" class="btn btn-dark " style="margin-left: 70%;">
        <a class="btn btn-dark" href="index.php" role="button">Kembali ke Halaman Awal</a>
      </button>
  </main>
  <br>

  <footer class="footer  mt-auto py-3 bg-dark">

    <div class="container text-center">
      <span class="text-muted">&copy; 2022 | Toko Ali 2</span>
    </div>

  </footer>

  <script src="..\bootstrap-4.6.1-dist\js\jquery-3.6.0.min.js"></script>
  <script src="..\bootstrap-4.6.1-dist\js\bootstrap.bundle.min.js"></script>
  <script src="..\bootstrap-4.6.1-dist\js\popper.min.js"></script>

</body>

</html>
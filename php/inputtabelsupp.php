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
$barang = query("SELECT * FROM supplier");


?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="..\bootstrap-4.6.1-dist\css\bootstrap.min.css">

  <title>Tabel Supplier</title>
</head>
<style>
  .q {
    font-family: 'Courier New', Courier, monospace;
  }
</style>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: rgb(226, 166, 166);">
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

    <body style="margin-top: 50px; background-color: #fdffe0;">
      <br>
      <h1 style="text-align: center;" class="q">TABEL SUPPLIER</h1>

      <div class="container">

        <div class="row ">
          <div class="col ">
            <form action="saveee.php" method="POST">
              <table class="table table-striped table-danger table-hover border border-danger" style="width: 450px; margin-left: auto; margin-right: auto; margin-top: auto;">
                <thead class="thead-danger">
                  <th class="q" colspan="3" style="text-align: center;">Form Supplier</th>

                </thead>
                <tbody>

                  <tr class="q">
                    <td>Kode Supplier</td>
                    <td>:</td>
                    <td><input type="text" name="kodesupplier"></td>
                  </tr>
                  <tr class="q">
                    <td>Nama Supplier</td>
                    <td>:</td>
                    <td><input type="text" name="namasupplier"></td>
                  </tr>
                  <tr class="q">
                    <td>Alamat Supplier</td>
                    <td>:</td>
                    <td><input type="text" name="alamatsupplier"></td>
                  </tr>
                  <tr class="q">
                    <td>Kota Supplier</td>
                    <td>:</td>
                    <td><select name="kotasupp">
                        <option>Pekalongan</option>
                        <option>Pemalang</option>
                        <option>Batang</option>
                      </select></td>
                  </tr>
                  <tr>
                    <td colspan="2"><input type="reset" value="HAPUS"></td>
                    <td align="right"><input type="submit" value="KIRIM / SIMPAN" name="t5" id="t5"></td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
          <div class="col ">

            <table class="table table-striped table-danger table-hover border border-danger" style="width: auto; margin-left: auto; margin-right: auto; margin-top: auto;" border="1">
              <thead class="thead-danger">
                <th class="q" colspan="9" style="text-align: center;">Data Supplier</th>

              </thead>
              <tbody>
                <tr class="q" class="text-center">
                  <th scope="col">No</th>
                  <th scope="col">Kode Supplier</th>
                  <th scope="col">Nama Supplier</th>
                  <th scope="col">Alamat Supplier</th>
                  <th scope="col">Kota Supplier</th>
                </tr>

                <?php $no = 1;
                foreach ($barang as $b) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['kd_supp']; ?></td>
                    <td><?= $b['nm_supp']; ?></td>
                    <td><?= $b['alamat_supp']; ?></td>
                    <td><?= $b['kota_supp']; ?></td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>

          </div>
        </div>
      </div>


      <button type="button" class="btn btn-outline-danger " style="margin-left: 70%;">
        <a class="btn btn-outline-danger" href="index.php" role="button">Kembali ke Halaman Awal</a>
      </button>
  </main>
  <br>

  <footer class="footer  mt-auto py-3" style="background-color: rgb(226, 166, 166);">

    <div class="container text-center">
      <span class="text-muted">&copy; 2022 | Toko Ali 2</span>
    </div>

  </footer>

  <script src="..\bootstrap-4.6.1-dist\js\jquery-3.6.0.min.js"></script>
  <script src="..\bootstrap-4.6.1-dist\js\bootstrap.bundle.min.js"></script>
  <script src="..\bootstrap-4.6.1-dist\js\popper.min.js"></script>

</body>

</html>
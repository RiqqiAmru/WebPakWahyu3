<br><br><br>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'kelompok3web') or die(mysqli_error($conn));

function query($query)
{
  $conn = mysqli_connect('localhost', 'root', '', 'kelompok3web');

  // query isi tabel
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  // ubah data ke array
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
// minta data barang dari database
$barang = query("SELECT * FROM barang");

// input data
if (isset($_POST['Tambah'])) :
  $nama = htmlspecialchars($_POST['nama']);
  $stok = htmlspecialchars($_POST['stok']);
  $harga_jual = htmlspecialchars($_POST['harga_jual']);
  $harga_beli = htmlspecialchars($_POST['harga_beli']);

  $query = "INSERT INTO barang VALUES
  ('','$nama','$stok','$harga_jual','$harga_beli')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
  <script>
    alert('Data barang berhasil ditambah');
    document.location.href = 'barang.php';
  </script>
<?php endif;

// hapus data
if (isset($_GET['hapus'])) :
  $id = $_GET['hapus'];
  $query = "DELETE FROM barang WHERE kd_brg = '$id'";


  mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
  <script>
    alert('Data barang berhasil dihapus');
    document.location.href = 'barang.php';
  </script>
  <?php endif;

// ubah data
$aksi = 'Tambah';
$nama = null;
$stok = null;
$harga_jual = null;
$harga_beli = null;
$id = null;
$a = null;


if (isset($_GET['Ubah'])) :
  $id = $_GET['Ubah'];
  $ambil = query("SELECT * FROM barang WHERE kd_brg = '$id'");
  $aksi = 'Ubah';
  $id = $ambil[0]['kd_brg'];
  $nama = $ambil[0]['nm_brg'];
  $stok = $ambil[0]['stok'];
  $harga_jual = $ambil[0]['harga_jual'];
  $harga_beli = $ambil[0]['harga_beli'];
  $a = 'autofocus';

  if (isset($_POST['Ubah'])) :
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $query = "UPDATE barang SET
    nm_brg = '$nama',
    stok = '$stok',
    harga_jual = '$harga_jual',
    harga_beli = '$harga_beli'
    WHERE kd_brg = '$id'";
    $edit = mysqli_query($conn, $query) or die(mysqli_error($conn));
  ?>
    <script>
      alert('Data barang berhasil diubah');
      document.location.href = 'barang.php';
    </script>
<?php
  endif;
endif; ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="..\css\bootstrap.css">

  <title>Tabel Barang</title>
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
    <div class="container my-5 ">
      <div class="row">
        <div class="col-md-5 my-5 ">

          <!-- form input -->
          <form action="" method="POST">
            <h1><?= $aksi; ?> Barang </h1>
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
            <div class="form-group">
              <label for="nama">Nama Barang</label>
              <input type="text" class="form-control" id="nama" name="nama" <?= $a; ?> value="<?= $nama; ?>">
            </div>
            <div class="form-group">
              <label for="stok">Stok</label>
              <input type="number" class="form-control" id="stok" name="stok" value="<?= $stok; ?>">
            </div>
            <div class="form-group">
              <label for="harga">Harga Jual</label>
              <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="<?= $harga_jual; ?>">
            </div>
            <div class="form-group">
              <label for="harga">Harga Beli</label>
              <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="<?= $harga_beli; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="<?= $aksi; ?>" id="<?= $aksi; ?>"><?= $aksi; ?></button>
            <button type="reset" class="btn btn-warning">Reset</button>

            <?php if (isset($_GET['Ubah'])) : ?>
              <a class="btn btn-dark" href="barang.php">Batal</a>
            <?php endif ?>
          </form>
        </div>

        <!-- tabel -->
        <div class="col-md-7 my-5">
          <table class="table table-striped">
            <thead>
              <tr>
                <th colspan="6" class="text-center">Data Tabel Barang</th>
              </tr>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (empty($barang)) : ?>
                <tr style="text-align: center; color: red;">
                  <td colspan="5"><em>Data barang kosong</em></td>
                </tr>
              <?php endif; ?>
              <?php
              $no = 1;
              foreach ($barang as $b) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $b['nm_brg']; ?></td>
                  <td><?= $b['stok']; ?></td>
                  <td>Rp.<?= $b['harga_jual']; ?></td>
                  <td>Rp.<?= $b['harga_beli']; ?></td>
                  <td>
                    <a href="?Ubah=<?= $b['kd_brg']; ?>">Ubah</a> |
                    <a href="?hapus=<?= $b['kd_brg']; ?>" onclick="confirm('apakah anda yakin?')">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <button type="button" class="btn btn-dark " style="margin-left: 70%;">
          <a class="btn btn-dark" href="index.php" role="button">Kembali ke Halaman Awal</a>
        </button>
      </div>
    </div>

  </main>

  <footer class="footer fixed-bottom  mt-auto py-3 bg-secondary ">
    <div class="container text-center">
      <span class="text-light">&copy; 2022 | Toko Ali 2</span>
    </div>
  </footer>

  <script src="..\js\jquery-3.6.0.min.js"></script>
  <script src="..\js\bootstrap.bundle.min.js"></script>

</body>

</html>
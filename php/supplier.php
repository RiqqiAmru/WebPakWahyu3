<br>
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
// minta data supplier dari database
$supplier = query("SELECT * FROM supplier");

// input data
if (isset($_POST['Tambah'])) :
  $nama = htmlspecialchars($_POST['nama']);
  $alamat = htmlspecialchars($_POST['alamat']);

  $query = "INSERT INTO supplier VALUES
  ('','$nama','$alamat')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
  <script>
    alert('Data supplier berhasil ditambah');
    document.location.href = 'supplier.php';
  </script>
<?php endif;

// hapus data
if (isset($_GET['hapus'])) :
  $id = $_GET['hapus'];
  $query = "DELETE FROM supplier WHERE kd_supp = '$id'";


  mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
  <script>
    alert('Data supplier berhasil dihapus');
    document.location.href = 'supplier.php';
  </script>
  <?php endif;

// ubah data
$aksi = 'Tambah';
$nama = null;
$alamat = null;
$id = null;
$a = null;


if (isset($_GET['Ubah'])) :
  $id = $_GET['Ubah'];
  $ambil = query("SELECT * FROM supplier WHERE kd_supp = '$id'");
  $aksi = 'Ubah';
  $id = $ambil[0]['kd_supp'];
  $nama = $ambil[0]['nm_supp'];
  $alamat = $ambil[0]['alamat_supp'];
  $a = 'autofocus';

  if (isset($_POST['Ubah'])) :
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $query = "UPDATE supplier SET
    nm_supp = '$nama',
    alamat_supp = '$alamat'
    WHERE kd_supp = '$id'";
    $edit = mysqli_query($conn, $query) or die(mysqli_error($conn));
  ?>
    <script>
      alert('Data supplier berhasil diubah');
      document.location.href = 'supplier.php';
    </script>
<?php
  endif;
endif; ?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="..\css\bootstrap.css">
  <title>Tabel Supplier</title>
  <style>
    .q {
      font-family: 'Courier New', Courier, monospace;
    }
  </style>
</head>

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
      </div>
    </nav>
  </header>

  <main>

    <body style="margin-top: 50px; background-color: #fdffe0;">
      <br>
      <h1 style="text-align: center;" class="q"> SUPPLIER</h1><br>
      <div class="container">
        <div class="row ">
          <div class="col-md-5 ">
            <form action="" method="POST">
              <table class="table table-striped table-danger table-hover border border-danger" style="width: 450px; margin-left: auto; margin-right: auto; margin-top: auto;">
                <thead class="thead-danger">
                  <th class="q" colspan="3" style="text-align: center;"><?= $aksi; ?> Supplier</th>
                </thead>
                <tbody>
                  <input type="hidden" name="id" id="id" value="<?= $id; ?>">
                  <tr class="q">
                    <td>Nama Supplier</td>
                    <td>:</td>
                    <td><input type="text" name="nama" <?= $a; ?> value="<?= $nama; ?>"></td>
                  </tr>
                  <tr class="q">
                    <td>Alamat Supplier</td>
                    <td>:</td>
                    <td><input type="text" name="alamat" value="<?= $alamat; ?>"></td>
                  </tr>
                </tbody>
              </table>
              <button class="btn btn-outline-danger " type="button">RESET</button>
              <button class="btn btn-outline-danger" type="submit" name="<?= $aksi; ?>" id="<?= $aksi; ?>"><?= $aksi; ?></button>
              <?php if (isset($_GET['Ubah'])) : ?>
                <a href="supplier.php" class="btn btn-outline-danger">BATAL</a>
              <?php endif; ?>
            </form>
          </div>
          <div class="col-md-7 ">
            <table class="table table-striped table-danger table-hover border border-danger" style="width: auto; margin-left: auto; margin-right: auto; margin-top: auto;" border="1">
              <thead class="thead-danger">
                <tr>
                  <th class="q" colspan="9" style="text-align: center;">Data Supplier</th>
                </tr>
                <tr class="q" class="text-center">
                  <th scope="col">No</th>
                  <th scope="col">Nama Supplier</th>
                  <th scope="col">Alamat Supplier</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if (empty($supplier)) : ?>
                  <tr style="text-align: center; color: red;">
                    <td colspan="5"><em>Data supplier kosong</em></td>
                  </tr>
                <?php endif; ?>
                <?php
                $no = 1;
                foreach ($supplier as $b) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['nm_supp']; ?></td>
                    <td><?= $b['alamat_supp']; ?></td>
                    <td>
                      <a href="?Ubah=<?= $b['kd_supp']; ?>">Ubah</a> |
                      <a href="?hapus=<?= $b['kd_supp']; ?>" onclick="confirm('apakah anda yakin?')">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>

          </div>
        </div>
      </div>

      <br><br><br>
      <button type="button" class="btn btn-outline-danger " style="margin-left: 70%;">
        <a class="btn btn-outline-danger" href="index.php" role="button">Kembali ke Halaman Awal</a>
      </button>
  </main>
  <br>

  <footer class="footer  mt-auto py-3 fixed-bottom" style="background-color: rgb(226, 166, 166);">
    <div class="container text-center">
      <span class="text-muted">&copy; 2022 | Toko Ali 2</span>
    </div>
  </footer>

  <script src="..\js\jquery-3.6.0.min.js"></script>
  <script src="..\js\bootstrap.bundle.min.js"></script>

</body>

</html>
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
$transJual = query("SELECT * FROM trans_jual_view ORDER BY nota");
$barang = query("SELECT * FROM barang");

// tambah
if (isset($_POST['tambah'])) :
  $nota = query('SELECT max(nota) AS nota FROM trans_jual');
  $nota = $nota[0]['nota'];

  $kd = $_POST['barang'];
  $jumlah = $_POST['jumlah'];

  $query = query("SELECT * FROM barang WHERE kd_brg = '$kd'");
  $harga = $query[0]['harga_jual'];
  $stok = $query[0]['stok'];

  if ($jumlah > $stok) {
    die('Barang yang dibeli tidak boleh melebihi stok gudang');
  }

  $bayar = $harga * $jumlah;

  $query = "INSERT INTO detail_jual VALUES ('$nota','$kd','$harga','$jumlah','$bayar')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  $query = "UPDATE barang set stok = ( stok -'$jumlah') WHERE kd_brg='$kd'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
  <script>
    if (!confirm('masukkan data lagi?')) {
      document.location.href = 'detailjual.php?detail=<?= $nota; ?>&total='
    }
  </script>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <title>Tambah Transaksi</title>
</head>

<body>
  <div class="container">
    <h3>Tambah Detail Barang</h3>
    <form action="" method="POST">
      <div class="form-row">
        <div class="col-md-4">
          <label for="barang">Barang</label>
          <select name="barang" id="barang" class="form-control">
            <option selected></option>
            <?php foreach ($barang as $s) : ?>
              <option value="<?= $s['kd_brg']; ?>"><?= $s['nm_brg']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-2 mb-2">
          <label for="jumlah">Jumlah</label>
          <input type="number" name="jumlah" id="jumlah" class="form-control">
        </div>
      </div>
      <button type="submit" name="tambah" class="btn btn-dark">Tambah</button>
    </form>
  </div>
</body>

</html>
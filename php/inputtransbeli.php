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
$transBeli = query("SELECT * FROM trans_beli_view ORDER BY no_faktur");
$supplier = query("SELECT * FROM supplier");
$barang = query("SELECT * FROM barang");

// tambah
if (isset($_POST['tambah'])) {
  var_dump($_POST);
}
?>
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
    <form action="" method="POST">
      <input type="hidden" name="no_faktur" id="no_faktur">
      <div class="form-group">
        <label for="inputState">Nama Supplier</label>
        <select id="inputState" name="supplier" class="form-control">
          <option selected></option>
          <?php foreach ($supplier as $s) : ?>
            <option value="<?= $s['kd_supp']; ?>"><?= $s['nm_supp']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Barang</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <select i name="barang" class="form-control">
                <option selected></option>
                <?php foreach ($barang as $s) : ?>
                  <option value="<?= $s['kd_brg']; ?>"><?= $s['nm_brg']; ?></option>
                <?php endforeach; ?>
              </select>
            </td>
            <td>
              <fieldset disabled>
                <input type="number">
              </fieldset>
            </td>
            <td><input type="number" name="jumlah" id="jumlah"></td>
            <td>
              <fieldset disabled>
                <input type="number">
              </fieldset>
            </td>
          </tr>

          <tr>
            <th colspan="3" class="text-center">TOTAL</th>
            <th>Rp.</th>
          </tr>
        </tbody>
      </table>
      <button type="submit" name="tambah" class="btn btn-dark">Tambah</button>
    </form>
  </div>
</body>

</html>
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
$id = $_GET['detail'];
$transBeli = query("SELECT * FROM trans_beli_view WHERE no_faktur = '$id'");
$detailBeli = query("SELECT * FROM detail_beli_view WHERE no_faktur = '$id'");
$hari = $transBeli[0]['tgl'];
$bulan = $transBeli[0]['bulan'];
$tahun = $transBeli[0]['tahun'];
$jam = $transBeli[0]['jam'];
$tgl = $hari . " " . $bulan . " " . $tahun . " " . $jam;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <title>Detail Beli</title>
</head>

<body>
  <div class="container">
    <div class="card text-center">
      <div class="card-header">
        Toko Ali 2
      </div>
      <div class="card-body">
        <h5 class="card-title">Faktur Pembelian</h5>
        <article class="card-text text-right"><?= $tgl; ?></article>
        <article class="card-text text-left">No Faktur : <?= $transBeli[0]['no_faktur']; ?></article>
        <article class="card-text text-left">Supplier : <?= $transBeli[0]['nm_supp']; ?></article>
        <br>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Barang</th>
              <th scope="col">Harga</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $total = 0;
            foreach ($detailBeli as $d) :
              $total += $d['bayar'];
            ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nm_brg']; ?></td>
                <td>Rp.<?= $d['harga']; ?></td>
                <td><?= $d['jumlah']; ?></td>
                <td>Rp.<?= $d['bayar']; ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <th colspan="4" class="text-center">TOTAL</th>
              <th>Rp.<?= $total; ?></th>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-muted">
        Jl. Keindahan no.27 Kepuntren
      </div>
    </div>
    <br><br>
    <div class="text-right">
      <a href="transbeli.php" class="btn btn-secondary ">Kembali</a>
    </div>
  </div>
</body>

</html>
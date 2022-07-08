
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="..\bootstrap-4.6.1-dist\css\bootstrap.min.css" >

    <title  >Menu</title>
  </head>
  <body>
    
  <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-secondary">
            <a class="navbar-brand" href="index.php">
                <img src="..\img\zero-two.jpg" alt="judul" width="30" height="30" class="d-inline-block align-top rounded-circle" >
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
<br><br><br>
<table align='center' >


      <?php
$connection= mysqli_connect('localhost','root','','kelompok3web');
//localhost bisa diganti 192.168 (id)
//root  itu user
// ''   sandi
//'dt_sw'  database
if(mysqli_connect_error()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}else{
	echo "<p align='center'> ^_^ </p>";
}
if(isset($_POST['t1']))
    {   echo '<th>Hasil Input Tabel Barang </th>';
		echo '<tr>';
        echo "<td>Kode Barang</td>
        <td>:</td>
        <td>".$_POST['kd-brg'] ."</td>";
        echo '</tr>';
        echo "<tr>
        <td>Nama Barang</td>
        <td>:</td>
        <td>".$_POST['nm-brg'] ."</td>
            </tr>";
        echo '<tr>';
        echo "<td>Satuan</td>
        <td>:</td>
        <td>".$_POST['satuan'] ."</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>Harga</td>
        <td>:</td>
        <td>Rp.".$_POST['harga'] ."</td>  </tr>";
        echo '<tr> <td>';
        echo '<a class="btn btn-light" href="inputbarang.php" role="button" >Input Lagi Tabel Barang</a>';
        echo '</td></tr>';
        
    }
    



    


if(isset($_POST['t2']))
    {
        echo '<th>Hasil Input Tabel Kota</th>';
		echo '<tr>';
        echo "<td>Nama Kota</td>
        <td>:</td>
        <td>".$_POST['Nama--Kota'] ."</td>";
        echo '</tr>';
        echo "<tr>
        <td>Provinsi</td>
        <td>:</td>
        <td>".$_POST['Provinsi'] ."</td>
            </tr>";
        echo '<tr> <td>';
        echo '<a class="btn btn-light" href="inputtabelkota.php" role="button" >Input Lagi Tabel Kota</a>';
        echo '</td></tr>';
    }
if(isset($_POST['t3']))
    {
        echo '<th>Hasil Input Tabel Kustomer </th>';
		echo '<tr>';
        echo "<td>Kode Customer</td>
        <td>:</td>
        <td>".$_POST['Kode--Customer'] ."</td>";
        echo '</tr>';
        echo "<tr>
        <td>Nama Customer</td>
        <td>:</td>
        <td>".$_POST['Nama--Customer'] ."</td>
            </tr>";
        echo '<tr>';
        echo "<td>Alamat Customer</td>
        <td>:</td>
        <td>".$_POST['Alamat--Customer'] ."</td>";
        echo '</tr>';
        echo '<tr> <td>';
        echo '<a class="btn btn-light" href="inputtabelcust.php" role="button" >Input Lagi Tabel Kustomer</a>';
        echo '</td></tr>';
    }
if(isset($_POST['t4']))
    {
        echo '<th>Hasil Input Tabel Pegawai </th>';
		echo '<tr>';
        echo "<td>Kode Pegawai</td>
        <td>:</td>
        <td>".$_POST['kdpg'] ."</td>";
        echo '</tr>';
        echo "<tr>
        <td>Nama Pegawai</td>
        <td>:</td>
        <td>".$_POST['nmpg'] ."</td>
            </tr>";
        echo '<tr>';
        echo "<td>Alamat Pegawai</td>
        <td>:</td>
        <td>".$_POST['alpg'] ."</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>Kota Pegawai</td>
        <td>:</td>
        <td>".$_POST['ktpg'] ."</td>  </tr>";
        echo '<tr> <td>';
        echo '<a class="btn btn-light" href="inputtabelpega.php" role="button" >Input Lagi Tabel Pegawai</a>';
        echo '</td></tr>';
    }
if(isset($_POST['t5']))
    {
        echo '<th>Hasil Input Tabel Supplier </th>';
		echo '<tr>';
        echo "<td>Kode Supplier</td>
        <td>:</td>
        <td>".$_POST['kodesupplier'] ."</td>";
        echo '</tr>';
        echo "<tr>
        <td>Nama Supplier</td>
        <td>:</td>
        <td>".$_POST['namasupplier'] ."</td>
            </tr>";
        echo '<tr>';
        echo "<td>Alamat Supplier</td>
        <td>:</td>
        <td>".$_POST['alamatsupplier'] ."</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>Kota Supplier</td>
        <td>:</td>
        <td>".$_POST['kotasupp'] ."</td>  </tr>";
        echo '<tr> <td>';
        echo '<a class="btn btn-light" href="inputtabelsupp.php" role="button" >Input Lagi Tabel Supplier</a>';
        echo '</td></tr>';
    }
if(isset($_POST['t6']))
    {        
        echo '<th>Hasil Input Tabel Trans Jual </th>';
		echo '<tr>';
        echo "<td>Nota</td>
        <td>:</td>
        <td>".$_POST['nota'] ."</td>";
        echo '</tr>';
        echo "<tr>
        <td>Tanggal Nota</td>
        <td>:</td>
        <td>".$_POST['tanggal-nota'] ."</td>
            </tr>";
        echo '<tr>';
        echo "<td>Kode Barang</td>
        <td>:</td>
        <td>".$_POST['kode-barang'] ."</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>Jumlah</td>
        <td>:</td>
        <td>".$_POST['jumlah'] ."</td>  </tr>";
        echo '<tr>';
        echo "<td>Harga Jual</td>
        <td>:</td>
        <td>Rp.".$_POST['harga-jual'] ."</td>  </tr>";
        echo '<tr>';
        echo "<td>Kode Pegawai</td>
        <td>:</td>
        <td>".$_POST['kode-pegawai'] ."</td>  </tr>";
        echo '<tr> <td>';
        echo '<a class="btn btn-light" href="inputtransjual.php" role="button" >Input Lagi Tabel Trans Jual</a>';
        echo '</td></tr>';
    }
if(isset($_POST['t7']))
    {        
        echo '<th>Hasil Input Tabel Retur Jual </th>';
		echo '<tr>';
        echo "<td>No Retur Jual</td>
        <td>:</td>
        <td>".$_POST['no-retur-jual'] ."</td>";
        echo '</tr>';
        echo "<tr>
        <td>Nota</td>
        <td>:</td>
        <td>".$_POST['notaa'] ."</td>
            </tr>";
        echo '<tr>';
        echo "<td>Tanggal retur</td>
        <td>:</td>
        <td>".$_POST['tanggal-retur'] ."</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>Kode Barang</td>
        <td>:</td>
        <td>".$_POST['kodebarang'] ."</td>  </tr>";
        echo '<tr>';
        echo "<td>Qty</td>
        <td>:</td>
        <td>".$_POST['qtyy'] ."</td>  </tr>";
        echo '<tr>';
        echo "<td>Keterangan Barang</td>
        <td>:</td>
        <td>".$_POST['ket-barang'] ."</td>  </tr>";
        echo '<tr>';
        echo "<td>Kode Pegawai </td>
        <td>:</td>
        <td>".$_POST['kodepegawai'] ."</td>  </tr>";
        echo '<tr> <td>';
        echo '<a class="btn btn-light" href="inputreturjual.php" role="button" >Input Lagi Tabel Retur Jual</a>';
        echo '</td></tr>';
    }
if(isset($_POST['t8']))
    {
        echo '<th>Hasil Input Tabel Trans Beli </th>';
		echo '<tr>';
        echo "<td>Kode Supplier</td>
        <td>:</td>
        <td>".$_POST['Kode--Supplier'] ."</td>";
        echo '</tr>';
        echo "<tr>
        <td>Kode Barang</td>
        <td>:</td>
        <td>".$_POST['Kode--Barang'] ."</td>
            </tr>";
        echo '<tr>';
        echo "<td>Jumlah</td>
        <td>:</td>
        <td>".$_POST['Jumlahh'] ."</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>Harga Beli</td>
        <td>:</td>
        <td>Rp.".$_POST['Harga--Beli'] ."</td>  </tr>";
        echo '<tr> <td>';
        echo '<a class="btn btn-light" href="inputtransbeli.php" role="button" >Input Lagi Tabel Trans Beli</a>';
        echo '</td></tr>';
    }
if(isset($_POST['t9']))
    {    
        echo '<th>Hasil Input Tabel Retur Beli </th>';
		echo '<tr>';
        echo "<td>No Retur Beli</td>
        <td>:</td>
        <td>".$_POST['No-Retur-Beli'] ."</td>";
        echo '</tr>';
        echo "<tr>
        <td>No Faktur </td>
        <td>:</td>
        <td>".$_POST['No--Faktur'] ."</td>
            </tr>";
        echo '<tr>';
        echo "<td>Tanggal retur</td>
        <td>:</td>
        <td>".$_POST['Tanggal--Retur'] ."</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>Kode Barang</td>
        <td>:</td>
        <td>".$_POST['Kode--Barangg'] ."</td>  </tr>";
        echo '<tr>';
        echo "<td>Qty</td>
        <td>:</td>
        <td>".$_POST['Qtyyyy'] ."</td>  </tr>";
        echo '<tr>';
        echo "<td>Keterangan Barang</td>
        <td>:</td>
        <td>".$_POST['ktrbrg'] ."</td>  </tr>";
        echo '<tr> <td>';
        echo '<a class="btn btn-light" href="inputreturbeli.php" role="button" >Input Lagi Tabel Retur Beli</a>';
        echo '</td></tr>';
        
    }



?>

<br>
<tr>
    <td colspan=3>
     <a class="btn btn-outline-dark" href="index.php" role="button" >Kembali ke Halaman Awal</a>   
</tr>   
    </td>
 


</table>
      </main>



<footer class="footer  mt-auto py-3 bg-dark">
        <div class="container text-center">
          <span class="text-muted">&copy; 2022 | Toko Ali 2</span>
        </div>
      </footer>


  <!-- navigasi -->
  <!-- akhir navigasi -->

<!-- menu utama -->
 
<!-- akhir menu utama -->

<!-- footer -->
<!-- akhir footer -->




    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="..\bootstrap-4.6.1-dist\js\jquery-3.6.0.min.js" ></script>
    <script src="..\bootstrap-4.6.1-dist\js\bootstrap.bundle.min.js" ></script>
    <script src="..\bootstrap-4.6.1-dist\js\popper.min.js" ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>
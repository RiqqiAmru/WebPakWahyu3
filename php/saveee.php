<?php
//koneksi ke databases
include 'connection.php';
//BARANG    $ = $_POST [''];
/*
$kd_brg = $_POST ['kd-brg'];
$nm_brg = $_POST ['nm-brg'];
$satuan = $_POST ['satuan'];
$harga= $_POST ['harga'];
*/



if(isset($_POST['t1']))
    {
    $kd_brg = $_POST['kd-brg']; 
    $nm_brg = $_POST['nm-brg']; 
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga']; 

mysqli_query ($connection,"INSERT INTO barang values 
('$kd_brg','$nm_brg','$satuan','$harga')");

}elseif(isset($_POST['t1delete'])){
    $kd_brg = $_POST['kd-brg'];
    mysqli_select_db($connection,'kelompok3web');
    mysqli_query($connection,'select * from barang');

    $t1delete=mysqli_query ($connection,"DELETE FROM barang where kd_brg='$kd_brg'");
    if(! $t1delete){
        ('Gagal Hapus: '.mysqli_error($connection));
    }else{ echo"alert('Berhasil Hapus data')";}
}



if(isset($_POST['t2']))
    {
        $nm_kota = $_POST ['Nama--Kota'];
        $provinsi = $_POST ['Provinsi'];
    mysqli_query ($connection,"INSERT INTO kota value 
    ('$nm_kota','$provinsi')");
    }

if(isset($_POST['t3']))
    {
        $kd_cust = $_POST ['Kode--Customer'];
        $nm_cust = $_POST ['Nama--Customer'];
        $alamat_cust = $_POST ['Alamat--Customer'];
    mysqli_query ($connection,"INSERT INTO customer value 
    ('$kd_cust','$nm_cust','$alamat_cust')");        
    }

if(isset($_POST['t4']))
    {
        $kd_peg = $_POST ['kdpg'];
        $nm_peg = $_POST ['nmpg'];
        $alamat_peg = $_POST ['alpg'];
        $kota_peg = $_POST ['ktpg'];
    mysqli_query ($connection,"INSERT INTO pegawai value 
    ('$kd_peg','$nm_peg','$alamat_peg','$kota_peg')");        
    }

if(isset($_POST['t5']))
    {
        $kd_supp = $_POST ['kodesupplier'];
        $nm_supp = $_POST ['namasupplier'];
        $alamat_supp = $_POST ['alamatsupplier'];
        $kota_supp = $_POST ['kotasupp']; //KURANG OPTION
    mysqli_query ($connection,"INSERT INTO supplier value 
    ('$kd_supp','$nm_supp','$alamat_supp','$kota_supp')");        
    }

if(isset($_POST['t6']))
    {
        $nota = $_POST ['nota'];
        $tgl_nota = $_POST ['tanggal-nota'];
        $kdbrg = $_POST ['kode-barang'];
        $jumlah = $_POST ['jumlah'];
        $harga_jual = $_POST ['harga-jual'];
        $kdpeg = $_POST ['kode-pegawai'];
    mysqli_query ($connection,"INSERT INTO transjual value 
    ('$nota','$tgl_nota','$kdbrg','$jumlah','$harga_jual','$kdpeg')");        
    }

if(isset($_POST['t7']))
    {
        $no_retur_jual = $_POST ['no-retur-jual'];
        $notaa = $_POST ['notaa'];
        $tgl_retur = $_POST ['tanggal-retur'];
        $kodebarang = $_POST ['kodebarang'];
        $qtyy = $_POST ['qtyy'];
        $ket_barang = $_POST ['ket-barang'];
        $kodepegawai = $_POST ['kodepegawai'];
    mysqli_query ($connection,"INSERT INTO returjual value 
    ('$no_retur_jual','$notaa','$tgl_retur','$kodebarang','$qtyy','$ket_barang','$kodepegawai')");        
    }

if(isset($_POST['t8']))
    {
        $kdsuppp = $_POST ['Kode--Supplier'];
        $kdbrggg = $_POST ['Kode--Barang'];
        $jumlahh = $_POST ['Jumlahh'];
        $harga_beli = $_POST ['Harga--Beli'];
    mysqli_query ($connection,"INSERT INTO transbeli value 
    ('$kdsuppp','$kdbrggg','$jumlahh','$harga_beli')");        
    }

if(isset($_POST['t9']))
    {
        $no_retur_beli = $_POST ['No-Retur-Beli'];
        $no_faktur = $_POST ['No--Faktur'];
        $tanggal_retur = $_POST ['Tanggal--Retur'];
        $kodebarangg = $_POST ['Kode--Barangg'];
        $qtyyyy = $_POST ['Qtyyyy'];
        $keterangan_brg = $_POST ['ktrbrg']; //KURANG TEXT AREA
    mysqli_query ($connection,"INSERT INTO returbeli value 
    ('$no_retur_beli','$no_faktur','$tanggal_retur','$kodebarangg','$qtyyyy','$keterangan_brg')");        
    }

/* 
//KOTA 
$nm_kota = $_POST ['Nama Kota'];
$provinsi = $_POST ['Provinsi'];
//CUSTOMER
$kd_cust = $_POST ['Kode Customer'];
$nm_cust = $_POST ['Nama Customer'];
$alamat_cust = $_POST ['Alamat Customer'];
//PEGAWAI
$kd_peg = $_POST ['kdpg'];
$nm_peg = $_POST ['nmpg'];
$alamat_peg = $_POST ['alpg'];
$kota_peg = $_POST ['ktpg'];
//SUPPLIER
$nm_supp = $_POST ['namasupplier'];
$alamat_supp = $_POST ['alamatsupplier'];
$kota_supp = $_POST ['kotasupp']; //KURANG OPTION
//TRANSJUAL
$nota = $_POST ['nota'];
$tgl_nota = $_POST ['tanggal-nota'];
$kdbrg = $_POST ['kode-barang'];
$jumlah = $_POST ['jumlah'];
$harga_jual = $_POST ['harga-jual'];
$kdpeg = $_POST ['kode-pegawai'];
//RETURJUAL
$no_retur_jual = $_POST ['no-retur-jual'];
$notaa = $_POST ['notaa'];
$tgl_retur = $_POST ['tanggal-retur'];
$kodebarang = $_POST ['kodebarang'];
$qtyy = $_POST ['qtyy'];
$ket_barang = $_POST ['ket-barang'];
$kodepegawai = $_POST ['kodepegawai'];
//TRANSBELI
$kdsuppp = $_POST ['Kode Supplier'];
$kdbrggg = $_POST ['Kode Barang'];
$jumlahh = $_POST ['Jumlahh'];
$harga_beli = $_POST ['Harga Beli'];
//RETURBELI
$no_retur_beli = $_POST ['No Retur Beli"'];
$no_faktur = $_POST ['No Faktur'];
$tanggal_retur = $_POST ['Tanggal Retur'];
$kodebarangg = $_POST ['Kode Barangg'];
$qtyyyy = $_POST ['Qtyyyy'];
$keterangan_brg = $_POST ['ktrbrg']; //KURANG TEXT AREA


mysqli_query ($connection,"INSERT INTO kota value 
('$nm_kota','$provinsi')");
mysqli_query ($connection,"INSERT INTO customer value 
('$kd_cust','$nm_cust','$alamat_cust')");
mysqli_query ($connection,"INSERT INTO pegawai value 
('$kd_peg','$nm_peg','$alamat_peg','$kota_peg')");
mysqli_query ($connection,"INSERT INTO supplier value 
('$nm_supp','$alamat_supp','$kota_supp')");
mysqli_query ($connection,"INSERT INTO transjual value 
('$nota','$tgl_nota','$kdbrg','$jumlah','$harga_jual','$kdpeg')");
mysqli_query ($connection,"INSERT INTO returjual value 
('$no_retur_jual','$notaa','$tgl_retur','$kodebarang','$qtyy','$ket_barang','$kodepegawai')");
mysqli_query ($connection,"INSERT INTO transbeli value 
('$kdsuppp','$kdbrggg','$jumlahh','$harga_beli')");
mysqli_query ($connection,"INSERT INTO returbeli value 
('$no_retur_beli','$no_faktur','$tanggal_retur','$kodebarangg','$qtyyyy','$keterangan_brg')");
*/

<?php 
include ('koneksi.php');
$id_barang=$_GET['id_transaksi'];
$query=mysqli_query("SELECT suplier.nama, transaksi_masuk.*
 from 
 transaksi_masuk INNER JOIN suplier ON transaksi_masuk.id_suplier = suplier.id_suplier
 where
  transaksi_masuk.kode_transaksi='$id_barang'");
$fe=mysqli_fetch_array($query);
$no_po=$fe['no_po'];
$sj=$fe['surat_jalan'];
$invoice=$fe['invoice'];
$suplier=$fe['nama'];
$tagihan=$fe['grand_total'];
$telah_bayar=$fe['bayar'];
$sisa=$tagihan-$telah_bayar;
echo $no_po.",".$sj.",".$invoice.",".$suplier.",".$tagihan.",".$telah_bayar.",".$sisa;
 ?>

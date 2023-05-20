<?php
session_start();
ini_set('date.timezone', 'Asia/Jakarta');
$bayar = preg_replace('/\D/', '', $_POST['bayar']);

include 'nomer_invoice.php';
$no_invoice = "$kodeBarang$date";


$t=time();
$jam = (date("H:i:s",$t));
$tanggal = date('Y-m-d');
$total = $_POST['total'];//total bayar awal
$diskon = $_POST['diskonglobal'];//diskon global belanja
$pdiskon = $diskon/100;
$hargadiskon = $total*$pdiskon;//setelah didiskon
$subtotaldiskon = $total-$hargadiskon;
$kembalian = $bayar - $subtotaldiskon;
$id_kasir = $_POST['idkasir'];

//proses insert ke tabel transaksi
mysqli_query($koneksi,"INSERT INTO transaksi (id,no_invoice,tgl_transaksi,jam_transaksi,total_bayar,diskon,sub_total_bayar,jumlah_bayar,kembalian,id_kasir) values (NULL,'$no_invoice','$tanggal','$jam','$total','$diskon','$subtotaldiskon','$bayar','$kembalian','$id_kasir')");

//mendapatkan id baru/ terakhir database
$id_transaksi = mysqli_insert_id($koneksi);

foreach ($_SESSION['keranjang'] as $key => $value) {

    $id_barang = $value['id'];
    $harga = $value['harga'];
    $qty = $value['qty'];
    $diskon = $value['diskon'];
    $tot = $harga*$qty-$diskon;

    mysqli_query($koneksi,"INSERT INTO detail_transaksi (id_detail_transaksi,id_transaksi,id_barang,harga,qty,diskon_item,total) values (NULL,'$id_transaksi','$id_barang','$harga','$qty','$diskon','$tot')");
    $_SESSION['keranjang'] = [];
    echo "<script>location='index.php?page=uangkembali&id=$id_transaksi';</script>";
}


?>
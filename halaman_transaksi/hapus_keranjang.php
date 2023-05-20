<?php
session_start();

$id = $_GET['id'];
$keranjang = $_SESSION['keranjang'];

//berfungsi mengambil data sacara spesfik
$filter = array_filter($keranjang, function ($var) use ($id){
return ($var['id']==$id);
});

//menghapus data berdasarkan key
foreach ($filter as $key => $value){
    unset($_SESSION['keranjang'][$key]);
}
$id_barang = $value['id'];
$harga = $value['harga'];
$qty = $value['qty'];
$tot = $harga*$qty;
//mengembalikan urutan
$_SESSION['keranjang'] = array_values($_SESSION['keranjang']);

echo "<script>location='index.php?page=transaksi';</script>";
?>
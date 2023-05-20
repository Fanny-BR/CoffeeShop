<?php
$qty = $_POST['qty'];
$diskon = preg_replace('/\D/', '', $_POST['diskon']);


foreach($_SESSION['keranjang'] as $key => $value){
    $_SESSION['keranjang'][$key]['qty'] = $qty[$key];
    $_SESSION['keranjang'][$key]['diskon'] = $diskon[$key];
}
krsort($_SESSION['keranjang']);
echo "<script>location='index.php?page=transaksi';</script>";
?>
<?php
session_start();
$_SESSION['keranjang'] = [];
echo "<script>location='index.php?page=transaksi';</script>";
?>
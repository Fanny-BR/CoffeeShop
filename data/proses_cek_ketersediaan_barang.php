<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'andhika');

$kode = mysqli_real_escape_string($koneksi, $_POST['inputkode']);
$sql = "select * from barang where id = '$kode'";
$process = mysqli_query($koneksi, $sql);
$num = mysqli_num_rows($process);
if($num == 0){
	echo " ✔ Kode barang siap dipakai";
}else{
	echo " ❌ Kode barang sudah tersedia";
}
?>
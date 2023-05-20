<?php
	if (isset($_POST['hapus'])){
        $iddetailtransaksi = mysqli_real_escape_string($koneksi,$_POST ['iddetail']);
        $qty = $_POST['qty'];
        $harga = $_POST['harga'];
        $diskonitem = $_POST['diskon'];

        $subtotal = $qty * $harga;
        $diskon = $subtotal - $diskonitem;

		$sql = "DELETE FROM detail_transaksi WHERE id_detail_transaksi='$iddetailtransaksi'";
		$query = mysqli_query($koneksi, $sql);
		if($query==1){
			$sql2 = "UPDATE transaksi SET stok=stok+'$qty', harga='$harga' WHERE id='$kode'";
			$query1 = mysqli_query($koneksi, $sql2);
			if($query1==1){
			$sql2 = "UPDATE barang SET stok=stok+'$qty', harga='$harga' WHERE id='$kode'";
			$query1 = mysqli_query($koneksi, $sql2);
			}if($query2==1){
                echo "<script>alert('Karya Anda Berhasil Di Tambahkan');</script>";
				echo "<script>location='index.php?halaman=karya';</script>";
            }
		} else {
			echo "<script>alert('Karya Gagal Di Tambahkan, Pastikan ID MIMPI benar');</script>";
			echo "<script>location='index.php?halaman=karya';</script>";
		}
	} else {
		die("Akses dilarang");
	}
	mysqli_close($koneksi);
?>
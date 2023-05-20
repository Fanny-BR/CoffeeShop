<?php
	include("koneksi.php");
	if( isset($_GET['id']) ){
		$kode = $_GET['id'];
		$sql = "DELETE FROM barang WHERE id='$kode'";
		$query = mysqli_query($koneksi, $sql);
		if($query) {
			echo "<script>swal('Produk $kode Berhasil Di Hapus', '', 'success');</script>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?page=barang'>";
		} else {
			echo "<script>swal({
				type: 'error',
				title: 'Hapus Gagal',
				text: 'Produk $kode Gagal Di Hapus',
				footer: '<a href>Perlu Bantuan?</a>'
			  })</script>";
			  echo "<meta http-equiv='refresh' content='1;url=index.php?page=barang'>";
        }
        mysqli_close($koneksi);
    }
    

?>
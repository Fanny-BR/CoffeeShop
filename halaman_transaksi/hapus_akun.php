<?php
	include("koneksi.php");
	if( isset($_GET['id']) ){
		$kode = $_GET['id'];
		$sql = "DELETE FROM user WHERE id='$kode'";
		$query = mysqli_query($koneksi, $sql);
		if($query) {
			echo "<script>swal('Data akun Berhasil Dihapus', '', 'success');</script>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?page=akun'>";
		} else {
			echo "<script>swal({
				type: 'error',
				title: 'Hapus Gagal',
				text: 'Data akun gagal dihapus',
				footer: '<a href>Perlu Bantuan?</a>'
			  })</script>";
			  echo "<meta http-equiv='refresh' content='1;url=index.php?page=akun'>";
        }
        mysqli_close($koneksi);
    }
?>
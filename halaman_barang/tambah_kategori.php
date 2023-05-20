<div class="row">
  <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?page=kategoribarang" >Kategori Barang</a></li>
        <li class="active">Tambah kategori</li>
      </ol>
    </section>
    </div>
    <br>
<div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah kategori Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="kategori">Nama Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="kategori"
                            placeholder="Masukan Nama Kategori">
                        <span id="pesan"></span>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
    <?php
	if (isset($_POST['tambah'])){
		$kategori = mysqli_real_escape_string($koneksi,$_POST ['kategori']);
		$sql      = "INSERT INTO kategori (id, nama_kategori) values (NULL, '$kategori')";
        $query    = mysqli_query($koneksi, $sql);
		if($query){
            echo "<script>swal('Kategori $kategori Berhasil Di Tambahkan', '', 'success');</script>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?page=kategoribarang'>";
		} else {
			echo "<script>swal({
				type: 'error',
				title: 'Hapus Gagal',
				text: 'Kategori $kategori Gagal Di Tambahkan',
				footer: '<a href>Perlu Bantuan?</a>'
			  })</script>";
			  echo "<meta http-equiv='refresh' content='1;url=index.php?page=kategoribarang'>";
    }
    mysqli_close($koneksi);
	}
?>
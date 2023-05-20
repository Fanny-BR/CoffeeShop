<?php
 $ambil=$koneksi->query("SELECT * FROM kategori WHERE id='$_GET[id]'");
 $data=$ambil->fetch_array(MYSQLI_ASSOC);
 ?>
<div class="row">
  <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?page=kategoribarang" >Kategori Barang</a></li>
        <li class="active">Edit kategori</li>
      </ol>
    </section>
    </div>
    <br>
<div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit kategori Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="kategori">Nama Kategori</label>
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        <input type="text" name="kategori" class="form-control" id="kategori" value="<?php echo $data['nama_kategori'] ?>">
                        <span id="pesan"></span>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
    <?php
	if (isset($_POST['edit'])){
        $kategori     = mysqli_real_escape_string($koneksi,$_POST ['kategori']);
        $id     = mysqli_real_escape_string($koneksi,$_POST ['id']);
		$sql      = "UPDATE kategori SET nama_kategori='$kategori' WHERE id='$id'";
        $query    = mysqli_query($koneksi, $sql);
        if($query){
          echo "<script>swal('Kategori $kategori Berhasil Diedit', '', 'success');</script>";
          echo "<meta http-equiv='refresh' content='1;url=index.php?page=kategoribarang'>";
        } else {
          echo "<script>swal({
            type: 'error',
            title: 'Hapus Gagal',
            text: 'Kategori $kategori Gagal Diedit',
            footer: '<a href>Perlu Bantuan?</a>'
            })</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?page=kategoribarang'>";
        }
    mysqli_close($koneksi);
	}
?>
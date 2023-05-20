<?php
 $ambil=$koneksi->query("SELECT * FROM barang WHERE id='$_GET[id]'");
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
        <li><a href="index.php?page=stok" >Stok</a></li>
        <li class="active">Kurang Stok</li>
      </ol>
    </section>
    </div>
    <br>
 <div class="row">
<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kurang Stok</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode</label>
                  <input type="text" name="kode" class="form-control" id="exampleInputEmail1" value="<?php echo $data['id']?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputPassword1" value="<?php echo $data['nama']?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Stok Sekarang</label>
                  <input type="number" name="stok" class="form-control" id="exampleInputPassword1" value="<?php echo $data['stok']?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kurang Stok</label>
                  <input type="number" name="kurangstok" class="form-control" id="exampleInputPassword1" placeholder="Masukan Jumlah Stok">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="kurang" class="btn btn-primary">Kurangi Stok</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>
</div>
<?php
	if (isset($_POST['kurang'])){
        $kode     = mysqli_real_escape_string($koneksi,$_POST ['kode']);
        $nama     = mysqli_real_escape_string($koneksi,$_POST ['nama']);
		$tambahstok = mysqli_real_escape_string($koneksi,$_POST ['kurangstok']);
		$sql      = "UPDATE barang SET nama='$nama', stok=stok-'$tambahstok' WHERE id='$kode'";
        $query    = mysqli_query($koneksi, $sql);
        if( $query){
          echo "<script>swal('Stok $nama Berhasil Dikurangai', '', 'success');</script>";
          echo "<meta http-equiv='refresh' content='1;url=index.php?page=stok'>";
        } else {
          echo "<script>swal({
            type: 'error',
            title: 'Update Gagal',
            text: 'Stok $nama Gagal Di Dikurangai',
            footer: '<a href>Perlu Bantuan?</a>'
          })</script>";
          echo "<meta http-equiv='refresh' content='1;url=index.php?page=stok'>";
        }
        mysqli_close($koneksi);
	}

?>
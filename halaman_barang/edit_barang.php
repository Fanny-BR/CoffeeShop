<?php
 $ambil=$koneksi->query("SELECT barang.id, barang.nama, barang.harga, kategori.nama_kategori
 FROM barang 
 JOIN kategori ON barang.id_kategori = kategori.id 
 WHERE barang.id='$_GET[id]'");
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
        <li><a href="index.php?page=editbarang" >Barang</a></li>
        <li class="active">Edit Barang</li>
      </ol>
    </section>
    </div>
    <br>
<div class="row">
<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="kode" value="<?php echo bar128(stripslashes($data['id'])) ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="nama" value="<?php echo $data['nama'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kategori</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $data['nama_kategori'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Harga</label>
                  <input type="text" class="form-control" id="rupiahbayar" name="harga" value="<?php echo $data['harga'] ?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="edit" class="btn btn-primary">Edit Barang</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>
</div>
<!-- Memanggil function javascript rupiah -->
<?php include 'data/function_rupiah.php' ?>
<?php
	if (isset($_POST['edit'])){
        $kode     = mysqli_real_escape_string($koneksi,$_POST ['kode']);
        $nama     = mysqli_real_escape_string($koneksi,$_POST ['nama']);
		    $harga    = preg_replace('/\D/', '', $_POST ['harga']);
		    $sql = "UPDATE barang SET nama='$nama', harga='$harga' WHERE id='$kode'";
        $query    = mysqli_query($koneksi, $sql);
        if($query){
          echo "<script>swal('Produk $nama Berhasil Diedit', '', 'success');</script>";
          echo "<meta http-equiv='refresh' content='1;url=index.php?page=barang'>";
        } else {
          echo "<script>swal({
            type: 'error',
            title: 'Hapus Gagal',
            text: 'Produk $nama Gagal Diedit',
            footer: '<a href>Perlu Bantuan?</a>'
            })</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?page=barang'>";
        }
    mysqli_close($koneksi);
	}
?>
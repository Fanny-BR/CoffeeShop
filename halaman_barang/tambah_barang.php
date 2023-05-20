<div class="row">
  <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?page=barang" >Barang</a></li>
        <li class="active">Tambah Barang</li>
      </ol>
    </section>
    </div>
    <br>
<div class="row">
<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputkode">Kode</label>
                  <input type="text" name="kode" class="form-control" id="inputkode" placeholder="Masukan Kode Barang">
                  <span id="pesan"></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Masukan Nama Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kategori</label>
                  <select name="kategori" id="kategori" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            <?php $ambil = $koneksi->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");?>
                            <?php while($data = $ambil->fetch_assoc()){?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Harga</label>
                  <input type="text" name="harga" id="rupiahbayar" class="form-control" id="exampleInputPassword1" placeholder="Masukan Harga Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Stok</label>
                  <input type="number" name="stok" class="form-control" id="exampleInputPassword1" placeholder="Masukan Stok Barang">
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
</div>
<!-- Memanggil function javascript rupiah -->
<?php include 'data/function_rupiah.php' ?>
<?php
  ini_set('date.timezone', 'Asia/Jakarta');
	if (isset($_POST['tambah'])){
		$kode     = mysqli_real_escape_string($koneksi,$_POST ['kode']);
		$nama = mysqli_real_escape_string($koneksi,$_POST ['nama']);
		$kategori = mysqli_real_escape_string($koneksi,$_POST ['kategori']);
    $harga    = preg_replace('/\D/', '', $_POST ['harga']);
    $stok    = mysqli_real_escape_string($koneksi,$_POST ['stok']);
    $tanggal = date('Y-m-d');
		$sql      = "INSERT INTO barang (id, id_kategori, nama, harga, stok, tanggal) values ('$kode', '$kategori', '$nama', '$harga', '$stok', '$tanggal')";
    $query    = mysqli_query($koneksi, $sql);
		if($query){
      echo "<script>swal('Produk $nama Berhasil Di Tambahkan', '', 'success');</script>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?page=barang'>";
		} else {
			echo "<script>swal({
				type: 'error',
				title: 'Hapus Gagal',
				text: 'Produk $nama Gagal Di Tambahkan',
				footer: '<a href>Perlu Bantuan?</a>'
			  })</script>";
			  echo "<meta http-equiv='refresh' content='1;url=index.php?page=barang'>";
    }
    mysqli_close($koneksi);
	}

?>
<?php include 'data/cekbarang.php'; ?>

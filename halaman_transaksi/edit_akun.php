<?php
 $ambil=$koneksi->query("SELECT user.id, user.username, user.alamat, user.password, user.nama, user.nomor, level.nama_level
 FROM user, level
 WHERE user.id_level = level.id
 AND user.id='$_GET[id]'");
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
        <li><a href="index.php?page=akun">Akun</a></li>
        <li class="active">Edit Akun</li>
      </ol>
    </section>
    </div>
    <br>
 <div class="row">
<div class="col-lg-5">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Akun</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post">
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

          <div class="col-sm-10">
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            <input type="text" class="form-control" id="inputEmail3" name="username"
              value="<?php echo $data['username'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" name="password"
              value="<?php echo $data['password'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="nama" value="<?php echo $data['nama'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nomor</label>

          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="nomor" value="<?php echo $data['nomor'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

          <div class="col-sm-10">
            <textarea cols="52" name="alamat" rows="5"><?php echo $data['alamat'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Level</label>

          <div class="col-sm-10">
            <select name="level" class="form-control">
              <option>Pilih Level</option>
              <option value="1" <?php $data['nama_level'] == 'admin' ? print "selected" : ""; ?>>admin</option>
              <option value="2" <?php $data['nama_level'] == 'karyawan' ? print "selected" : ""; ?>>Karyawan</option>
            </select>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" name="edit" class="btn btn-info pull-right">Edit</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <!-- /.box -->
</div>
</div>

<?php
	if (isset($_POST['edit'])){
        $id = mysqli_real_escape_string($koneksi,$_POST ['id']);
        $username     = mysqli_real_escape_string($koneksi,$_POST ['username']);
        $password     = mysqli_real_escape_string($koneksi,$_POST ['password']);
        $nama         = mysqli_real_escape_string($koneksi,$_POST ['nama']);
        $nomor     = mysqli_real_escape_string($koneksi,$_POST ['nomor']);
        $alamat        = mysqli_real_escape_string($koneksi,$_POST ['alamat']);
        $level         = mysqli_real_escape_string($koneksi,$_POST ['level']);
		$sql      = "UPDATE user SET username='$username', password='$password', nama='$nama', nomor='$nomor', alamat='$alamat', id_level='$level' WHERE id='$id'";
        $query    = mysqli_query($koneksi, $sql);
		if( $query){
			echo "<script>swal('Data Akun Berhasil Diupdate', '', 'success');</script>";
			echo "<meta http-equiv='refresh' content='1;url=index.php?page=akun'>";
		} else {
			echo "<script>swal({
				type: 'error',
				title: 'Hapus Gagal',
				text: 'Data Akun Gagal Diupdate',
				footer: '<a href>Perlu Bantuan?</a>'
			  })</script>";
			  echo "<meta http-equiv='refresh' content='1;url=index.php?page=akun'>";
    }
    mysqli_close($koneksi);
	}

?>
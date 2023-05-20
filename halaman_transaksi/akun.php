<div class="row">
  <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Akun</li>
      </ol>
    </section>
    </div>
    <br>
         <div class="row">
         <div class="col-lg-5">
           <!-- Horizontal Form -->
           <div class="box box-info">
             <div class="box-header with-border">
               <h3 class="box-title">Buat Akun</h3>
             </div>
             <!-- /.box-header -->
             <!-- form start -->
             <form class="form-horizontal" method="post">
               <div class="box-body">
                 <div class="form-group">
                   <label for="username" class="col-sm-2 control-label">Username</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" id="username" name="username"
                       placeholder="Masukan username">
                     <span class="text-warning"></span>
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="password" class="col-sm-2 control-label">Password</label>
                   <div class="col-sm-10">
                     <input type="password" class="form-control" id="password" name="password"
                       placeholder="Masukan password">
                     <span class="text-warning"></span>
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="confirmpassword" class="col-sm-2 control-label">Konfirmasi Password</label>
                   <div class="col-sm-10">
                     <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"
                       placeholder="Masukan password">
                     <span class="text-warning"></span>
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nama" class="col-sm-2 control-label">Nama</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama lengkap">
                     <span class="text-warning"></span>
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="nomor" class="col-sm-2 control-label">Nomor</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukan nomor hp">
                     <span class="text-warning"></span>
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                   <div class="col-sm-10">
                     <textarea cols="52" id="alamat" name="alamat" rows="5"></textarea>
                     <span class="text-warning"></span>
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="level" class="col-sm-2 control-label">Level</label>
                   <div class="col-sm-10">
                     <select name="level" id="level" class="form-control">
                       <option value="">-- Pilih Level --</option>
                       <?php $ambil = $koneksi->query("SELECT * FROM level");?>
                       <?php while ($data = $ambil->fetch_assoc()) {?>
                       <option value="<?php echo $data['id']; ?>"><?php echo $data['nama_level']; ?></option>
                       <?php } ?>
                     </select>
                   </div>
                 </div>
               </div>
               <!-- /.box-body -->
               <div class="box-footer">
                 <button type="submit" name="simpan" class="btn btn-info pull-right">Daftar</button>
               </div>
               <!-- /.box-footer -->
             </form>
           </div>
           <!-- /.box -->
         </div>

         <div class="col-lg-7">
           <div class="box">
             <div class="box-header">
               <h3 class="box-title">Akun</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                   <tr>
                     <th>ID</th>
                     <th>Nama</th>
                     <th>Nomor</th>
                     <th>Level</th>
                     <th>Aksi</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
              $query = mysqli_query($koneksi, "SELECT user.id, user.nama, user.nomor, level.nama_level
              FROM user, level
              WHERE user.id_level = level.id");
              $jumlah = mysqli_num_rows($query);
              while ($data = mysqli_fetch_array($query)) {
                  ?>
                   <tr>
                     <td><?php echo $data['id'] ?></td>
                     <td><?php echo $data['nama'] ?></td>
                     <td><?php echo $data['nomor'] ?></td>
                     <td ><span class="label <?php if ($data['nama_level']=='admin') { echo"label-primary"; } else { echo"label-success"; } ?>"><?php echo $data['nama_level']; ?></span>
                     </td>
                     <td>
                       <a href="index.php?page=editakun&id=<?php echo $data['id']; ?>" class="btn btn-success"><i
                           class="fa fa-pencil"></i> Edit</a>
                       <a href="index.php?page=hapusakun&id=<?php echo $data['id']; ?>" class="btn btn-danger delete-akun"><i
                           class="fa fa-trash"></i> Hapus</a>
                     </td>
                   </tr>

                   <?php
              }?>
                 </tbody>
                 <tfoot>
                   <tr>
                     <th>ID</th>
                     <th>Nama</th>
                     <th>Nomor</th>
                     <th>Level</th>
                     <th>Aksi</th>
                   </tr>
                 </tfoot>
               </table>
             </div>
             <!-- /.box-body -->
           </div>
         </div>
         </div>

         <?php
    if (isset($_POST['simpan'])) {
        $username     = mysqli_real_escape_string($koneksi, $_POST ['username']);
        $password     = mysqli_real_escape_string($koneksi, $_POST ['password']);
        $nama         = mysqli_real_escape_string($koneksi, $_POST ['nama']);
        $nomor     = mysqli_real_escape_string($koneksi, $_POST ['nomor']);
        $alamat        = mysqli_real_escape_string($koneksi, $_POST ['alamat']);
        $level         = mysqli_real_escape_string($koneksi, $_POST ['level']);
        $sql      = "INSERT INTO user (username, password, nama, nomor, alamat, id_level) values ('$username', '$password', '$nama', '$nomor', '$alamat', '$level')";
        $query    = mysqli_query($koneksi, $sql);
        if ($query) {
          echo '<script>swal("Akun Berhasil Dibuat", "<?php $username ?>", "success");</script>';
          echo "<meta http-equiv='refresh' content='1;url=index.php?page=akun'>";
          } else {
          echo "<script>swal({
            type: 'error',
            title: 'Buat Akun Gagal',
            text: 'Pastikan Mengisi Semua Kolom Form Nya.',
            footer: '<a href>Perlu Bantuan?</a>'
          })</script>";
          echo "<meta http-equiv='refresh' content='1;url=index.php?page=akun'>";
        }
        mysqli_close($koneksi);
    }

?>

         <?php include 'data/validasi_form.php' ?>
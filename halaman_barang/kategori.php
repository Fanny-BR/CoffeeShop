<div class="row">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kategori Barang</li>
        </ol>
    </section>
</div>
<br>
<div class="row">
    <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Kategori Barang</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <a href="index.php?page=tambahkategori" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kategori</a>
       <br><br>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 

        include 'data/function_dateindo.php';
              $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id DESC");
              $jumlah = mysqli_num_rows($query);
              while ($data = mysqli_fetch_array($query)){
              ?>
            <tr>
              <td><?php echo $data['id'] ?></td>
              <td><?php echo $data['nama_kategori'] ?></td>
              <td>
                <a href="index.php?page=editkategori&id=<?php echo $data['id'];?>" class="btn btn-success"><i
                    class="fa fa-pencil"></i> Edit</a>
                <a href="index.php?page=hapuskategori&id=<?php echo $data['id'];?>" class="btn btn-danger delete-kategori"><i
                    class="fa fa-trash"></i> Hapus</a>
              </td>
            </tr>

            <?php }?>
          </tbody>
          <tfoot>
            <tr>
                <th>ID</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>

<?php include 'data/validasi_form.php' ?>

<?php
$barang = $koneksi->query("SELECT * FROM barang WHERE stok<='10'");
$no = $barang->num_rows;
if($no>0){
  echo "<script>swal('Ada $no Barang Stoknya Menipis', '', 'info');</script>";
} 
?>
<div class="modal fade" id="stok" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Stok Barang Yang akan Habis</h4>
    </div>
    <div class="modal-body">
    <table class="table table-bordered table-striped">
  <thead>
        <tr>
          <th>Nama</th>
          <th>Stok</th>
        </tr>
      </thead>
      <tbody>
<?php
while ($data = mysqli_fetch_array($barang)){
  ?>
<tr>
<td><?php echo $data['nama'] ?></td>
<td><?php echo $data['stok'] ?></td>
</tr>
<?php }?>
</tbody>
</table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
  <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" >Stok</li>
      </ol>
    </section>
    </div>
    <br>
    <a data-toggle="modal" href="#stok" class="btn btn-danger btn-lg"><i class="fa fa-arrow-down"></i> Stok Barang Menipis</a>
    <br><br>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Stok Barang</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        include 'data/function_dateindo.php';
              $query = mysqli_query($koneksi, "SELECT * FROM barang");
              $jumlah = mysqli_num_rows($query);
              while ($data = mysqli_fetch_array($query)){
              ?>
        <tr>
          <td><?php echo $data['id'] ?></td>
          <td><?php echo $data['nama'] ?></td>
          <td><?php echo $data['stok'] ?></td>
          <td>
            <a href="index.php?page=tambahstok&id=<?php echo $data['id'];?>" class="btn btn-success"><i class="fa fa-plus" ></i> Tambah Stok</a>
            <a href="index.php?page=kurangstok&id=<?php echo $data['id'];?>" class="btn btn-danger"><i class="fa fa-minus"></i> Kurang Stok</a>
          </td>
        </tr>

        <?php }?>
      </tbody>
      <tfoot>
        <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
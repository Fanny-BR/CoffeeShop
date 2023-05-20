<div class="row">
  <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Retur Barang</li>
      </ol>
    </section>
    </div>
    <br>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Riwayat Transkasi</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Kasir</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        include 'data/function_dateindo.php';
              $query = mysqli_query($koneksi, "SELECT transaksi.no_invoice, transaksi.tgl_transaksi, transaksi.jam_transaksi, transaksi.id, user.nama 
              FROM transaksi, user
              WHERE transaksi.id_kasir = user.id ORDER BY id DESC");
              $jumlah = mysqli_num_rows($query);
              while ($data = mysqli_fetch_array($query)){
              ?>
        <tr>
          <td><span class="label label-success"><?php echo $data['no_invoice'] ?></span></td>
          <td><?php echo format_indo($data['tgl_transaksi']) ?></td>
          <td><?php echo $data['jam_transaksi'] ?></td>
          <td><?php echo $data['nama'] ?></td>
          <td>
            <a href="index.php?page=detailretur&id=<?php echo $data['id'];?>" class="btn btn-warning"><i class="fa fa-eye"></i> Retur</a>
          </td>
        </tr>

        <?php }?>
      </tbody>
      <tfoot>
        <tr>
          <th>Invoice</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Kasir</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<?php
ini_set('date.timezone', 'Asia/Jakarta');
$total_bayar = 0;
$qty = 0;
if(isset($_SESSION['keranjang'])){
  foreach ($_SESSION['keranjang'] as $key => $value){
        $total_bayar += $value['harga']*$value['qty']-$value['diskon'];
        $qty += $value['qty'];
  }
}

?>

<div class="row">
  <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Transaksi</li>
      </ol>
    </section>
    </div>
    <br>
<div class="row">
<div class="col-lg-4">
  <!-- general form elements -->
  <div class="box box-info">
    <div class="box-body">
      <form action="index.php?page=keranjang" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Kode Barang</label>
          <div class="input-group">
            <div class="input-group-btn">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Add</button>
            </div>
            <!-- /btn-group -->
            <input type="text" name="id_barang" placeholder="Masukan kode barang" class="form-control"
              value="<?php echo $_GET['id']; ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Qty</label>
          <input type="number" name="jumlah" class="form-control" id="exampleInputEmail1"
            placeholder="masukan jumlah barang" required>
        </div>

        <button type="submit" class="btn btn-primary" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
      </form>
    </div>

  </div>
  <!-- /.box -->
</div>



<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Produk</h4>
      </div>
      <div class="modal-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $query = mysqli_query($koneksi, "SELECT barang.id, barang.nama, barang.harga, barang.stok, barang.tanggal, kategori.nama_kategori
              FROM barang, kategori
              WHERE barang.id_kategori = kategori.id");
              $jumlah = mysqli_num_rows($query);
              while ($data = mysqli_fetch_array($query)){
              ?>
            <tr>
              <td><?php echo $data['id'] ?></td>
              <td><?php echo $data['nama'] ?></td>
              <td><?php echo $data['nama_kategori'] ?></td>
              <td><?php echo $data['stok'] ?></td>
              <td>
                <a href="index.php?page=pilihproduk&id=<?php echo $data['id'];?>" class="btn btn-info"><i
                    class="fa fa-check"></i> Pilih</a>
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
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="col-lg-4">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal">
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Date</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" value="<?php echo date('Y-m-d');?>" readonly>
          </div>
        </div>
        <?php if ($_SESSION['level'] == 'karyawan' ) { ?>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">Kasir</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword3" value="<?php echo $_SESSION['nama'] ?>" readonly>
          </div>
        </div>
        <?php } ?>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">Customer</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword3" value="umum" readonly>
          </div>
        </div>
      </div>
      <!-- /.box-body -->

      <!-- /.box-footer -->
    </form>
  </div>
  <!-- /.box -->
</div>




<div class="col-lg-4">
  <!-- general form elements -->
  <div class="box box-info">
    <div class="box-body">
      <div class="form-group">
        <h4 style="font-weight:bold;">TOTAL BAYAR</h4>
        <hr>
        <h3 style=" font-weight: bold;">Rp. <?php echo number_format($total_bayar) ?></h3>
        <h3 style=" font-weight: bold;">Total Barang : <?php echo $qty ?> Barang</h3>
      </div>
    </div>
  </div>
  <!-- /.box -->
</div>


<div class="col-md-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-shopping-cart"></i> Keranjang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="index.php?page=updateqty" method="post">
        <table class="table table-bordered">
          <tr>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th>Harga Satuan</th>
            <th>Qty</th>
            <th>Diskon Item (Rp.)</th>
            <th>Sub Total</th>
            <th>Aksi</th>
          </tr>
          <?php foreach ($_SESSION['keranjang'] as $key => $value){?>
          <tr>
            <td><?=$value['id']?></td>
            <td><?=$value['nama']?></td>
            <td>Rp. <?=number_format($value['harga']) ?></td>
            <td class="col-sm-2"><input type="number" class="form-control" name="qty[]" value="<?=$value['qty']?>"></td>
            <td class="col-sm-2"><input type="text" id="rupiahdiskon" class="form-control" name="diskon[]" value="Rp. <?=number_format($value['diskon'])?>"></td>
            <td>Rp. <?=number_format($value['qty']*$value['harga']-$value['diskon'])?></td>
            <td>
              <button type="submit" class="btn btn-success">Perbarui</button>
              <a href="index.php?page=hapuskeranjang&id=<?=$value['id']?>" class="btn btn-danger"><i
                  class="fa fa-trash"></i> Hapus</a>

            </td>
          </tr>
          <?php } ?>
        </table>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

<div class="col-lg-6">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <!-- /.box-header -->
    <!-- form start -->
    <form action="index.php?page=prosesbayar" method="post" class="form-horizontal">
      <div class="box-body">
        <div class="form-group">
          <label for="totalbayar" class="col-sm-3 control-label">Total Bayar</label>
          <div class="col-sm-9">
            <input type="text" readonly style="font-size:20px; font-weight: bold;"
              value="Rp. <?php echo number_format($total_bayar) ?>" class="form-control">
              <input type="hidden" readonly style="font-size:20px; font-weight: bold;"
              value="<?php echo $total_bayar ?>" class="form-control" id="totalbayar">
          </div>
        </div>

        <input type="hidden" name="idkasir" value="<?php echo $_SESSION['id'] ?>">
        <input type="hidden" name="total" value="<?php echo $total_bayar ?>">

        <div class="form-group">
          <label for="bayar" class="col-sm-3 control-label">Diskon</label>
          <div class="col-sm-3">
            <input type="text" name="diskonglobal" id="diskonglobal" style="font-size:20px; font-weight: bold;" class="form-control" placeholder="%">
          </div>
        </div>

        <div class="form-group">
          <label for="bayar" class="col-sm-3 control-label">Sub Total Bayar</label>
          <div class="col-sm-9">
            <input type="text" id="hargatotal" style="font-size:20px; font-weight: bold;" class="form-control" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="bayar" class="col-sm-3 control-label">Bayar</label>
          <div class="col-sm-9">
            <input type="text" name="bayar" id="rupiahbayar" style="font-size:20px; font-weight: bold;" class="form-control" placeholder="Masukan Jumlah Bayar" required>
          </div>
        </div>

      </div>
      <!-- /.box-body -->

<!-- Memanggil function javascript rupiah -->
<?php include 'data/function_rupiah.php' ?>

      <!-- /.box-footer -->
  </div>
  <!-- /.box -->
</div>


<div class="col-sm-3">
  <br>
  <div class="row">
    <div class="col-sm-6">
      <button type="submit" class="btn btn-success"><i class="fa fa-money"></i> Proses Pembayaran</button>
      </form>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-6 mb-2">
      <a href="index.php?page=reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Batal</a>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
 function rubah(angka){
   var reverse = angka.toString().split('').reverse().join(''),
   ribuan = reverse.match(/\d{1,3}/g);
   ribuan = ribuan.join(',').split('').reverse().join('');
   return ribuan;
 }

  $(document).ready(function(){
      $("#diskonglobal").keyup(function(){
        var harga  = parseInt($("#totalbayar").val());
        var diskon  = parseInt($("#diskonglobal").val());
        var total = harga - (harga*(diskon/100));
        $("#hargatotal").val("Rp. " + rubah(total));     
      });
  });

</script>
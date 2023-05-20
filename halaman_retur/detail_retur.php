<?php
include 'data/function_dateindo.php';

    $ambil=$koneksi->query("SELECT transaksi.tgl_transaksi, transaksi.id, transaksi.no_invoice, transaksi.jam_transaksi, transaksi.total_bayar, transaksi.diskon, transaksi.sub_total_bayar, transaksi.jumlah_bayar, transaksi.kembalian, user.nama
    FROM transaksi, user 
    WHERE transaksi.id_kasir = user.id 
    AND transaksi.id='$_GET[id]'");
    $data=$ambil->fetch_array(MYSQLI_ASSOC);

 ?>
   <!-- Main content -->
   <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-shopping-cart"></i> Detail Belanja
            <small class="pull-right"><?php echo $data['tgl_transaksi']?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">

        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <address>
            <b>Kasir : </b><?php echo $data['nama'] ?><br>
            <b>Tanggal :</b> <?php echo format_indo($data['tgl_transaksi']) ?><br>
            <b>Jam :</b> <?php echo $data['jam_transaksi'] ?><br>
            <b>Alamat :</b> Jl. Ronggolawe Ds. Bogem Kec. Gurah Kediri
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice <span class="label label-success"><?php echo $data['no_invoice'] ?></span></b><br>
          <br>
          <b>Order ID:</b> <?php echo $data['id'] ?><br>
          <b>Customer:</b> <span class="label label-info">Umum</span><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<br>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
          <th>Kode</th>
          <th>Nama Produk</th>
          <th>Harga Satuan</th>
          <th>Qty</th>
          <th>Diskon Item (Rp.)</th>
          <th>Sub Total</th>
          <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php 
              $query = mysqli_query($koneksi, "SELECT detail_transaksi.*, barang.*
              FROM detail_transaksi, barang
              WHERE detail_transaksi.id_barang = barang.id AND id_transaksi='$_GET[id]'");
              while ($data1 = mysqli_fetch_array($query)){
              ?>
            <tr>
              <td><?php echo $data1['id_barang'] ?></td>
              <td><?php echo $data1['nama'] ?></td>
              <td>Rp. <?php echo number_format($data1['harga'])?></td>
              <td><?php echo $data1['qty'] ?></td>
              <td>Rp. <?php echo number_format($data1['diskon_item']) ?></td>
              <td>Rp. <?php echo number_format($data1['total'])?></td>
              <td>
                  <button class="btn btn-success">-</button>
                  <button class="btn btn-danger" id="retur_barang" data-toggle="modal" data-target="#retur"
                  data-id_detail_transaksi="<?php echo $data1['id_detail_transaksi'];?>"
                  data-id_transaksi="<?php echo $data1['id_transaksi'];?>"
                  data-kode="<?php echo $data1['id_barang'];?>"
                  data-nama="<?php echo $data1['nama'];?>"
                  data-harga="Rp. <?php echo number_format($data1['harga']);?>"
                  data-qty="<?php echo $data1['qty'];?>"
                  data-diskon="Rp. <?php echo number_format($data1['diskon_item']);?>"
                  data-total="Rp. <?php echo number_format($data1['total']);?>">Retur</button>
              </td>
            </tr>
              <?php 
            $jumlah1 = $jumlah1+$data1['qty'];  
            } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="modal fade" id="retur">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Retur Barang</h4>
              </div>
              <form action="proses_retur.php" method="post">
              <div class="modal-body">
              <div class="form-group">
                  <label>ID Detail Transaksi</label>
                  <input type="text" name="iddetail" class="form-control" id="idl" readonly>
                </div>
                <div class="form-group">
                  <label>ID Transaksi</label>
                  <input type="text" name="idtransaksi" class="form-control" id="idt" readonly>
                </div>
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" name="kode" class="form-control" id="kd" readonly>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" id="nm" readonly>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" name="harga" class="form-control" id="hg" readonly>
                </div>
                <div class="form-group">
                  <label>Qty</label>
                  <input type="number" name="qty" class="form-control" id="qy">
                </div>
                <div class="form-group">
                  <label>Diskon Item (Rp.)</label>
                  <input type="text" name="diskon" class="form-control" id="di" readonly>
                </div>
                <div class="form-group">
                  <label>Sub Total</label>
                  <input type="text" name="total" class="form-control" id="st" readonly>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" name="hapus" class="btn btn-danger">Retur Barang</button>
              </div>
              </form>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script type="text/javascript">
       $(document).on("click", "#retur_barang", function () {
           var idl = $(this).data('id_detail_transaksi');
           var idt = $(this).data('id_transaksi');
           var kode = $(this).data('kode');
           var nama = $(this).data('nama');
           var harga = $(this).data('harga');
           var qty = $(this).data('qty');
           var diskon = $(this).data('diskon');
           var total = $(this).data('total');

           $("#retur #idl").val(idl);
           $("#retur #idt").val(idt);
           $("#retur #kd").val(kode);
           $("#retur #nm").val(nama);
           $("#retur #hg").val(harga);
           $("#retur #qy").val(qty);
           $("#retur #di").val(diskon);
           $("#retur #st").val(total);
       })
   </script>

      <b class="pull-right">Jumlah Barang: <?php echo $jumlah1 ?> Barang</b> <br>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">UANG KEMBALI :</p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; font-size:50px; font-weight: bold; color:black;">
          Rp. <?php echo number_format($data['kembalian']) ?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Detail Pembayaran</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total Bayar:</th>
                <td>Rp. <?php echo number_format($data['total_bayar']) ?></td>
              </tr>
              <tr>
                <th>Diskon :</th>
                <td> <?php echo $data['diskon'] ?> %</td>
              </tr>
              <tr>
                <th style="width:50%">Sub Total Bayar:</th>
                <td>Rp. <?php echo number_format($data['sub_total_bayar']) ?></td>
              </tr>
              <tr>
                <th>Jumlah Bayar:</th>
                <td>Rp. <?php echo number_format($data['jumlah_bayar']) ?></td>
              </tr>
              <tr>
                <th>Kembalian:</th>
                <td>Rp. <?php echo number_format($data['kembalian']) ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button onclick="window.open('halaman_transaksi/nota.php?id=<?php echo $data['id']; ?>','mywindow','width=265px, height=500px')" class="btn btn-success"><i class="fa fa-print"></i> Cetak Struk</button>
        </div>
      </div>
    </section>
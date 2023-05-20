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
            <b>Alamat :</b> Mojoroto Indah B.R5
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
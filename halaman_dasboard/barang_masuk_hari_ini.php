<?php include 'data/function_dateindo.php' ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Barang Masuk Hari Ini</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <span>Tanggal : <?php echo format_indo(date('Y-m-d')); ?></span>
                <a href="../andhika/halaman_laporan/print_barang_tgl_sekarang.php" class="btn btn-success pull-right"><i class="fa fa-print"></i> Print Data</a>
            </div>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $date = date('Y-m-d');
              $query = mysqli_query($koneksi, "SELECT barang.id, barang.nama, barang.harga, barang.stok, barang.tanggal, kategori.nama_kategori
              FROM barang, kategori
              WHERE barang.id_kategori = kategori.id AND tanggal='$date'");
              $row = mysqli_num_rows($query);
              if ($row > 0) {
                  while ($data = mysqli_fetch_array($query)) {
                      ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['nama_kategori'] ?></td>
                    <td>Rp. <?php echo number_format($data['harga']) ?></td>
                    <td><?php echo $data['stok'] ?></td>
                    <td><?php echo format_indo($data['tanggal']) ?></td>
                </tr>
                <?php
                  }
              }else{
                echo "<tr><td align='center' class='bg-danger' colspan='6'>Data Barang Masuk Hari Ini Tidak Ada</td></tr>";
              }
                ?>
            </tbody>
        </table>
    </div>
</div>

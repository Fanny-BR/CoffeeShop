<?php
  ini_set('date.timezone', 'Asia/Jakarta');
  $date = date('Y-m-d');
  $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tgl_transaksi='$date'");
  $jumlah_transaksi = mysqli_num_rows($query);
  $query2 = mysqli_query($koneksi, "SELECT * FROM barang");
  $jumlah_barang = mysqli_num_rows($query2);
  $query3 = mysqli_query($koneksi, "SELECT * FROM barang WHERE tanggal='$date'");
  $barang_masuk = mysqli_num_rows($query3);
  $query4 = mysqli_query($koneksi, "SELECT SUM(sub_total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$date'");
  while ($data = mysqli_fetch_array($query4)) {
      $totaltransaksi = $data['totaltransaksi'];
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
      <li class="active">Laporan</li>
    </ol>
  </section>
</div>
<br>

<!-- Form laporan penjualan -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h4 style="font-size:29px; font-weight: bold;">Rp. <?php echo number_format($totaltransaksi) ?></h4>
          <p>Pendapatan Hari Ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="index.php?page=laporan" class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $jumlah_transaksi ?></h3>
          <p>Transaksi Hari ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-cart"></i>
        </div>
        <a href="index.php?page=transaksihariini" class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $jumlah_barang ?></h3>
          <p>Jumlah Barang saat ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="index.php?page=barang" class="small-box-footer">Info lebih lanjut <i
            class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $barang_masuk ?></h3>
          <p>Barang masuk hari ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="index.php?page=barangmasuksihariini" class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-5">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Laporan Penjualan</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" method="post" action="index.php?page=detailfilter">
        <div class="box-body">
        <div class="col-md-12">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter" class="form-control">
            <option value="">-- Pilih Filter --</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
            <option value="4">Per Periode</option>
        </select>
        <br>
        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="date" name="tanggal" class="form-control"/>
            <br /><br />
        </div>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan" class="form-control">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br />
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun" class="form-control">
                <option value="">Pilih</option>
                <?php
                $query = "SELECT YEAR(tgl_transaksi) AS tahun FROM transaksi GROUP BY YEAR(tgl_transaksi)"; // Tampilkan tahun sesuai di tabel transaksi
                $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                while($data1 = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="'.$data1['tahun'].'">'.$data1['tahun'].'</option>';
                }
                ?>
            </select>
            <br />
        </div>

   <div id="form-periode">
            <label>Tanggal Awal</label>
              <input type="date" name="tawal" class="form-control">
            <label>Tanggal Akhir</label>
              <input type="date" name="takhir" class="form-control">
          </br>
        </div>
        <button type="submit" class="btn btn-primary">Tampilkan</button>
        <a class="btn btn-warning" href="index.php?page=laporan">Reset Filter</a>
        </div>

        </div>
      </form>
    </div>
  </div>

<!-- Grafik laporan harian -->
    <div class="col-md-7">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Pendapatan Harian</h3><br>
          <span id='ct'></span>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
      <div class="box-body">
      <canvas id="myChart"></canvas>
      </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <?php include 'data/grafikharian.php' ?>

    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('#form-tanggal, #form-bulan, #form-tahun, #form-periode').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun, #form-periode').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal, #form-periode').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else if($(this).val() == '3'){ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan, #form-periode').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }else{
              $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sembunyikan form tanggal, bulan, tahun
              $('#form-periode').show();
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>

<!-- else if($(this).val() == '3'){
                $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sembunyikan form tanggal, bulan, tahun
                $('#form-periode').show(); // Tampilkan form bulan dan tahun
              }-->
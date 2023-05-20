  <?php
  ini_set('date.timezone', 'Asia/Jakarta');
  $date = date('Y-m-d');
  $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tgl_transaksi='$date'");
  $jumlah_transaksi = mysqli_num_rows($query);
  $query3 = mysqli_query($koneksi, "SELECT * FROM barang WHERE tanggal='$date'");
  $barang_masuk = mysqli_num_rows($query3);
  ?>
  <div class="row">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
  </div>
  <br>

  <div class="callout callout-info">
    <marquee>Selamat Datang Di Aplikasi Rival Coffee </marquee>
    <h4>Selamat Datang <?php echo $_SESSION['nama'] ?></h4>
    <p>Enak ngomong kancane, Gak enak ngomong bakul'e</p>
    <span id='ct'></span>
  </div>
  <!-- Small boxes (Stat box) -->

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
      <a href="index.php?page=transaksihariini" class="small-box-footer">Info lebih lanjut <i
          class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

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
      <a href="index.php?page=barangmasuksihariini" class="small-box-footer">Info lebih lanjut <i
          class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
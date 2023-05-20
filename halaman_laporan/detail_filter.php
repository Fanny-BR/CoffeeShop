<div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Hasil Filter</h3>
      </div>
<div class="box-body">
<?php
    if(isset($_POST['filter']) && ! empty($_POST['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_POST['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_POST['tanggal']));

            echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br /><br />';
            echo '<a class="btn btn-danger" href="halaman_laporan/print.php?filter=1&tanggal='.$_POST['tanggal'].'"><i class="fa fa-print"></i> Cetak PDF</a>';
            echo '<a class="btn btn-warning pull-right" href="index.php?page=laporan"><i class="fa fa-refresh"></i> Reset Filter</a></br></br>';

            $query = "SELECT transaksi.tgl_transaksi, detail_transaksi.id_barang, barang.nama, detail_transaksi.harga, detail_transaksi.qty, detail_transaksi.total
            FROM detail_transaksi
            JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            JOIN barang ON detail_transaksi.id_barang = barang.id WHERE DATE(tgl_transaksi)='".$_POST['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<b>Data Transaksi Bulan '.$nama_bulan[$_POST['bulan']].' '.$_POST['tahun'].'</b><br /><br />';
            echo '<a class="btn btn-danger" href="halaman_laporan/print.php?filter=2&bulan='.$_POST['bulan'].'&tahun='.$_POST['tahun'].'"><i class="fa fa-print"></i> Cetak PDF</a>';
            echo '<a class="btn btn-warning pull-right" href="index.php?page=laporan"><i class="fa fa-refresh"></i> Reset Filter</a></br></br>';

            $query = "SELECT transaksi.tgl_transaksi, detail_transaksi.id_barang, barang.nama, detail_transaksi.harga, detail_transaksi.qty, detail_transaksi.total
            FROM detail_transaksi
            JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            JOIN barang ON detail_transaksi.id_barang = barang.id WHERE MONTH(tgl_transaksi)='".$_POST['bulan']."' AND YEAR(tgl_transaksi)='".$_POST['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
            echo '<b>Data Transaksi Tahun '.$_POST['tahun'].'</b><br /><br />';
            echo '<a class="btn btn-danger" href="halaman_laporan/print.php?filter=3&tahun='.$_POST['tahun'].'"><i class="fa fa-print"></i> Cetak PDF</a>';
            echo '<a class="btn btn-warning pull-right" href="index.php?page=laporan"><i class="fa fa-refresh"></i> Reset Filter</a></br></br>';

            $query = "SELECT transaksi.tgl_transaksi, detail_transaksi.id_barang, barang.nama, detail_transaksi.harga, detail_transaksi.qty, detail_transaksi.total
            FROM detail_transaksi
            JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            JOIN barang ON detail_transaksi.id_barang = barang.id WHERE YEAR(tgl_transaksi)='".$_POST['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }else{
            $tgl_awal = date('d-m-y', strtotime($_POST['tawal']));
            $tgl_akhir = date('d-m-y', strtotime($_POST['takhir']));
            echo '<b>Data Transaksi Tanggal '.$tgl_awal.' Sampai '.$tgl_akhir.'</b><br /><br />';
            echo '<a class="btn btn-danger" href="halaman_laporan/print.php?filter=4&tawal='.$_POST['tawal'].'&takhir='.$_POST['takhir'].'"><i class="fa fa-print"></i> Cetak PDF</a>';
            echo '<a class="btn btn-warning pull-right" href="index.php?page=laporan"><i class="fa fa-refresh"></i> Reset Filter</a></br></br>';
            $query = "SELECT transaksi.tgl_transaksi, detail_transaksi.id_barang, barang.nama, detail_transaksi.harga, detail_transaksi.qty, detail_transaksi.total
            FROM detail_transaksi
            JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            JOIN barang ON detail_transaksi.id_barang = barang.id WHERE DATE(tgl_transaksi) BETWEEN '".$_POST['tawal']."' AND '".$_POST['takhir']."'";
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Semua Data Transaksi</b><br /><br />';
        echo '<a class="btn btn-danger" href="halaman_laporan/print.php"><i class="fa fa-print"></i> Cetak PDF</a><br /><br />';

        $query = "SELECT transaksi.tgl_transaksi, detail_transaksi.id_barang, barang.nama, detail_transaksi.harga, detail_transaksi.qty, detail_transaksi.total
        FROM detail_transaksi
        JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
        JOIN barang ON detail_transaksi.id_barang = barang.id"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    }
    ?>


<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
              <th>Tanggal</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>QTY</th>
              <th>Sub Total</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
            $tgl = date('d-m-Y', strtotime($data['tgl_transaksi'])); // Ubah format tanggal jadi dd-mm-yyyy
            $totall = $totall+$data['total'];
            echo "<tr>";
            echo "<td>".$tgl."</td>";
            echo "<td>".$data['id_barang']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>Rp. ".number_format($data['harga'])."</td>";
            echo "<td>".$data['qty']."</td>";
            echo "<td class='bg-primary'>Rp.".number_format($data['total'])."</td>";
            echo "</tr>";
        }
    }else{ // Jika data tidak ada
        echo "<tr><td class='bg-danger' colspan='6'>Data Transaksi Tidak Ada</td></tr>";
    }
    ?>
    </tbody>
     <tfoot>
     <tr  class="bg-primary">
            <th colspan="5">Total Penjualan</th>
              <th>Rp. <?php echo number_format($totall) ?></th>
            </tr>
     </tfoot>
    </table>  
    </div>
</div>
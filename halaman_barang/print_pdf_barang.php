<?php ob_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require '../vendor/autoload.php';
?>

<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
<?php
include '../koneksi.php';
$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
            $query = "SELECT barang.id, barang.nama, barang.harga, barang.stok, barang.tanggal, kategori.nama_kategori
            FROM barang, kategori
            WHERE barang.id_kategori = kategori.id";
  
    ?>
	<table border="1" align="center">
	<tr>
            <th width="70px">Tanggal</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Nama Kategori</th>
              <th>Harga</th>
              <th>Stok</th>
	</tr>
    <?php
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
            $tgl = date('d-m-Y', strtotime($data['tanggal'])); // Ubah format tanggal jadi dd-mm-yyyy
            
            echo "<tr>";
            echo "<td>".$tgl."</td>";
            echo "<td>".$Bar->getBarcode($data['id'], $Bar::TYPE_CODE_128)." ".$data['id']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['nama_kategori']."</td>";
            echo "<td>Rp. ".number_format($data['harga'])."</td>";
            echo "<td>".$data['stok']."</td>";
            echo "</tr>";
        }
    }else{ // Jika data tidak ada
        echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
    }
    ?>
	</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('../bower_components/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('L','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Barang.pdf', 'D');
?>

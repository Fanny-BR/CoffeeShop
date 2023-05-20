<html>
<head>
	<title>Export Data Ke Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Barang.xls");
	?>
 
	<center>
		<h1>DATA BARANG TOKO <br/> Andhika</h1>
	</center>
 
	<table border="1">
		<tr>
			<th>Kode</th>
			<th>Nama</th>
			<th>Nam Kategori</th>
			<th>Harga</th>
            <th>Stok</th>
            <th>Tanggal</th>
		</tr>
        <?php 
        
        include '../koneksi.php';
		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"SELECT barang.id, barang.nama, barang.harga, barang.stok, barang.tanggal, kategori.nama_kategori
        FROM barang, kategori
        WHERE barang.id_kategori = kategori.id");
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $d['id']; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['nama_kategori']; ?></td>
			<td><?php echo $d['harga']; ?></td>
            <td><?php echo $d['stok']; ?></td>
            <td><?php echo $d['tanggal']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>
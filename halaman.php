<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];

		switch ($page) {
			case 'profil':
				include "halaman_transaksi/profil.php";
				break;
			case 'panduan':
				include "panduan.php";
				break;
			case 'transaksihariini':
				include "halaman_dasboard/transaksi_hari_ini.php";
				break;
			case 'barangmasuksihariini':
				include "halaman_dasboard/barang_masuk_hari_ini.php";
				break;
		}

		switch($page){
			case 'retur':
				include "halaman_retur/retur.php";
				break;
			case 'detailretur':
				include "halaman_retur/detail_retur.php";
				break;
		}

		switch($page){
			case 'laporan':
				include "halaman_laporan/laporan.php";
				break;
			case 'detailfilter':
				include "halaman_laporan/detail_filter.php";
				break;
			case 'print':
				include "halaman_laporan/print.php";
				break;
		}
 
		switch ($page) {
			case 'barang':
				include "halaman_barang/barang.php";
				break;
			case 'tambahbarang':
				include "halaman_barang/tambah_barang.php";
				break;
			case 'editbarang':
				include "halaman_barang/edit_barang.php";
				break;
			case 'hapusbarang':
				include "halaman_barang/hapus_barang.php";
				break;
			case 'exportbarang':
				include "halaman_barang/proses_export_excel.php";
				break;
			case 'kategoribarang':
				include "halaman_barang/kategori.php";
				break;
			case 'tambahkategori':
				include "halaman_barang/tambah_kategori.php";
				break;
			case 'editkategori':
				include "halaman_barang/edit_kategori.php";
				break;
			case 'hapuskategori':
				include "halaman_barang/hapus_kategori.php";
				break;
			
        }
        
        switch ($page) {
			case 'stok':
				include "halaman_stok/stok.php";
				break;
			case 'tambahstok':
				include "halaman_stok/tambah_stok.php";
				break;
			case 'kurangstok':
				include "halaman_stok/kurang_stok.php";
				break;			
		
        }
		
		switch ($page) {
			case 'transaksi':
				include "halaman_transaksi/transaksi.php";
				break;
			case 'akun':
				include "halaman_transaksi/akun.php";
				break;
			case 'logout':
				include "logout.php";
				break;
			case 'pilihproduk':
				include "halaman_transaksi/transaksi.php";
				break;	
			case 'histori':
				include "halaman_transaksi/riwayat.php";
				break;
			case 'historidetail':
				include "halaman_transaksi/riwayat_detail.php";
				break;	
			case 'keranjang':
				include "halaman_transaksi/keranjang.php";
				break;
			case 'hapuskeranjang':
				include "halaman_transaksi/hapus_keranjang.php";
				break;
			case 'updateqty':
				include "halaman_transaksi/update_qty.php";
				break;
			case 'reset':
				include "halaman_transaksi/reset_keranjang.php";
				break;	
			case 'prosesbayar':
				include "halaman_transaksi/proses_bayar.php";
				break;
			case 'hapusakun':
				include "halaman_transaksi/hapus_akun.php";
				break;	
			case 'editakun':
				include "halaman_transaksi/edit_akun.php";
				break;
			case 'uangkembali':
				include "halaman_transaksi/uang_kembali.php";
				break;	
			case 'nota':
				include "halaman_transaksi/nota.php";
				break;				
		
        }

	}else{
		include "halaman_dasboard/dasboard.php";
	}
 
?>
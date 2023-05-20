<?php
session_start();
if(isset($_POST['id_barang'])){
    
    $id_barang = $_POST['id_barang'];
    $qty = $_POST['jumlah'];

    $data = mysqli_query($koneksi,"SELECT barang.id, barang.nama, barang.harga, barang.stok, barang.tanggal, kategori.nama_kategori
    FROM barang, kategori
    WHERE barang.id_kategori = kategori.id AND barang.id='$id_barang'");
    $pecah = mysqli_fetch_assoc($data);
    
    if(isset($_SESSION['keranjang'])){  
          $item_array_id = array_column($_SESSION['keranjang'], 'id');  
          if(!in_array($id_barang, $item_array_id))  
          {  
               $count = count($_SESSION['keranjang']);  
               $barang = array(  
                'id' => $pecah['id'],
                'nama' => $pecah['nama'],
                'harga' => $pecah['harga'],
                'qty' => $qty,
                'diskon'=> 0
               );
               $_SESSION['keranjang'][$count] = $barang;
            }else{  
               echo '<script>alert("Produk sudah ada dalam keranjang, Silahkan update QTY nya aja")</script>';  
               echo '<script>window.location="index.php?page=transaksi"</script>';  
          }  
     }else{  
        $barang = array(  
            'id' => $pecah['id'],
            'nama' => $pecah['nama'],
            'harga' => $pecah['harga'],
            'qty' => $qty,
            'diskon'=> 0
          );  
          $_SESSION['keranjang'][] = $barang;
     }
     krsort($_SESSION['keranjang']);
          echo "<script>location='index.php?page=transaksi';</script>";
}
?>



<!--
	if(!empty($_POST["quantity"])) {
		$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
          $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 
          'code'=>$productByCode[0]["code"], 
          'quantity'=>$_POST["quantity"], 
          'price'=>$productByCode[0]["price"], 
          'image'=>$productByCode[0]["image"]));
		
		if(!empty($_SESSION["cart_item"])) {
			if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($productByCode[0]["code"] == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
						}
				}
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}
	}
-->

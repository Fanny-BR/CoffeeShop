<?php
include '../koneksi.php';
if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $id   = $line[0];
                $id_kategori  = $line[1];
                $nama  = $line[2];
                $harga = $line[3];
                $stok = $line[4];
                $tanggal = date('Y-m-d');
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM barang WHERE nama = '".$line[2]."'";
                $prevResult = $koneksi->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $koneksi->query("UPDATE barang SET id = '".$id."', id_kategori = '".$id_kategori."', harga = '".$harga."', stok = '".$stok."', tanggal = '".$tanggal."' WHERE nama = '".$nama."'");
                }else{
                    // Insert member data in the database
                    $koneksi->query("INSERT INTO barang (id, id_kategori, nama, harga, stok, tanggal) VALUES ('".$id."', '".$id_kategori."', '".$nama."', '".$harga."', '".$stok."', '".$tanggal."')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location:../index.php".$qstring);
?>
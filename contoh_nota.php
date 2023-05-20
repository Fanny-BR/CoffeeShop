<?php 
 $koneksi=new mysqli("localhost", "root", "", "andhika");
 $ambil=$koneksi->query("SELECT * FROM transaksi WHERE id='17'");
 $data=$ambil->fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Belanja</title>
    <style>
    .td{
        font-size: 10px;
        font-family: 'Consolas';
    }
    .th{
        font-size: 15px;
        font-family: 'Consolas';
    }
    </style>
</head>
<body>
    <div>
        <table width="250" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th class="th">Toko Andhika<br>
                 Jl. Ronggolawe Ds. Bogem Kec. Gurah Kediri<br>
                </th>
            </tr>
            <tr align="center"><td><hr></td></tr>
            <tr>
                <td class="td">7 november 2019 12:09:50</td>
            </tr>
            <tr align="center"><td><hr></td></tr>
        </table>
        <table width="250" border="0" cellpadding="1" cellspacing="0">
        <?php 
              $query = mysqli_query($koneksi, "SELECT detail_transaksi.*, barang.*
              FROM detail_transaksi, barang
              WHERE detail_transaksi.id_barang = barang.id AND id_transaksi='17'");
              while ($data1 = mysqli_fetch_array($query)){
              ?>    
        <tr>
            <th align="left" class="td"><?php echo $data1['nama'] ?></th>
            <th class="td"><?php echo $data1['qty'] ?></th>
            <th class="td">Rp. <?php echo number_format($data1['diskon_item']) ?></th>
            <th class="td" align="right">Rp. <?php echo number_format($data1['total'])?></th>
        </tr>
              <?php }?>
        <tr>
            <td colspan="4"><hr></td>
        </tr>
        </table>
        <table width="250" border="0" cellpadding="1" cellspacing="0">
        <tr>
            <td align="right" colspan="right" class="td">Total :</td>
            <td align="right" class="td">Rp. <?php echo number_format($data['total_bayar']) ?></td>
        </tr>
        <tr>
            <td align="right" colspan="right" class="td">Diskon :</td>
            <td align="right" class="td"><?php echo $data['diskon'] ?> %</td>
        </tr>
        <tr>
            <td align="right" colspan="right" class="td">Sub Total Bayar :</td>
            <td align="right" class="td">Rp. <?php echo number_format($data['sub_total_bayar']) ?></td>
        </tr>
        <tr>
            <td align="right" colspan="right" class="td">Jumlah Bayar :</td>
            <td align="right" class="td">Rp. <?php echo number_format($data['jumlah_bayar']) ?></td>
        </tr>
        <tr>
            <td align="right" colspan="right" class="td">Kembalian :</td>
            <td align="right" class="td">Rp. <?php echo number_format($data['kembalian']) ?></td>
        </tr>
        </table>
    </div>
</body>
</html>
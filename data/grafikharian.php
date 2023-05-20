<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["1", "2", "3", "4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
				datasets: [{
					label: '',
					data: [
                    <?php 
                    $tanggal = date('Y-m-01');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>, 
                    <?php 
                    $tanggal = date('Y-m-02');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>, 
                    <?php 
                    $tanggal = date('Y-m-03');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>, 
                    <?php 
                    $tanggal = date('Y-m-04');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-05');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-06');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-07');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-08');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-09');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-10');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-11');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-12');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-13');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-14');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-15');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-16');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-17');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-18');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-19');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-20');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-21');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-22');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-23');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-24');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-25');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-26');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-27');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-28');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-29');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-30');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>,
                    <?php 
                    $tanggal = date('Y-m-31');
					$grafik = mysqli_query($koneksi,"SELECT SUM(total_bayar) AS totaltransaksi FROM transaksi where tgl_transaksi='$tanggal'");
                    while($baris = mysqli_fetch_assoc($grafik)){?>
                    <?php echo $baris['totaltransaksi']; ?>
                    <?php }?>
					],
					backgroundColor: [
					'rgba(255, 99, 132)',
					'rgba(54, 162, 235)',
					'rgba(255, 206, 86)',
					'rgba(96, 11, 76)',
                    'rgba(237,85,101)',
                    'rgba(248,172,89)',
                    'rgba(35,198,200)',
                    'rgba(26,179,148)',
                    'rgba(28,132,198)',
                    'rgba(255,238,173)',
                    'rgba(255,204,92)',
                    'rgba(255,111,105)',
                    'rgba(255, 99, 132)',
					'rgba(54, 162, 235)',
					'rgba(255, 206, 86)',
					'rgba(96, 11, 76)',
                    'rgba(237,85,101)',
                    'rgba(248,172,89)',
                    'rgba(35,198,200)',
                    'rgba(26,179,148)',
                    'rgba(28,132,198)',
                    'rgba(255,238,173)',
                    'rgba(255, 99, 132)',
					'rgba(54, 162, 235)',
					'rgba(255, 206, 86)',
					'rgba(96, 11, 76)',
                    'rgba(237,85,101)',
                    'rgba(248,172,89)',
                    'rgba(35,198,200)',
                    'rgba(26,179,148)',
                    'rgba(28,132,198)'
					],
					borderColor: [

					],
					borderWidth: 0
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
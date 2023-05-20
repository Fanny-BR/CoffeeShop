<script>
		var ctx = document.getElementById("stokgrafik").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["1", "2", "3", "4","5","6","7","8","9","10"],
				datasets: [{
					label: '',
					data: [
                    <?php
                    $grafik = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok='1'");
                    $hitung = mysqli_num_rows($grafik);
                    echo $hitung;
                    ?>, 
                    <?php
                    $grafik = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok='2'");
                    $hitung = mysqli_num_rows($grafik);
                    echo $hitung;
                    ?>, 
                    <?php
                    $grafik = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok='3'");
                    $hitung = mysqli_num_rows($grafik);
                    echo $hitung;
                    ?>, 
                    <?php
                    $grafik = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok='4'");
                    $hitung = mysqli_num_rows($grafik);
                    echo $hitung;
                    ?>,
                    <?php
                    $grafik = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok='5'");
                    $hitung = mysqli_num_rows($grafik);
                    echo $hitung;
                    ?>,
                    <?php
                    $grafik = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok='6'");
                    $hitung = mysqli_num_rows($grafik);
                    echo $hitung;
                    ?>,
                    <?php
                    $grafik = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok='7'");
                    $hitung = mysqli_num_rows($grafik);
                    echo $hitung;
                    ?>,
                    <?php
                    $grafik = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok='8'");
                    $hitung = mysqli_num_rows($grafik);
                    echo $hitung;
                    ?>,
                    <?php
                    $grafik = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok='9'");
                    $hitung = mysqli_num_rows($grafik);
                    echo $hitung;
                    ?>,
                    <?php
                    $grafik = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok='10'");
                    $hitung = mysqli_num_rows($grafik);
                    echo $hitung;
                    ?>
					],
					backgroundColor: [
                    'rgba(26,179,148)',
                    'rgba(26,179,148)',
                    'rgba(26,179,148)',
                    'rgba(26,179,148)',
                    'rgba(26,179,148)',
                    'rgba(26,179,148)',
                    'rgba(26,179,148)',
                    'rgba(26,179,148)',
                    'rgba(26,179,148)',
                    'rgba(26,179,148)'
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
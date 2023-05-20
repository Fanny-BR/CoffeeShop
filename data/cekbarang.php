<script>
$(document).ready(function(){
	$('#inputkode').blur(function(){
		$('#pesan').html();
		var kode = $(this).val();

		$.ajax({
			type	: 'POST',
			url 	: 'data/proses_cek_ketersediaan_barang.php',
			data 	: 'inputkode='+kode,
			success	: function(data){
				$('#pesan').html(data);
			}
		})

	});
});
</script>
<?php if ($this->session->userdata("_token")) { ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />


	
	<div class="container col-12">



		<table id="dataTables" class="table table-hover">
			<thead>
				<tr>
					<td>#ID</td>
					<td>Ürün adi</td>
					<td>Ürün açıklama</td>
					<td>Ürün fiyat</td>
					<td>Ürün indirimi</td>
					<td>Güncelle</td>
					<td>Sil</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($veri as $key) {

					?>
					<tr>
						<td>
							<?php echo $key->urun_id; ?>
						</td>

						<td>
							<?php echo $key->urun_ad; ?>
						</td>
						<td>
							<?php echo $key->urun_aciklama; ?>
						</td>
						<td>
							<?php echo $key->urun_fiyat; ?>
						</td>
						<td>
							<?php echo $key->urun_indirim; ?>
						</td>
						<td>
							<button data-toggle="modal" data-target="#exampleModal1" id="<?php echo $key->urun_id ?>" class="btn btn-outline-primary btn-sm gncl">Güncelle</button>
						</td>
						<td>
							<button id="<?php echo $key->urun_id ?>"  class="btn btn-outline-danger btn-sm usl">Sil</button>
						</td>
					</tr>
				<?php }  ?>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		$(".gncl").click(function(){
			var id =$(this).attr("id");
			$("#urun_guncelle_getir").load("<?php echo base_url()?>urunler/urun_guncelle_sayfa/"+id);

		});

		$(".usl").click(function(){
			var id=$(this).attr("id");
			swal({
				title: "Ürünü silmek istiyor musun?",

				icon: "warning",
				buttons: "Sil",
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {

					$.ajax({
						type:"post",
						url: "<?php echo base_url()?>urunler/urun_sil",
						data:{"id":id},
						success:function(cevap){
							$("#urun_load").load("<?php echo base_url()?>urunler/urunleri_getir");
							$("#urun_sil").show(1000).delay(1000).hide(1000);

						}
					})




				} else {

				}
			});
		});
	</script>


	<script type="text/javascript">
		$('#dataTables').dataTable({
			"responsive": true,
			"dom": '<"html5buttons"B>lTfgitp',
			"language": {
				"emptyTable": "Gösterilecek ver yok.",
				"processing": "Veriler yükleniyor",
				"sDecimal": ".",
				"sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
				"sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
				"sInfoPostFix": "",
				"sInfoThousands": ".",
				"sLengthMenu": "Sayfada _MENU_ kayıt göster",
				"sLoadingRecords": "Yükleniyor...",
				"sSearch": "Ara:",
				"sZeroRecords": "Eşleşen kayıt bulunamadı",
				"oPaginate": {
					"sFirst": "İlk",
					"sLast": "Son",
					"sNext": "Sonraki",
					"sPrevious": "Önceki"
				},
				"oAria": {
					"sSortAscending": ": artan sütun sıralamasını aktifleştir",
					"sSortDescending": ": azalan sütun sıralamasını aktifleştir"
				},
				"select": {
					"rows": {
						"_": "%d kayıt seçildi",
						"0": "",
						"1": "1 kayıt seçildi"
					}
				}
			}
		});
	</script>
	

<?php } 
else{
	echo "Token bulunamadı";
}
?>
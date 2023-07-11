<div class="modal-body">
	<div align="center" id="güncel_bilgi"  class="alert alert-primary" role="alert">
		Ürün Güncellenmiştir.
	</div>
	<form method="post" id="urun_güncelle">
		<?php foreach ($veri as $key) {

			?>
			<input required="" type="text" value="<?php echo $key->urun_ad; ?>" class="form-control mt-1  asd" autocomplete="off" id="txt1" name="ad" placeholder="Ürün adı">

			<input required="" type="text" value="<?php echo $key->urun_aciklama; ?>" class="form-control mt-1  asd" autocomplete="off"  name="acık" placeholder="Ürünün açıklaması">

			<input required="" type="text" value="<?php echo $key->urun_fiyat; ?>" class="form-control mt-1 asd" autocomplete="off"  name="fiyat" placeholder="Ürünün fiyatı">
			<input required="" type="hidden" value="<?php echo $key->urun_id; ?>" class="form-control mt-1 asd" autocomplete="off"  name="id" placeholder="Ürünün fiyatı">



		<?php } ?>


	</form>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Çıkış</button>
	<button type="button" id="güncelle" class="btn btn-primary ">Güncelle</button>
</div>

<script type="text/javascript">
	$("#güncel_bilgi").hide();
	$("#güncelle").click(function(){

		$.ajax({
			type:"post",
			url:"<?php echo base_url()?>urunler/urun_guncelle",
			data:$("#urun_güncelle").serialize(),
			success:function(cevap){

				$("#urun_load").load("<?php echo base_url()?>urunler/urunleri_getir");
				$("#güncel_bilgi").show(1000).delay(1000).hide(1000);

			}

		})
	})
</script>
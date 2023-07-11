	<?php 
	if ($this->session->userdata("_token")) {
		




		?>

		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title></title>

			<!-- BOOTSTRAP -->
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/css/style1.css");?>">
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		</head>
		<body>

			<div class="container">
				<div align="right">
					<button id="cikis" class="btn btn-outline-danger mt-2 mr-2 ">Çıkış</button>
				</div>
				<button  type="button" class="btn btn-primary mt-2 ml-2" data-toggle="modal" data-target="#exampleModal">
					Ürün Ekle
				</button>

				<br>
				<button id="urun_getir" class="btn btn-primary mt-2 ml-2">
					Ürünleri Listele
				</button>

				<br><br>
				<div align="center" id="urun_sil"  class="alert alert-danger" role="alert">
					Ürün Silinmiştir.
				</div>
				<br>

				<div id="urun_load" class="mt-4">


				</div>








				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ürün Ekle</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">

									<span aria-hidden="true">&times;</span>

								</button>
							</div>
							<div class="modal-body">
								<div align="center" id="bilgilendirme"  class="alert alert-primary" role="alert">
									Ürün Eklenmiştir
								</div>
								<form method="post" id="urun_bilgi">
									<input required="" type="text" class="form-control mt-1  asd" autocomplete="off" id="txt1" name="ad" placeholder="Ürün adı">

									<input required="" type="text" class="form-control mt-1  asd" autocomplete="off"  name="acık" placeholder="Ürünün açıklaması">

									<input required="" type="text" class="form-control mt-1 asd" autocomplete="off"  name="fiyat" placeholder="Ürünün fiyatı">

									<label class="mt-1">Ürün indirimi: </label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="indirim" value="Var" checked>
										<label class="form-check-label" for="exampleRadios1">
											Var
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="indirim"  value="Yok">
										<label class="form-check-label" for="exampleRadios2">
											Yok
										</label>
									</div>
									<input type="hidden" value="<?php echo $this->session->userdata("_token"); ?>" name="_token">
								</form>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Çıkış</button>
								<button type="button" id="tetik" class="btn btn-primary ">Ekle</button>
							</div>
						</div>
					</div>
				</div>


				<!-- Urun günclle modal-->

				<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ürün Güncelle</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">

									<span aria-hidden="true">&times;</span>

								</button>
							</div>
							<div class="modal-body">

								<div id="urun_guncelle_getir"></div>

							</div>

						</div>
					</div>
				</div>

				<script src="<?php echo base_url("vendor/js/jqery.js");?>"></script>
				<script src="<?php echo base_url("vendor/js/deneme.js");?>"></script>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
				<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
				<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
				<script type="text/javascript">
					$("#bilgilendirme").hide();
					
					$("#urun_sil").hide();

					$("#tetik").click(function(){

						$.ajax({
							type:"post",
							url:"<?php echo base_url()?>urunler/index",
							data:$("#urun_bilgi").serialize(),
							success:function(cevap){

								$(".asd").val("");
								$("#bilgilendirme").show(1000).delay(1000).hide(1000);

							}

						})
					})

					$("#urun_getir").click(function(){
						$("#urun_load").load("<?php echo base_url()?>urunler/urunleri_getir")
					})
					$("#cikis").click(function(){
						swal({
							title: "Çıkış yapmak istiyor musun?",

							icon: "warning",
							buttons: "Çıkış yap!",
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {

								window.location.replace("<?php echo base_url()?>cikis");
							} else {

							}
						});

					})
				</script>



				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
			</div>
		</body>
		</html>
		<?php
	}
	else {
		header("Location:".base_url()."login?durum=amac");
	} ?>
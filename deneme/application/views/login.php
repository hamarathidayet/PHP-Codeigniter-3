<?php 

if ($this->session->userdata("_token")) {
	redirect("urunler/urun_lis");
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/css/style1.css");?>">

</head>
<body style="background-image: url(<?php echo base_url("vendor/image/login_bg.jpg");?>);">
	<div class="row">
		<div align="center"  class="dv1 ">
			<?php
			if ($_GET) {


				if ($_GET['durum']=="bosalan") { ?>
					<!-- Boş alan urarısı -->
					<div class="alert alert-danger" role="alert">
						Lütfen boş alan bırakmayınız.
					</div>
					<!-- Boş alan urarısı bitiş -->

				<?php } 


				if ($_GET['durum']=="cikisyapildi") { ?>
					<!-- Çıkış yapıldı bildirimi -->
					<div class="alert alert-primary" role="alert">
						Başarılı bir şekilde çıkış yaptınız.
					</div>
					<!-- Çıkış yapıldı bildirimi bitiş -->

				<?php } ?>

				<!-- Yaska alan urarısı-->
				<?php



				if ($_GET['durum']=="amac") { ?>
					<!-- Boş alan urarısı -->
					<div class="alert alert-danger" role="alert">
						Amacın ne senin loooooooooooo 😡
					</div>
					<!-- Yaska alan urarısı bitiş -->

				<?php } ?>




				<?php if ($_GET['durum']=="yanlıssifre") { ?>
					<!-- Yanlış şifre -->
					<div class="alert alert-danger" role="alert">
						Kullanıcı adı veya şifre hatalıdır.
					</div>
					<!-- Yanlış şifre bitiş -->

				<?php }
			}?>


			<img src="<?php echo base_url("vendor/image/login.png");?>" width="200px">
			<br>
			Giriş Yap
			<br><br>
			<form id="giris_bilgi">
				<input class="txt text-center" autocomplete="off" type="text" placeholder="Kullanıcı adı" name="kullanici_adi">
				<br><br>
				<input class="txt text-center" type="password" placeholder="Şifre"  name="kullanici_sifre">
				<br><br>
				<input type="button" id="giris" value="Giriş yap" class="btn btn-outline-primary" name="btn">
			</form>
		</div>

		<div align="center" class="dv2">
			<img src="<?php echo base_url("vendor/image/login.png");?>" width="200px">
			<br>
			Kayıt ol
			<br><br>

			<form id="giris_bilgi">
				<input class="txt text-center" autocomplete="off" type="text" placeholder="Kullanıcı adı" name="kullanici_adi">
				<br><br>
				<input class="txt text-center" type="password" placeholder="Şifre"  name="kullanici_sifre">
				<br><br>
				<input type="button" id="giris1" value="Kayıt ol" class="btn btn-outline-primary" name="btn">
			</form>
		</div>
	</div>


	<script src="<?php echo base_url("vendor/js/jqery.js");?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$("#giris").click(function(){
			
			$.ajax({
				type:"post",
				url:"<?php echo base_url()?>login/loging",
				data:$("#giris_bilgi").serialize(),
				success:function(cevap){

					window.location.replace(cevap);

				}
			})
		})
	</script>
</body>
</html>
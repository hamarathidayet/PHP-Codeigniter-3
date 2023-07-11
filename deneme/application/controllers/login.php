<?php 
defined('BASEPATH') or exit('No direct script access allowed');


require (APPPATH.'/libraries/RestController.php');

use  chriskacerguis\RestServer\RestController;
//Login getirme sayfası
class login extends RestController {
	public function index_get(){
		$this->load->view("login");
	}

	//Giriş kontrol
	public function loging_post(){
		if ($this->input->method()=="post") {
			$kadi=$this->input->post("kullanici_adi");
			$sifre=$this->input->post("kullanici_sifre");

			//Boş alan kontrollü
			if (!$kadi || !$sifre) {
				echo "giris/index.php?durum=bosalan";
				
			}

			else {
				$giris=$this->common_model->get([
					"kullanici_ad" => $kadi,
					"kullanici_sifre" =>$sifre
				]
				,"kullanici");
				//Giriş onay ve tokken oluşturma
				if ($giris) {
					$this->session->set_userdata('_token', md5(rand(0,999999999)));
					echo "urunler/urun_lis";
					
				}
				else {
					echo "giris/index.php?durum=yanlıssifre";
				}
			}
		}
	}
}?>

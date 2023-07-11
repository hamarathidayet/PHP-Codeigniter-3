<?php 

defined('BASEPATH') or exit('No direct script access allowed');


require (APPPATH.'/libraries/RestController.php');

use  chriskacerguis\RestServer\RestController;

class urun_islemleri extends RestController {

	

	public function index_post(){
		

		if ($this->session->userdata("_token")) {
			
			$_token=$this->input->post("_token");
			
			if ($this->session->userdata("_token")==$_token) {
				$ch1=array(
					"urun_ad"=> $this->input->post("ad"),
					"urun_aciklama" => $this->input->post("acık"),
					"urun_fiyat"=> $this->input->post("fiyat"),
					"urun_indirim"=> $this->input->post("indirim")
				);
				$giris=$this->common_model->insert("urunler",$ch1);

				if ($giris) {
					echo "Eklendi";
				}
				else {
					echo "Başarsız";
				}

			}
			else {
				echo "Token bulunamadı";
			}
		}
		else {
			echo "Token bulunamadı";
		}

	}



	public function urun_lis_get() {
		if ($this->session->userdata("_token")) {
			$this->load->view("urun");
		}
		else {
			header("Location:".base_url()."login?durum=amac");
		}
	}

	public function urunleri_getir_get(){
		if ($this->session->userdata("_token")) {
			$veri=$this->db->get("urunler")->result();
			$sonuç=array("veri" =>$veri);
			$this->load->view("load",$sonuç);
		}
		else {
			echo "Token bulunamadı";
		}
	}

	public function urun_guncelle_sayfa_get($id){
		



		$veri=$this->db->
		where("urun_id =", $id)->
		get("urunler")->
		result();
		$veriler=array("veri" => $veri);
		$this->load->view("urun_guncelle",$veriler);



	}

	public function urun_guncelle_post(){
		


		$ch1=array(
			"urun_ad"=> $this->input->post("ad"),
			"urun_aciklama" => $this->input->post("acık"),
			"urun_fiyat"=> $this->input->post("fiyat"),
			
		);

		$ch=array(
			"urun_id" =>$this->input->post("id")
		);
		$giris=$this->common_model->update($ch,"urunler",$ch1);


	}

	public function urun_sil_post(){

		$ch=array( "urun_id" =>$this->input->post("id"));

		$this->common_model->delete($ch,"urunler");

	}
}





?>


<?php 

defined('BASEPATH') or exit('No direct script access allowed');


require (APPPATH.'/libraries/RestController.php');

use  chriskacerguis\RestServer\RestController;
class cikis extends RestController {

	public function index_get(){
		$this->session->unset_userdata('_token');
		redirect("giris/index.php?durum=cikisyapildi");
	}
}

 ?>
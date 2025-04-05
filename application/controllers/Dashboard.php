<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Dashboard {

   public function index(){
		$this->load->view('/layout/header');
		$this->load->view('/layout/footer');
	}

}

?>
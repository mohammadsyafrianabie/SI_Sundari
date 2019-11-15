<?php
defined("BASEPATH") or exit("Direct access not allowed");

class Blank extends CI_Controller{
	public function index(){
		$data["title"] = "Blank";
		$this->load->view("view_blank", $data);
	}
}

?>
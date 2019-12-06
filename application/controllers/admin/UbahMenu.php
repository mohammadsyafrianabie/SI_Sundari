<?php
defined("BASEPATH") or exit("No direct access allowed");

class UbahMenu extends CI_Controller{
	
	function __construct(argument)
	{
		parent::__construct();
		$this->load->model("ModelUbahMenu");
	}

	public function index(){}

	public function ubah($id){
		$data["title"] = "Ubah Menu";
		$data["menurow"] = $this->ModelUbahMenu->getDataById($id);
		$this->load->view("admin/view_ubahmenu", $data);
	}

	public function confirm(){}
}
?>
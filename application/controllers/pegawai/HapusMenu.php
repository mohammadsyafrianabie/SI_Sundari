<?php
defined("BASEPATH") or exit("No direct access allowed");

class HapusMenu extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelHapusMenu");
	}

	public function index($id){
		$data["title"] = "Hapus Menu";
		$data["hapusrow"] = $this->ModelHapusMenu->getDataById($id);
		$this->load->view("admin/view_hapusmenu", $data);
	}

	public function confirm($id){
		$this->ModelHapusMenu->HapusMenu($id);
		redirect("admin/Menu");
	}
}
?>
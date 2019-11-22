<?php
defined("BASEPATH") or exit("No direct access allowed");

class HapusUser extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelHapusUser");
	}

	public function index($id){
		$data["title"] = "Hapus User";
		$data["hapusrow"] = $this->ModelHapusUser->getDataById($id);
		$this->load->view("admin/view_hapususer", $data);
	}

	public function confirm($id){
		$this->ModelHapusUser->hapusUser($id);
		redirect("admin/UbahUser");
	}
}
?>
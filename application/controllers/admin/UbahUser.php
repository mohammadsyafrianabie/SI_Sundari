<?php
defined("BASEPATH") or exit("No direct access allowed");

class UbahUser extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("ModelUbahUser");
	}

	// Testing only
	// public function index(){
	// 	$data["user"] = $this->ModelUbahUser->getAllData();
	// 	$this->load->view("admin/user_test", $data);
	// }

	public function ubah($id){
		$data["title"] = "Ubah User";
		$data["userrow"] = $this->ModelUbahUser->getDataById($id);
		$this->load->view("admin/view_ubahuser", $data);
	}

	public function confirm(){

		$rule_ubahUser = array(
			array(
				"field" => "id_user",
				"label" => "Id User",
				"rules" => "required"
			),
			array(
				"field" => "nama",
				"label" => "Nama",
				"rules" => "required|min_length[4]|max_length[32]"
			),
			array(
				"field" => "hak_akses",
				"label" => "Hak Akses",
				"rules" => "required"
			)
		);
		$this->form_validation->set_rules($rule_ubahUser);

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "Ubah User";
			$data["userrow"] = $this->ModelUbahUser->getDataById($this->input->post("id_user"));
			$this->load->view("admin/view_ubahuser", $data);
		}else{
			$id_user = $this->input->post("id_user");
			$nama = $this->input->post("nama");
			$hak_akses = $this->input->post("hak_akses");

			$dataUpdate = array(
				"id_user" => $id_user,
				"nama" => $nama,
				"hak_akses" => $hak_akses
			);

			$this->ModelUbahUser->updateUser($id_user, $dataUpdate);
			redirect(base_url("admin/User"));
		}

	}
}
?>
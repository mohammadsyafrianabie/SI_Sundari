<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UbahPassword extends CI_Controller {

	private $id;

	function __construct(){
		parent::__construct();
		$this->load->model("ModelUbahPassword");
	}

	public function index($id)
	{
		$this->id = $id;
		$data["title"] = "Ubah Password";
		$data["datapass"] = $this->ModelUbahPassword->getDataById($this->id);
		$this->load->view("admin/view_ubahpassword", $data);
	}

	public function confirm(){
		$rule_ubahPass = array(
			array(
				"field" => "id_user",
				"label" => "Id User",
				"rules" => "required"
			),
			array(
				"field" => "password",
				"label" => "Password",
				"rules" => "required|min_length[8]|max_length[32]"
			),
			array(
				"field" => "passconf",
				"label" => "Konfirmasi Password",
				"rules" => "required|matches[password]"
			)
		);

		$this->form_validation->set_rules($rule_ubahPass);

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "Ubah Password";
			$data["datapass"] = $this->ModelUbahPassword->getDataById($this->input->post("id_user"));
			$this->load->view("admin/view_ubahpassword", $data);
		}else{
			$id_user = $this->input->post("id_user");
			$password = $this->input->post("password");
			$passconf = $this->input->post("passconf");

			// $dataUpdate = array(
			// 	"id_user" => $id_user,
			// 	"password" => $password
			// );

			// $this->ModelUbahUser->updateUser($id_user, $dataUpdate);
			redirect(base_url("admin/UbahPassword"));
		}
	}
}
?>
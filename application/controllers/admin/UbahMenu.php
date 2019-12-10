<?php
defined("BASEPATH") or exit("No direct access allowed");

class UbahMenu extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("ModelUbahMenu");
	}

	public function ubah($id){
		$data["title"] = "Ubah Menu";
		$data["menurow"] = $this->ModelUbahMenu->getDataById($id);
		$this->load->view("admin/view_ubahmenu", $data);
	}

	public function confirm(){

		$rule_ubahmenu = array(
			array(
				"field" => "id_menu",
				"label" => "Id menu",
				"rules" => "required"
			),
			array(
				"field" => "nama",
				"label" => "Nama",
				"rules" => "required"
			),
			array(
				"field" => "tipe",
				"label" => "Tipe",
				"rules" => "required"
			),
			array(
				"field" => "harga",
				"label" => "Harga",
				"rules" => "required|numeric"
			)
		);
		$this->form_validation->set_rules($rule_ubahmenu);

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "Ubah Menu";
			$data["menurow"] = $this->ModelUbahMenu->getDataById($this->input->post("id_menu"));
			$this->load->view("admin/view_ubahmenu", $data);
		} else {
			$id_menu = $this->input->post("id_menu");
			$nama = $this->input->post("nama");
			$tipe = $this->input->post("tipe");
			$harga = $this->input->post("harga");

			$dataUpdate = array(
				"id_menu" => $id_menu,
				"nama" => $nama,
				"tipe" => $tipe,
				"harga" => $harga
			);

			$this->ModelUbahMenu->updateMenu($id_menu, $dataUpdate);
			redirect(base_url("admin/Menu"));
		}
	}
}
?>
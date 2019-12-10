<?php
defined("BASEPATH") or exit("No direct access allowed");

class tambahstok extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("Modeltambahstok");
	}

	// Testing only
	// public function index(){
	// 	$data["tambah_stok"] = $this->Modeltambahstok->getAllData();
	// 	$this->load->view("admin/tambahstok_test", $data);
	// }

	public function tambah($id){
		$data["title"] = "tambah_stok";
		$data["tambahstokrow"] = $this->Modeltambahstok->getDataById($id);
		$this->load->view("admin/view_tambahstok", $data);
	}

	public function confirm(){

		$rule_tambahstok = array(
			array(
				"field" => "id_stok",
				"label" => "Id stok",
				"rules" => "required"
			),
			array(
				"field" => "id_menu",
				"label" => "Id_menu",
				"rules" => "required"
			),
			array(
				"field" => "tanggal",
				"label" => "Tanggal",
				"rules" => "required"
			),
			array(
				"field" => "jumlah",
				"label" => "Jumlah",
				"rules" => "required"
			)
		);
		$this->form_validation->set_rules($rule_tambahstok);

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "tambahstok";
			$data["tambahstokrow"] = $this->Modeltambahstok->getDataById($this->input->post("id_stok"));
			$this->load->view("admin/view_tambahstok", $data);
		}else{
			$id_stok = $this->input->post("id_stok");
			$id_menu = $this->input->post("id_menu");
			$tanggal = $this->input->post("tanggal");
			$jumlah = $this->input->post("jumlah");


			$dataUpdate = array(
				"id_stok" => $id_stok,
				"id_menu" => $id_menu,
				"tanggal" => $tanggal,
				"Jumlah" => $jumlah
			);

			$this->Modeltambahstok->updatestok($id_stok, $dataUpdate);
			redirect(base_url("admin/tambahstok"));
		}

	}
}

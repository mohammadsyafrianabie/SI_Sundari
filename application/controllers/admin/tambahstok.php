<?php
defined("BASEPATH") or exit("No direct access allowed");

class Tambahstok extends CI_Controller{
	
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

	public function save(){

		$id_menu 	= $this->input->post("id_menu");
		$stok 		= $this->input->post("stok");
		$query 		= $this->Modeltambahstok->getDataById($id_menu);
		foreach ($query as $key) {
			# code...
			$jumlah_stok = $key->stok + $stok;
		}
		$this->Modeltambahstok->save($id_menu, $jumlah_stok);
		redirect("admin/menu");

	}

	public function confirm(){

		$rule_tambahstok = array(
			array(
				"field" => "id_stok",
				"label" => "Id_stok",
				"rules" => "required"
			),
			array(
				"field" => "id_menu",
				"label" => "Id_menu",
				"rules" => "required"
			),
			array(
				"field" => "tipe",
				"label" => "tipe",
				"rules" => "required"
			),
			array(
				"field" => "stok",
				"label" => "stok",
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
			$tipe = $this->input->post("tipe");
			$stok = $this->input->post("stok");

			$dataUpdate = array(
				"id_stok" => $id_stok,
				"id_menu" => $id_menu,
				"tipe" => $tipe,
				"stok" => $stok
			);

			$this->Modeltambahstok->updatestok($id_stok, $dataUpdate);
			redirect(base_url("admin/tambahstok"));
		}

	}
}

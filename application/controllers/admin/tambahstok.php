<?php
defined("BASEPATH") or exit("No direct access allowed");

class Tambahstok extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("Modeltambahstok");
	}

	public function index($id){
		// $id untuk menu yang dipilih
		$data["title"] = "Tambah Stok";
		$data["id_menu"] = $id;
		$data["id_stok"] = $this->buatIdBaru();
		$this->load->view("admin/view_tambahstok", $data);
	}

	public function buatIdBaru(){
		date_default_timezone_set('Asia/Jakarta');
		$idBaru = "s". date("YmdHms");
		// $last_id = $this->Modeltambahstok->getLastId();
		// $len = strlen($last_id);
		// $get_left = substr($last_id, 0, 1);
		// $get_right = substr($last_id, 1, $len);
		// $new_number = intval($get_right) + 1;
		// $new_id = $get_left. sprintf("%03d", $new_number);
		return $idBaru;
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
				"field" => "tanggal",
				"label" => "Tanggal",
				"rules" => "required"
			),
			array(
				"field" => "jumlah",
				"label" => "jumlah",
				"rules" => "required|numeric"
			)
		);

		$this->form_validation->set_rules($rule_tambahstok);

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "Tambah Stok";
			$data["id_stok"] = $this->input->post("id_stok");
			$data["id_menu"] = $this->input->post("id_menu");
			$this->load->view("admin/view_tambahstok", $data);
		}else{
			$id_stok = $this->input->post("id_stok");
			$id_menu = $this->input->post("id_menu");
			$tanggal = $this->input->post("tanggal");
			$jumlah = $this->input->post("jumlah");

			$dataTambah = array(
				"id_stok" => $id_stok,
				"id_menu" => $id_menu,
				"tanggal" => $tanggal,
				"jumlah" => $jumlah
			);

			$this->Modeltambahstok->tambahstok($dataTambah);
			redirect(base_url("admin/Menu"));
		}

	}
}

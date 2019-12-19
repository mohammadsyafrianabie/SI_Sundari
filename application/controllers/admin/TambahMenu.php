<?php
defined("BASEPATH") or exit("No direct access allowed");

class TambahMenu extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("ModelTambahMenu");
	}

	public function index(){
		$data["title"] = "Tambah Menu";
		$data["id_baru_menu"] = $this->trimming();
		$this->load->view("admin/view_tambahmenu", $data);
	}

	public function tambahMenu(){
		$id_menu = $this->input->post('id_menu');
		$nama = $this->input->post('nama');
		$tipe = $this->input->post('tipe');
		$stok = $this->input->post('stok');
		$harga = $this->input->post('harga');
 
		$data = array(
			'id_menu' => $id_menu,
			'nama' => $nama,
			'tipe' => $tipe,
			'stok' => $stok,
			'harga' => $harga
			);
		$this->ModelTambahMenu->tambahMenu($data,'menu');
		redirect('admin/menu');
	}

	public function trimming(){
		$last_id = $this->ModelTambahMenu->getLastId();
		$len = strlen($last_id);
		$get_left = substr($last_id, 0, 1);
		$get_right = substr($last_id, 1, $len);
		$new_number = intval($get_right) + 1;
		$new_id = $get_left. sprintf("%03d", $new_number);
		return $new_id;
	}
}

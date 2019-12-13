<?php
defined("BASEPATH") or exit("No direct access allowed");

class TambahUser extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("ModelTambahUser");
	}

	public function index(){
		$data["title"] = "Tambah User";
		$data["id_baru_user"] = $this->trimming();
		$this->load->view("admin/view_tambahuser", $data);
	}

	public function tambahUser(){
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$hak_akses = $this->input->post('hak_akses');
 
		$data = array(
			'id_user' => $id_user,
			'nama' => $nama,
			'password' => $password,
			'hak_akses' => $hak_akses
			);
		$this->ModelTambahUser->tambahUser($data,'user');
		redirect('admin/user');
	}

	public function trimming(){
		$last_id = $this->ModelTambahUser->getLastId();
		$len = strlen($last_id);
		$get_left = substr($last_id, 0, 1);
		$get_right = substr($last_id, 1, $len);
		$new_number = intval($get_right) + 1;
		$new_id = $get_left. sprintf("%03d", $new_number);
		return $new_id;
	}
}

<?php
defined("BASEPATH") or exit("No direct access allowed");

class Modeltambahstok extends CI_Model{
	private $table = "user";

	public function tambahstok($id){
		$this->db->where("id_stok", $id);
		$this->db->delete($this->table);
	}

	public function getDataById($id){
		$this->db->where("id_stok", $id);
		return $this->db->get($this->table)->result();
	}
}
?>
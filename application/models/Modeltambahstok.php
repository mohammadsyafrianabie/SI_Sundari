<?php
defined("BASEPATH") or exit("No direct access allowed");

class Modeltambahstok extends CI_Model{
	private $table = "menu";

	public function tambahstok($id){
		$this->db->where("id_menu", $id);
		$this->db->delete($this->table);
	}

	public function getDataById($id){
		$this->db->where("id_menu", $id);
		return $this->db->get($this->table)->result();
	}

	function save($id_menu, $jumlah_stok)
	{
		$this->db->where("id_menu", $id_menu);
		$this->db->update($this->table, array('stok' => $jumlah_stok ));
	}
}
?>
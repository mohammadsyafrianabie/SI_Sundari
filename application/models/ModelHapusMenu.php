<?php
defined("BASEPATH") or exit("No direct access allowed");

class ModelHapusMenu extends CI_Model{
	private $table = "menu";

	public function HapusMenu($id){
		$this->db->where("id_menu", $id);
		$this->db->delete($this->table);
	}

	public function getDataById($id){
		$this->db->where("id_menu", $id);
		return $this->db->get($this->table)->result();
	}
}
?>
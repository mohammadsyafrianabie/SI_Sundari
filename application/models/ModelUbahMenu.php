<?php
defined("BASEPATH") or exit("No direct access allowed");

class ModelUbahMenu extends CI_Model {
	private $table = "menu";

	function updateMenu($id, $data){
		$this->db->where("id_menu", $id);
		$this->db->update($this->table, $data);
	}

	function getDataById($id){
		$this->db->where("id_menu", $id);
		return $this->db->get($this->table)->result();
	}

	// Testing purpose only
	function getAllData(){
		return $this->db->get($this->table)->result();
	}
	

}


?>
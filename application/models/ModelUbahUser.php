<?php
defined("BASEPATH") or exit("No direct access allowed");

class ModelUbahUser extends CI_Model{
	private $table = "user";

	function updateUser($id, $data){
		$this->db->where("id_user", $id);
		$this->db->update($this->table, $data);
	}

	function getDataById($id){
		$this->db->where("id_user", $id);
		return $this->db->get($this->table)->result();
	}

	// Testing purpose only
	function getAllData(){
		return $this->db->get($this->table)->result();
	}
}
?>
<?php
defined("BASEPATH") or exit("No direct access allowed");

class ModelHapusUser extends CI_Model{
	private $table = "user";

	public function hapusUser($id){
		$this->db->where("id_user", $id);
		$this->db->delete($this->table);
	}

	public function getDataById($id){
		$this->db->where("id_user", $id);
		return $this->db->get($this->table)->result();
	}
}
?>
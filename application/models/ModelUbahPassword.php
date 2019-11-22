<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUbahPassword extends CI_Model {
	private $table = "user";

	function updatePassword($id, $data){
		$this->db->where("id_user", $id);
		$this->db->update($this->table, $data);
	}

	function getDataById($id){
		$this->db->where("id_user", $id);
		return $this->db->get($this->table)->result();
	}

	function getOldPassword($id){
		$oldresult = $this->getDataById($id);
		foreach ($oldresult as $od) {
			return $od->password;
		}
	}
}

?>
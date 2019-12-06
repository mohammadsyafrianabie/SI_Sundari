<?php
defined("BASEPATH") or exit("No Direct Access Allowed");

class ModelAuth extends CI_Model{
	private $table = "user";

	public function getDataByNama($nama){
		$this->db->where("nama", $nama);
		return $this->db->get($this->table)->result();
	}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends CI_Model {
	private $table = "transaksi";

	function getTransaksi(){
		return $this->db->get($this->table);
	}

	function getMenuById($id){
		$this->db->where('id_menu', $id);
		return $this->db->get($table)->result;
	}

	function lookMenu(){
		return $this->db->get("menu")->result();
	}

	function addTransaksi($transaksi){
		$this->db->insert($this->table, $transaksi);
	}

	function updateTransaksi($id, $transaksi){
		$this->db->where("id_transaksi", $id);
		$this->db->update($this->table, $transaksi);
	}

	function getLastTransaksi(){
		$last = null;
		$trans = $this->getTransaksi()->result();
		foreach ($trans as $t) {
			$last = $t->id_transaksi;
		}
		return $last;
	}
}

?>
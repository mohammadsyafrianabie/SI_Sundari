<?php
defined("BASEPATH") or exit("No direct access allowed");

class Modeltambahstok extends CI_Model{
	private $table = "tambah_stok";

	function tambahstok($data){
		$this->db->insert($this->table, $data);
		$this->ubahStokMenu($data["id_menu"], $data["jumlah"]);
	}

	function ubahStokMenu($id_menu, $jumlah){
		// Update tambah
		$this->db->query("UPDATE menu SET stok=stok+". $jumlah. " WHERE id_menu='". $id_menu. "'");
	}

	function getLastId(){
		$rows = $this->db->get($this->table)->result();
		$tmp = null;
		foreach ($rows as $rw) {
			// Harus diubah
			$tmp = $rw->id_stok;
		}
		if (is_null($tmp)) {
			// Harus diubah
			$tmp = "s000";
			return $tmp;
		}else{
			return $tmp;
		}
	}
}
?>
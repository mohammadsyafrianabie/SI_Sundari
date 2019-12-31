<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends CI_Model {
	private $table = "transaksi";
	private $sess_beli = "data_beli";

	function getTransaksi(){
		return $this->db->get($this->table);
	}

	function getMenuById($id){
		$this->db->where('id_menu', $id);
		return $this->db->get("menu")->result();
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



	/*
		Semua fungsi dibawah ini Untuk mengelola array session transaksi
	*/
	function getSize(){
		// Ambil ukuran tabel(array) dalam session
		$tmp = $this->session->userdata($this->sess_beli);
		return count($tmp);
	}

	function getNamaMenu($id){
		$menu = $this->getMenuById($id);
		$tmp = "";
		foreach($menu as $m){
			$tmp = $m->nama;
		}
		return $tmp;
	}

	function getIndex($no){
		// Sebelum mengubah atau menghapus, maka harus mencari indexnya (dalam array yang disimpan di session) terlebih dahulu
		$tmp = $this->session->userdata($this->sess_beli);
		foreach ($tmp as $key => $val) {
			if($val["noBeli"]==$no){
				return $key;
			}
		}
		return null;
	}

	/*
	Semua fungsi yang mengelola array session
	*/

	function addData($idMenu, $jumlahBeli, $harga, $namaMenu){
		// Tampung sementara isi tabel
		$tmp = $this->session->userdata($this->sess_beli);
		$new_id = count($tmp) + 1;
		// Ambil Nama Menu
		array_push($tmp, array("noBeli" => $new_id, "idMenu" => $idMenu, "namaMenu" => $namaMenu, "jumlahBeli" => $jumlahBeli, "harga" => $harga, "subHarga" => ($jumlahBeli * $harga)));
		// Simpan kembali ke session
		$this->session->set_userdata($this->sess_beli, $tmp);
	}

	function updateData($noBeli, $idmenu, $jumlahBeli, $harga, $namaMenu){
		/*
		TODO updatedata
		1. Get id atau $no
		2. Search index
		3. datalist[index] = array(new_data)
		4. save to session
		*/
		$tmp = $this->session->userdata($this->sess_beli);
		$id = $this->getIndex($no);
		$tmp[$id] = array("noBeli" => $noBeli, "idMenu" => $idMenu, "namaMenu" => $namaMenu, "jumlahBeli" => $jumlahBeli, "harga" => $harga, "subHarga" => ($jumlahBeli * $harga));
		// Simpan kembali ke session
		$this->session->set_userdata($this->sess_beli, $tmp);
	}

	function deleteData($no){
		$tmp = $this->session->userdata($this->sess_beli);
		$id =  $this->getIndex($no);
		unset($tmp[$id]);
		$this->session->set_userdata($this->sess_beli, $tmp);
	}
}

?>
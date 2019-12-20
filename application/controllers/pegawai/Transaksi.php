<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ModelTransaksi');
	}

	// Index halaman utama
	public function index(){

		$data['data_beli'] = $this->session->userdata("data_beli");
		$data['lookMenu'] = $this->ModelTransaksi->lookMenu();
		$data['table_size'] = $this->getSize();
		$data["title"] = "Transaksi - SI Sundari";
		$data["formname"] = "transaksi";

		$this->load->view('pegawai/view_transaksi', $data);
	}

	private function getSize(){
		// Ambil ukuran tabel(array) dalam session
		$tmp = $this->session->userdata("data_beli");
		return count($tmp);
	}

	private function getIndex($no){
		// Sebelum mengubah atau menghapus, maka harus mencari indexnya (dalam array yang disimpan di session) terlebih dahulu
		$tmp = $this->session->userdata("data_beli");
		foreach ($tmp as $key => $val) {
			if($val["no_beli"]==$no){
				return $key;
			}
		}
		return null;
	}

	/*
	Semua fungsi yang hanya menggunakan session
	1. addData
	2. updataData
	3. deleteData
	4. addRow
	5. updateRow
	6. deleteRow
	*/

	private function addData($idMenu, $jumlahBeli, $harga){
		// Tampung sementara isi tabel
		$tmp = $this->session->userdata("data_beli");
		$new_id = count($tmp) + 1;
		array_push($tmp, array("no_beli" => $new_id, "idMenu" => $idMenu, "jumlahBeli" => $jumlahBeli, "harga" => $harga));
		// Simpan kembali ke session
		$this->session->set_userdata("data_beli", $tmp);
	}

	private function updateData($no, $idRuang, $idPelajaran, $hari, $jamMulai){
		/*
		TODO updatedata
		1. Get id atau $no
		2. Search index
		3. datalist[index] = array(new_data)
		4. save to session
		*/
		$tmp = $this->session->userdata("data_beli");
		$id = $this->getIndex($no);
		$tmp[$id] = array("no_beli" => $no, );
		// Simpan kembali ke session
		$this->session->set_userdata("data_beli", $tmp);

	}

	private function deleteData($no){
		$tmp = $this->session->userdata("data_beli");
		$id =  $this->getIndex($no);
		unset($tmp[$id]);
		$this->session->set_userdata("data_beli", $tmp);
	}

	public function addRow(){
		// Buat baris baru pada form
		$my_idMenu = $this->input->post("id_menu");
		$my_jumlahBeli = $this->input->post("jumlah_beli");
		$my_harga = $this->input->post("harga");
		$this->addData($my_idMenu, $my_jumlahBeli, $my_harga);
		redirect(base_url("pegawai/Transaksi"));
	}

	public function updateRow(){
		// Ganti data dalam baris, $no berupa id_transaksi
		$my_id = $this->input->post("id_transaksi");
		
		// echo $my_id. " ". $my_ruangan. " ". $my_pelajaran. " ". $my_hari. " ". $my_jam;
		$this->updateData($my_id, $my_ruangan, $my_pelajaran, $my_hari, $my_jam);
		redirect(base_url("pegawai/Transaksi"));
	}

	public function deleteRow($no){
		$this->deleteData($no);
		redirect(base_url("pegawai/Transaksi"));
	}

	public function save(){
		// Simpan kedalam database
		$my_kelas = $this->input->post("kelas");
		$my_tahunAjar = $this->input->post("tahun_ajaran");
		$my_semester = $this->input->post("semester");

		$tmp = $this->session->userdata("data_beli");
		$last = $this->ModelTransaksi->getLastTransaksi();
		if(is_null($last)){
			$last = 1;
		}
		//echo "Last Row: $last";
		foreach ($tmp as $t) {
			// 'id_jadwal' => $last,
			$data = array(
				"id_transaksi" => $last,
				"id_pegawai" => "1"
			);
			$last = $last + 1;
			$this->ModelTransaksi->addTransaksi("transaksi", $data);
		}
		$this->session->set_userdata("data_beli", array());
		// echo "Selesai". "<a href='". base_url("admin/Jadwal"). "'> Klik disini </a>";
		redirect(base_url("admin/Jadwal"));
	}

}

?>
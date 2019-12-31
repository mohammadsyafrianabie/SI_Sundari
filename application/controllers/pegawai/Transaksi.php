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
		$data['table_size'] = $this->ModelTransaksi->getSize();
		$data["title"] = "Transaksi - SI Sundari";
		$data["formname"] = "transaksi";

		$this->load->view('pegawai/view_transaksi', $data);
	}

	// Untuk ajax getHarga
	public function getHargaMenu(){
		$id = $this->input->get("id");
		$menu = $this->ModelTransaksi->getMenuById($id);
		$data = "";
		foreach($menu as $m){
			$data = $m->harga;
		}
		echo $data;
	}

	// Untuk melihat jumlah stok menu
	private function getStokMenu($id){
		$menu = $this->ModelTransaksi->getMenuById($id);
		$tmp = "";
		foreach ($menu as $m) {
			$tmp = $m->stok;
		}
		return $tmp;
	}

	public function addRow(){
		// Buat baris baru pada form
		// Ambil input
		$my_idMenu = $this->input->post("id_menu");
		$my_jumlahBeli = $this->input->post("jumlah_beli");
		$my_harga = $this->input->post("harga");
		$namaMenu = $this->ModelTransaksi->getNamaMenu($my_idMenu);

		// Cek persediaan dan Isi session
		if($this->getStokMenu($my_idMenu) < $my_jumlahBeli){
			?>
				<script>
					alert("Stok kurang dari <?php echo $my_jumlahBeli; ?>"); 
					window.location.href = "<?php echo base_url("pegawai/Transaksi"); ?>";
				</script>
			<?php
		}else{
			$this->ModelTransaksi->addData($my_idMenu, $my_jumlahBeli, $my_harga, $namaMenu);
			redirect(base_url("pegawai/Transaksi"));
		}
	}

	public function updateRow(){
		// Ganti data dalam baris, $no berupa id_transaksi
		$my_id = $this->input->post("id_transaksi");
		
		// echo $my_id. " ". $my_ruangan. " ". $my_pelajaran. " ". $my_hari. " ". $my_jam;
		$this->ModelTransaksi->updateData($my_idMenu, $my_jumlahBeli, $my_harga, $namaMenu);
		redirect(base_url("pegawai/Transaksi"));
	}

	public function deleteRow($no){
		$this->ModelTransaksi->deleteData($no);
		redirect(base_url("pegawai/Transaksi"));
	}


	public function save(){
		// Simpan kedalam database
		// TODO ambil tanggal dan jam beli

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
		// TODO jika sudah insert ke database langsung menuju nota beli 
		//$this->session->set_userdata("data_beli", array());
		// echo "Selesai". "<a href='". base_url("admin/Jadwal"). "'> Klik disini </a>";
		redirect(base_url("pegawai/Transaksi"));
	}

}

?>
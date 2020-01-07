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

	// Untuk ajax (json) ubah jumlah beli
	public function getJumlahBeli(){
		$noBeli = $this->input->get("id");
		$data = $this->session->userdata("data_beli");
		$index = $this->ModelTransaksi->getIndex($noBeli);

		$tmp = $data[$index];
		echo json_encode($tmp);
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

	// Untuk melihat apakah barang sudah dipilih
	private function isMenuExist($idMenu){
		$tmp = $this->session->userdata("data_beli");
		$def_status = false;
		foreach ($tmp as $t) {
			if($t["idMenu"] == $idMenu){
				$def_status = true;
			}
		}
		return $def_status;
	}

	public function addRow(){
		// Buat baris baru pada form
		// Ambil input
		$my_idMenu = $this->input->post("id_menu");
		$my_jumlahBeli = $this->input->post("jumlah_beli");
		$my_harga = $this->input->post("harga");
		$namaMenu = $this->ModelTransaksi->getNamaMenu($my_idMenu);

		// Cek apakah menu sudah ditambahkan
		if($this->isMenuExist($my_idMenu)){
			?>
				<script>
					alert("<?php echo $namaMenu; ?> sudah ditambahkan"); 
					window.location.href = "<?php echo base_url("pegawai/Transaksi"); ?>";
				</script>
			<?php
		}elseif($this->getStokMenu($my_idMenu) < $my_jumlahBeli){
			// Cek persediaan dan Isi session
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
		// Ganti data dalam baris, $no berupa noBeli
		$my_noBeli = $this->input->post("no_beli");
		$my_jumlahUbah = $this->input->post("jumlah_ubah");
		// $my_harga = $this->input->post("harga_menu");
		
		$this->ModelTransaksi->updateData($my_noBeli, $my_jumlahUbah);
		redirect(base_url("pegawai/Transaksi"));
	}

	public function deleteRow($no){
		$this->ModelTransaksi->deleteData($no);
		redirect(base_url("pegawai/Transaksi"));
	}

	public function save(){
		// Simpan kedalam database
		$bayar = $this->input->post("bayar");

		$tgl = date('Y-m-d H:m:s');
		$idBaru = "t". date("YmdHms");
		$no = 1;

		$tmp = $this->session->userdata("data_beli");
		foreach ($tmp as $t) {
			
			$data = array(
				"id_transaksi" => $idBaru. $no,
				"id_user" => $this->session->userdata("id_user"),
				"id_menu" => $t["idMenu"],
				"nama_pembeli" => "",
				"tanggal" => $tgl,
				"jumlah" => $t["jumlahBeli"],
				"subHarga" => $t["subHarga"]
			);
			$this->ModelTransaksi->addTransaksi($data);
			$this->ModelTransaksi->kurangiStokMenu($t["idMenu"], $t["jumlahBeli"]);
			$no++;
		}
		$this->printNota($bayar, $tgl);
		// echo "Selesai". "<a href='". base_url("admin/Jadwal"). "'> Klik disini </a>";
		// redirect(base_url("pegawai/Transaksi"));
	}

	private function printNota($bayar, $tgl){
		$data["bayar"] = $bayar;
		$data["tanggal"] = $tgl;
		$this->load->view("pegawai/view_notasundari", $data);
	}

}

?>
<?php
defined('BASEPATH') OR exit('No direct script acces allowed');
/**
* 
*/
class Laporan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelLaporanHari');
	}
	function index(){
		$data["title"] = "Laporan - SI Sundari";
        $data["formname"] = "laporan";
        $data["laporan"] = $this->ModelLaporanHari->getLaporan_transaksi();
        $data['transaksi'] = $this->ModelLaporanHari->getdate_year();
		$this->load->view('pegawai/view_laporan_hari',$data);
	}


	function hari()
	{
		$data["title"] = "Laporan - SI Sundari";
        $data["formname"] = "Laporan";
		$hari = $this->input->post('hari');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		if(isset($_POST["filter"])){
			// untuk selector filter tanggal
			$data['hari'] = $hari;
			$data['bulan'] = $bulan;
			$data['tahun'] = $tahun;
			if ($hari == null && $bulan == null && $tahun == null){
				$data['laporan'] = $this->ModelLaporanHari->getLaporan_transaksi();
			} else {
				$data ['laporan'] =  $this->ModelLaporanHari->getLaporan_transaksi_hari($hari,$bulan,$tahun);
			}
			$data['transaksi'] = $this->ModelLaporanHari->getdate_year();
			$this->load->view('pegawai/view_laporan_hari',$data);
		}elseif(isset($_POST["cetak"])){
			// cetak laporan harian
			$data ['laporan'] =  $this->ModelLaporanHari->getLaporan_transaksi_hari($hari,$bulan,$tahun);
			$data['transaksi'] = $this->ModelLaporanHari->getdate_year();
			$this->load->view('pegawai/view_cetak_laporan',$data);
			// echo "halaman cetak";
		}
	}
	
}	
?>
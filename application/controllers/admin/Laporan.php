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
		$this->load->model('ModelLaporan');
	}
	function index(){
		$data["title"] = "Laporan - SI Sundari";
        $data["formname"] = "laporan";
		$this->load->view('admin/view_laporan',$data);
	}
	function bulan()
	{
		$data["title"] = "Laporan - SI Sundari";
        $data["formname"] = "Laporan";
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		if ($bulan == null && $tahun == null){
			$data['laporan'] = $this->ModelLaporan->getLaporan_transaksi();
		} else {
			$data ['laporan'] =  $this->ModelLaporan->getLaporan_transaksi_bulan($bulan,$tahun);
		}
		$data['transaksi'] = $this->ModelLaporan->getdate_year();
		$this->load->view('admin/view_laporan_bulan',$data);
	}
	function hari()
	{
		$data["title"] = "Laporan - SI Sundari";
        $data["formname"] = "Laporan";
		$hari = $this->input->post('hari');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		if ($hari == null && $bulan == null && $tahun == null){
			$data['laporan'] = $this->ModelLaporan->getLaporan_transaksi();
		} else {
			$data ['laporan'] =  $this->ModelLaporan->getLaporan_transaksi_hari($hari,$bulan,$tahun);
		}
		$data['transaksi'] = $this->ModelLaporan->getdate_year();
		$this->load->view('admin/view_laporan_hari',$data);
	} 
	function tahun()
	{
		$data["title"] = "Laporan - SI Sundari";
        $data["formname"] = "Laporan";
		$tahun = $this->input->post('tahun');
		if ($tahun == null){
			$data['laporan'] = $this->ModelLaporan->getLaporan_transaksi();
		} else {
			$data ['laporan'] =  $this->ModelLaporan->getLaporan_transaksi_tahun($tahun);
		}
		$data['transaksi'] = $this->ModelLaporan->getdate_year();
		$this->load->view('admin/view_laporan_tahun',$data);
	} 
}	
?>
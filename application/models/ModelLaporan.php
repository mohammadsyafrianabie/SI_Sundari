<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /**
 * 
 */
 class ModelLaporan extends CI_Model
 {
 	
 	function getLaporan_transaksi()
 	{
 		return $this->db->get('laporan')->result();
 	}
 	function getLaporan_transaksi_bulan($bulan,$tahun){
 		$this->db->where('Month(tanggal)', $bulan);
 		$this->db->where('Year(tanggal)', $tahun);
 		return $this->db->get('laporan')->result();
 	}
 	function getLaporan_transaksi_hari($hari,$bulan,$tahun){
 		$this->db->where('Day(tanggal)', $hari);
 		$this->db->where('Month(tanggal)', $bulan);
 		$this->db->where('Year(tanggal)', $tahun);
 		return $this->db->get('laporan')->result();
 	}
 	function getLaporan_transaksi_tahun($tahun){
 		$this->db->where('Year(tanggal)', $tahun);
 		return $this->db->get('laporan')->result();
 	}
 	function getdate_year()
 	{
 		return $this->db->query("select DISTINCT YEAR(tanggal) as tgl from laporan")->result();
 	}
 }
?>
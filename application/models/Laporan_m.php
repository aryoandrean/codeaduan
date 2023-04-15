<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m extends CI_Model {

	private $table = 'pengaduan';
	private $primary_key = 'id_pengaduan';

	function gettahun(){

		$query = $this->db->query("SELECT YEAR(tgl_pengaduan) AS tahun FROM pengaduan GROUP BY YEAR(tgl_pengaduan) ORDER BY YEAR(tgl_pengaduan) ASC");

		return $query->result();

	}

	function getdatapengaduan()
	{
		$query = $this->db->query(" SELECT * FROM pengaduan ORDER BY isi_laporan ASC");

		return $query->result();
	}

	function getdatatanggapan()
	{
		$query = $this->db->query(" SELECT * FROM tanggapan ORDER BY tanggapan ASC");

		return $query->result();
	}

	function getdatamasyarakat()
	{
		$query = $this->db->query(" SELECT * FROM masyarakat ORDER BY nama ASC");

		return $query->result();
	}

	function getdatapetugas()
	{
		$query = $this->db->query(" SELECT * FROM petugas ORDER BY nama_petugas ASC");

		return $query->result();
	}

	function filterbytanggal1($tanggalawal,$tanggalakhir){

		$query = $this->db->query("SELECT * from pengaduan where tgl_pengaduan BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_pengaduan ASC ");

		return $query->result();
	}

	function filterbytanggal($where){

		$query = $this->db->get_where('pengaduan',$where);

		return $query->result();
	}

	function filterbybulan($tahun1,$bulanawal,$bulanakhir){

		$query = $this->db->query("SELECT * from pengaduan where YEAR(tgl_pengaduan) = '$tahun1' and MONTH(tgl_pengaduan) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_pengaduan ASC ");

		return $query->result();
	}

	function filterbytahun($tahun2){

		$query = $this->db->query("SELECT * from pengaduan where YEAR(tgl_pengaduan) = '$tahun2'  ORDER BY tgl_pengaduan ASC ");

		return $query->result();
	}

	function filterbytahun2($where){

		$query = $this->db->get_where('pengaduan',$where);

		return $query->result();
	}

	public function laporan_pengaduan($bulan, $tahun)
	{
		$this->db->select('pengaduan.*, masyarakat.nama, masyarakat.telp, tanggapan.tgl_tanggapan, tanggapan.tanggapan, petugas.nama_petugas');
		$this->db->from('pengaduan');
		$this->db->join('masyarakat','masyarakat.nik = pengaduan.nik','left');
		$this->db->join('tanggapan','tanggapan.id_pengaduan = pengaduan.id_pengaduan','left');
		$this->db->join('petugas','petugas.id_petugas = tanggapan.id_petugas','left');
		$this->db->where('MONTH(pengaduan.tgl_pengaduan)', $bulan);
		$this->db->where('YEAR(pengaduan.tgl_pengaduan)', $tahun);
		// $this->db->order_by('MONTH(pengaduan.tgl_pengaduan)', ASC);
		return $this->db->get();
	}
}

/* End of file Pengaduan_m.php */
/* Location: ./application/models/Pengaduan_m.php */
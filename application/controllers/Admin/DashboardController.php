<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		if ( ! $this->session->userdata('level')) :
			redirect('Auth/BlockedController');
		endif;
		$this->load->model('Pengaduan_m');
}

	// List all your items
public function index()
{
	if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
		$filter = $_GET['filter']; // Ambil data filder yang dipilih user
		if($filter == '1'){ // Jika filter nya 1 (per tanggal)
			$tgl = $_GET['tanggal'];
			
			$ket = 'Data Pengaduan Tanggal '.date('d-m-y', strtotime($tgl));
			$url_cetak = 'pengaduan/cetak?filter=1&tanggal='.$tgl;
			$pengaduan = $this->Pengaduan_m->laporan_pengaduan($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel

		}else if($filter == '2'){ // Jika filter nya 2 (per bulan)
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
			
			$ket = 'Data Pengaduan Bulan '.$nama_bulan[$bulan].' '.$tahun;
			$url_cetak = $bulan.'/'.$tahun;
			$pengaduan = $this->Pengaduan_m->laporan_pengaduan_bulanan($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel


		}else{ // Jika filter nya 3 (per tahun)
			$tahun = $_GET['tahun'];
			
			$ket = 'Data Pengaduan Tahun '.$tahun;
			$url_cetak = 'pengaduan/cetak?filter=2&bulan=&tahun='.$tahun;
			$pengaduan = $this->Pengaduan_m->laporan_pengaduan_tahun($tahun);
			
			// Panggil fungsi view_by_year yang ada di TransaksiModel
		}
	}else{ // Jika user tidak mengklik tombol tampilkan
			
			
			$ket = 'Data Pengaduan Tahun ';
			$url_cetak = 'pengaduan/cetak';
			$pengaduan = $this->Pengaduan_m->laporan_pengaduan(); // Panggil fungsi view_all yang ada di TransaksiModel
	}

	$data['title1'] = 'Data Semua Pengaduan';
	// $data['laporan'] = $this->Pengaduan_m->laporan_pengaduan();
	$data['ket'] = $ket;
	$data['url_cetak'] = base_url('index.php/Admin/LaporanController/generate_laporan_bulan/'.$url_cetak);
	$data['pengaduan_all'] = $pengaduan;
	$data['option_tahun'] = $this->Pengaduan_m->option_tahun();

	$data['title'] = 'Dashboard';

	$data['petugas'] = $this->db->get('petugas')->num_rows();
	$data['pengaduan'] = $this->db->get('pengaduan')->num_rows();
	$data['pengaduan_proses'] = $this->db->get_where('pengaduan',['status' => 'proses'])->num_rows();
	$data['pengaduan_selesai'] = $this->db->get_where('pengaduan',['status' => 'selesai'])->num_rows();

	$this->load->view('_part/backend_head', $data);
	$this->load->view('_part/backend_sidebar_v');
	$this->load->view('_part/backend_topbar_v');
	$this->load->view('admin/dashboard');
	$this->load->view('_part/backend_footer_v');
	$this->load->view('_part/backend_foot');
}
}

/* End of file DashboardController.php */
/* Location: ./application/controllers/Admin/DashboardController.php */

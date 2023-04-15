<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		$this->load->model('Pengaduan_m');
}

	// List all your items
public function index()
{
	$data['title'] = 'Dashboard';

	$data['pengaduan'] = $this->db->get('pengaduan')->num_rows();
	$data['pengaduan_proses'] = $this->db->get_where('pengaduan',['status' => 'proses'])->num_rows();
	$data['pengaduan_selesai'] = $this->db->get_where('pengaduan',['status' => 'selesai'])->num_rows();
	$data['data_pengaduan'] = $this->Pengaduan_m->pengaduan()->result_array();

	$this->load->view('_part/backend_head', $data);
	$this->load->view('_part/backend_sidebar_v');
	$this->load->view('_part/backend_topbar_v');
	$this->load->view('user/dashboard');
	$this->load->view('_part/backend_footer_v');
	$this->load->view('_part/backend_foot');
}

public function pengaduan()
{
	$data['title'] = 'Pengaduan';
		$masyarakat = $this->db->get_where('masyarakat',['username' => $this->session->userdata('username')])->row_array();
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan_masyarakat_nik($masyarakat['nik'])->result_array();
		
		$this->form_validation->set_rules('isi_laporan','Isi Laporan Pengaduan','trim|required');
		$this->form_validation->set_rules('foto','Foto Pengaduan','trim');
}

public function tanggapan()
	{
		$data['title'] = 'Semua Pengaduan';
		$data['data_pengaduan'] = $this->Pengaduan_m->data_pengaduan()->result_array();

		$this->load->view('_part/backend_head', $data);
		$this->load->view('_part/backend_sidebar_v');
		$this->load->view('_part/backend_topbar_v');
		$this->load->view('user/dashboard');
		$this->load->view('_part/backend_footer_v');
		$this->load->view('_part/backend_foot');
	}
}

/* End of file DashboardController.php */
/* Location: ./application/controllers/Admin/DashboardController.php */

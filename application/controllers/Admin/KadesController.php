<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KadesController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		if ($this->session->userdata('level') != 'admin') :
			redirect('Auth/BlockedController');
		endif;
		$this->load->model('Kades_m');
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Kepala Desa';
		$data['data_kades'] = $this->Kades_m->view_kades();

		
			$this->load->view('_part/backend_head', $data);
			$this->load->view('_part/backend_sidebar_v');
			$this->load->view('_part/backend_topbar_v');
			$this->load->view('admin/kades');
			$this->load->view('_part/backend_footer_v');
			$this->load->view('_part/backend_foot');
	}

public function edit($id)
{
		$id = htmlspecialchars($id); // id petugas

		$cek_data = $this->db->get_where('kades',['id' => $id])->row_array();

		if ( ! empty($cek_data)) :

			$data['title'] = 'Edit Kepala Desa';
			$data['kades'] = $cek_data;

			$this->form_validation->set_rules('nama','Nama','trim|required|alpha_numeric_spaces');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('_part/backend_head', $data);
				$this->load->view('_part/backend_sidebar_v');
				$this->load->view('_part/backend_topbar_v');
				$this->load->view('admin/edit_kades');
				$this->load->view('_part/backend_footer_v');
				$this->load->view('_part/backend_foot');
			else :

			$params = [
				'nama_kades'			=> htmlspecialchars($this->input->post('nama',TRUE)),
			];

			$resp = $this->db->update('kades',$params, ['id' => $id]);

			if ($resp) :
				$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
					Data Kepala Desa berhasil di edit
					</div>');

				redirect('Admin/KadesController');
			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Data Kepala Desa gagal di edit!
					</div>');

				redirect('Admin/KadesController');
			endif;

			endif;

		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				Data tidak ada
				</div>');

			redirect('Admin/KadesController');
		endif;
	}	

	public function username_check($str = NULL)
	{
		if (!empty($str)) :
			$masyarakat = $this->db->get_where('masyarakat',['username' => $str])->row_array();

			$petugas = $this->db->get_where('petugas',['username' => $str])->row_array();

			if ($masyarakat == true || $petugas == true) :

				$this->form_validation->set_message('username_check', 'Username ini sudah terdaftar ada.');

				return false;
			else :
				return true;
			endif;
		else :
			$this->form_validation->set_message('username_check', 'Inputan Kosong');

			return false;
		endif;
	}
}

/* End of file PetugasController.php */
/* Location: ./application/controllers/Admin/PetugasController.php */

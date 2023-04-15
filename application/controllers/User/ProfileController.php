<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
	}

	// List all your items
	public function index()
	{
        $data['title'] = 'Profile';

        $masyarakat = $this->db->get_where('masyarakat',['username' => $this->session->userdata('username')])->row_array();
		$petugas = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();

		if ($masyarakat == TRUE) :
			$data['user'] = $masyarakat;
		elseif ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

        $this->load->view('_part/backend_head', $data);
        $this->load->view('_part/backend_sidebar_v');
        $this->load->view('_part/backend_topbar_v');
        $this->load->view('user/profile');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
	}

	public function edit($id)
	{
		$data['title'] = 'Profile';

        $masyarakat = $this->db->get_where('masyarakat',['username' => $this->session->userdata('username')])->row_array();
		$petugas = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();

		if ($masyarakat == TRUE) :
			$data['user'] = $masyarakat;
		elseif ($petugas == TRUE) :
			$data['user'] = $petugas;
		endif;

		if ( ! empty($cek_data)) :

			if ($cek_data['status'] == '0') :

				$data['title'] = 'Edit Pengaduan';
				$data['pengaduan'] = $cek_data;

				$this->form_validation->set_rules('isi_laporan','Isi Laporan Pengaduan','trim|required');
				$this->form_validation->set_rules('foto','Foto Pengaduan','trim');
				
				if ($this->form_validation->run() == FALSE) :
					$this->load->view('_part/backend_head', $data);
					$this->load->view('_part/backend_sidebar_v');
					$this->load->view('_part/backend_topbar_v');
					$this->load->view('masyarakat/edit_pengaduan');
					$this->load->view('_part/backend_footer_v');
					$this->load->view('_part/backend_foot');
				else :

					$upload_foto = $this->upload_foto('foto'); // parameter nama foto

					if ($upload_foto == FALSE) :
						$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
							Upload foto pengaduan gagal, hanya png,jpg dan jpeg yang dapat di upload!
							</div>');

						redirect('Masyarakat/PengaduanController');
					else :

						// hapus file
						$path = './assets/uploads/'.$cek_data['foto'];
						unlink($path);

						$params = [
							'isi_laporan'		=> htmlspecialchars($this->input->post('isi_laporan',true)),
							'foto'				=> $upload_foto,
						];

						$resp = $this->db->update('pengaduan',$params,['id_pengaduan' => $id]);;

						if ($resp) :
							$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
								Laporan berhasil dibuat
								</div>');

							redirect('Masyarakat/PengaduanController');
						else :
							$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
								Laporan gagal dibuat!
								</div>');

							redirect('Masyarakat/PengaduanController');
						endif;

					endif;

				endif;

			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Pengaduan sedang di proses!
					</div>');

				redirect('Masyarakat/PengaduanController');
			endif;

		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				data tidak ada
				</div>');

			redirect('Masyarakat/PengaduanController');				
		endif;
	}

	public function edit_profil($nik)
{
		$masyarakat = htmlspecialchars($nik);

		$cek_data = $this->db->get_where('masyarakat',['nik' => $nik])->row_array();
		

		if ( ! empty($cek_data)) :

			$data['title'] = 'Edit Profil';
			$data['masyarakat'] = $cek_data;

			$this->form_validation->set_rules('nama','Nama','trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('telp','Telp','trim|required|numeric');
			// $this->form_validation->set_rules('level','Level','trim|required');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('_part/backend_head', $data);
				$this->load->view('_part/backend_sidebar_v');
				$this->load->view('_part/backend_topbar_v');
				$this->load->view('user/edit_profil');
				$this->load->view('_part/backend_footer_v');
				$this->load->view('_part/backend_foot');
			else :

			$params = [
				'nama'			=> htmlspecialchars($this->input->post('nama',TRUE)),
				'telp'					=> htmlspecialchars($this->input->post('telp',TRUE)),
				// 'level'					=> htmlspecialchars($this->input->post('level',TRUE)),
			];

			$resp = $this->db->update('masyarakat',$params, ['nik' => $nik]);

			if ($resp) :
				$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
					Akun berhasil di edit
					</div>');

				redirect('User/ProfileController');
			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Akun gagal di edit!
					</div>');

				redirect('User/ProfileController');
			endif;

			endif;

		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				Data tidak ada
				</div>');

			redirect('User/ProfileController');
		endif;
	}	

	private function upload_foto($foto)
	{
		$config['upload_path']          = './assets/uploads/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 2048;
		$config['remove_spaces']        = TRUE;
		$config['detect_mime']        	= TRUE;
		$config['mod_mime_fix']        	= TRUE;
		$config['encrypt_name']        	= TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($foto)) :
			return FALSE;
		else :
			return $this->upload->data('file_name');
		endif;
	}
}

/* End of file ProfileController.php */
/* Location: ./application/controllers/User/ProfileController.php */

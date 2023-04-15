<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		if ($this->session->userdata('level') != 'admin') :
			redirect('Auth/BlockedController');
		endif;
		$this->load->model('Pengaduan_m');
		$this->load->model('Laporan_m');
		$this->load->model('Kades_m');

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
				$data_kades = $this->Kades_m->view_kades();

				$data['pengaduan'] = $pengaduan;
				$data['data_kades'] = $data_kades;
				$this->load->library('pdf');

				$this->pdf->setPaper('A4', 'potrait'); // opsional | default A4
				$this->pdf->filename = "laporan-bulanan.pdf"; // opsional | default is laporan.pdf
				$this->pdf->load_view('lap', $data);

            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Pengaduan Tahun '.$tahun;
				$url_cetak = 'pengaduan/cetak?filter=2&bulan=&tahun='.$tahun;
                $pengaduan = $this->Pengaduan_m->laporan_pengaduan_tahun($tahun);
				$data_kades = $this->Kades_m->view_kades();
				
				$data['pengaduan'] = $pengaduan;
				$data['data_kades'] = $data_kades;
				$this->load->library('pdf');

				$this->pdf->setPaper('A4', 'potrait'); // opsional | default A4
				$this->pdf->filename = "laporan-bulanan.pdf"; // opsional | default is laporan.pdf
				$this->pdf->load_view('lap', $data);
				// Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            	
                
                $ket = 'Data Pengaduan Tahun ';
				$url_cetak = 'pengaduan/cetak';
                $pengaduan = $this->Pengaduan_m->laporan_pengaduan(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

		$data['title'] = 'Data Semua Laporan';
		// $data['laporan'] = $this->Pengaduan_m->laporan_pengaduan();
		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/Admin/LaporanController/generate_laporan_bulan/'.$url_cetak);
		$data['pengaduan'] = $pengaduan;
		$data['option_tahun'] = $this->Pengaduan_m->option_tahun();

		

		$this->load->view('_part/backend_head', $data);
		$this->load->view('_part/backend_sidebar_v');
		$this->load->view('_part/backend_topbar_v');
		$this->load->view('admin/generate_laporan');
		$this->load->view('_part/backend_footer_v');
		$this->load->view('_part/backend_foot');
	}


	public function generate_laporan()
	{
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Pengaduan Tanggal '.date('d-m-y', strtotime($tgl));
                $pengaduan = $this->Pengaduan_m->laporan_pengaduan($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Pengaduan Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $pengaduan = $this->Pengaduan_m->laporan_pengaduan_bulanan($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel

				

            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Pengaduan Tahun '.$tahun;
                $pengaduan = $this->Pengaduan_m->laporan_pengaduan_tahun($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel

				$data['pengaduan'] = $pengaduan;
				$this->load->library('pdf');

				$this->pdf->setPaper('A4', 'potrait'); // opsional | default A4
				$this->pdf->filename = "laporan-tahunan.pdf"; // opsional | default is laporan.pdf
				$this->pdf->load_view('lap', $data);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Pengaduan';
            $pengaduan = $this->Pengaduan_m->laporan_pengaduan(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['pengaduan'] = $pengaduan;

		$this->load->view('_part/backend_head', $data);
		$this->load->view('_part/backend_sidebar_v');
		$this->load->view('_part/backend_topbar_v');
		$this->load->view('admin/generate_laporan');
		$this->load->view('_part/backend_footer_v');
		$this->load->view('_part/backend_foot');
	}

	public function generate_laporan_bulan()
	{
		$bulan = htmlspecialchars($this->input->post('bulan',true));
		$cek_data = $this->db->get_where('pengaduan',['tgl_pengaduan' => $bulan])->row_array();

		if(! empty($cek_data)){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
			
			$ket = 'Data Pengaduan Bulan '.$nama_bulan[$bulan].' '.$tahun;
			$pengaduan = $this->Pengaduan_m->laporan_pengaduan_bulanan(htmlspecialchars($bulan, $tahun));
        }else{ // Jika user tidak mengklik tombol tampilkan
			$ket = 'Semua Data Pengaduan';
			$pengaduan = $this->Pengaduan_m->laporan_pengaduan(); 
        }
        
        // $data['bulan'] = $bulan;
		// $data['tahun'] = $tahun;
        $data['pengaduan'] = $pengaduan;

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait'); // opsional | default A4
		$this->pdf->filename = "laporan-pengaduan_2.pdf"; // opsional | default is laporan.pdf
		$this->pdf->load_view('lap', $data);
	}

	public function data_kades()
	{
		$data['title'] = 'Tambah Kades';
		$data['data_kades'] = $this->Kades_m->view_kades();

		
			$this->load->view('_part/backend_head', $data);
			$this->load->view('_part/backend_sidebar_v');
			$this->load->view('_part/backend_topbar_v');
			$this->load->view('admin/generate_laporan');
			$this->load->view('_part/backend_footer_v');
			$this->load->view('_part/backend_foot');
	}



	

	
}

/* End of file LaporanController.php */
/* Location: ./application/controllers/Admin/LaporanController.php */

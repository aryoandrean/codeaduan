<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakController extends CI_Controller {

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


				$data['pengaduan'] = $pengaduan;
				$this->load->library('pdf');

				$this->pdf->setPaper('A4', 'potrait'); // opsional | default A4
				$this->pdf->filename = "laporan-pengaduan_2.pdf"; // opsional | default is laporan.pdf
				$this->pdf->load_view('lap', $data);

            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Pengaduan Tahun '.$tahun;
				$url_cetak = 'pengaduan/cetak?filter=2&bulan=&tahun='.$tahun;
                $pengaduan = $this->Pengaduan_m->laporan_pengaduan_tahun($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel

				$data['pengaduan'] = $pengaduan;
				$this->load->library('pdf');

				$this->pdf->setPaper('A4', 'potrait'); // opsional | default A4
				$this->pdf->filename = "laporan-pengaduan_2.pdf"; // opsional | default is laporan.pdf
				$this->pdf->load_view('lap', $data);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            	
                
                $ket = 'Data Pengaduan Tahun ';
				$url_cetak = 'pengaduan/cetak';
                $pengaduan = $this->Pengaduan_m->laporan_pengaduan(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

		$data['title'] = 'Generate Laporan';
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

	// public function cetak(){
    //     if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
    //         $filter = $_GET['filter']; // Ambil data filder yang dipilih user
    //         if($filter == '1'){ // Jika filter nya 1 (per tanggal)
    //             $tgl = $_GET['tanggal'];
                
    //             $ket = 'Data Pengaduan Tanggal '.date('d-m-y', strtotime($tgl));
    //             $pengaduan = $this->Pengaduan_m->laporan_pengaduan($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
    //         }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
    //             $bulan = $_GET['bulan'];
    //             $tahun = $_GET['tahun'];
    //             $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
    //             $ket = 'Data Pengaduan Bulan '.$nama_bulan[$bulan].' '.$tahun;
    //             $pengaduan = $this->Pengaduan_m->laporan_pengaduan_bulanan($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
    //         }else{ // Jika filter nya 3 (per tahun)
    //             $tahun = $_GET['tahun'];
                
    //             $ket = 'Data Pengaduan Tahun '.$tahun;
    //             $pengaduan = $this->Pengaduan_m->laporan_pengaduan_tahun($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
    //         }
    //     }else{ // Jika user tidak mengklik tombol tampilkan
    //         $ket = 'Semua Data Pengaduan';
    //         $pengaduan = $this->Pengaduan_m->laporan_pengaduan()->result_array(); // Panggil fungsi view_all yang ada di TransaksiModel
    //     }
        
    //     $data['ket'] = $ket;
    //     $data['pengaduan'] = $pengaduan;
        
	// 	ob_start();
	// 	$this->load->view('lap', $data);
	// 	$html = ob_get_contents();
	// 		ob_end_clean();
			
	// 	require './assets/html2pdf/autoload.php'; // Load plugin html2pdfnya
	// 	$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');  // Settingan PDFnya
	// 	$pdf->WriteHTML($html);
	// 	$pdf->Output('Data Pengaduan.pdf', 'D');

	// 	// $this->load->library('pdf');

	// 	// $this->pdf->setPaper('A4', 'potrait'); // opsional | default A4
	// 	// $this->pdf->filename = "laporan-pengaduan_2.pdf"; // opsional | default is laporan.pdf
	// 	// $this->pdf->load_view('lap', $data);
	
	// }

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
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Pengaduan';
            $pengaduan = $this->Pengaduan_m->laporan_pengaduan(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['pengaduan'] = $pengaduan;

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait'); // opsional | default A4
		$this->pdf->filename = "laporan-pengaduan_2.pdf"; // opsional | default is laporan.pdf
		$this->pdf->load_view('lap', $data);
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

	// public function laporan()
	// {
	
	// 	$bulan = $this->input->post('bulan');
	// 	$tahun = $this->input->post('tahun');
	// 	$nilaifilter = $this->input->post('nilaifilter');

		
	// 	$data['title'] = "Laporan Pengaduan By Bulan";
	// 	$data['subtitle'] = "Dari bulan : ".$bulan.' Tahun : '.$tahun;

				
	// 	$data['datafilter'] = $this->pengaduan_m->laporan_pengaduan($bulan, $tahun);

	// 	$this->load->view('page/barang/print_laporan', $data);
	// }

	// function filter(){
	// 	$tahun = $this->input->post('tahun');
	// 	$bulan = $this->input->post('bulan');

	// 	if ($nilaifilter == 1) {
			
	// 		$data['title'] = "Laporan Pengaduan By Bulan";
	// 		$data['subtitle'] = "Dari bulan : ".$tanggalawal.' Sampai tanggal : '.$tanggalakhir.' Tahun : '.$tahun1;

			
	// 		$data['datafilter'] = $this->Laporan_m->filterbybulan($tahun1,$bulanawal,$bulanakhir);

	// 		$this->load->view('page/barang/print_laporan', $data);

	// 	}elseif ($nilaifilter == 2) {
			
	// 		$data['title'] = "Laporan Pengaduan By Bulan";
	// 		$data['subtitle'] = "Dari bulan : ".$bulanawal.' Sampai tanggal : '.$bulanakhir.' Tahun : '.$tahun1;

			
	// 		$data['datafilter'] = $this->Laporan_m->filterbybulan($tahun1,$bulanawal,$bulanakhir);

	// 		$this->load->view('page/barang/print_laporan', $data);

	// 	}elseif ($nilaifilter == 3) {
			
	// 		$data['title'] = "Laporan Penjualan By Tahun";
	// 		$data['subtitle'] = ' Tahun : '.$tahun2;

	// 		if ($isi_laporan2 == null and $nama2 == null) {
	// 			$data['datafilter'] = $this->Laporan_m->filterbytahun($tahun2);
	// 		}else{

	// 			if ($nama2 == null) {
	// 				$where = array(
	// 					'YEAR(tgl_pengaduan)' => $tahun2,
	// 					'isi_laporan' => $isi_laporan2,
	// 				);

	// 				$data['datafilter'] = $this->Laporan_m->filterbytahun2($where);
	// 			}else if ($isi_laporan2 == null){
	// 				$where = array(
	// 					'YEAR(tgl_pengaduan)' => $tahun2,
	// 					'nama' => $nama2,
	// 				);

	// 				$data['datafilter'] = $this->Laporan_m->filterbytahun2($where);
	// 			}else{
	// 				$where = array(
	// 					'YEAR(tgl_pengaduan)' => $tahun2,
	// 					'nama' => $nama2,
	// 					'isi_laporan' => $isi_laporan2,
	// 				);

	// 				$data['datafilter'] = $this->Laporan_m->filterbytahun2($where);
	// 			}

	// 		}
			

	// 		$this->load->view('page/barang/print_laporan', $data);

	// 	}


	

	
}

/* End of file LaporanController.php */
/* Location: ./application/controllers/Admin/LaporanController.php */

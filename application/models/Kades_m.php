<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kades_m extends CI_Model {

	private $table = 'kades';
	private $primary_key = 'id';


	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}	

	public function view_kades()
	{
		return $this->db->get('kades')->result();
	}	

}

/* End of file Petugas_m.php */
/* Location: ./application/models/Petugas_m.php */
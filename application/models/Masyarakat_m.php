<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat_m extends CI_Model {

	private $table = 'masyarakat';
	private $primary_key = 'nik';
	
	public function create($data)
	{
		return $this->db->insert($this->table, $data);;
	}

	public function data_user()
	{
		 $this->db->select('masyarakat.*');
		 $this->db->from($this->table);
		 $this->db->where('verified', '0');
		return $this->db->get();
	}

	public function data_masyarakat_id($nik)
	{
		return $this->db->get_where($this->table,['nik' => $nik]);
	}
}


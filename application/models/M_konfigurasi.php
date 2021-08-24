<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konfigurasi extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function listing()
	{
		$query = $this->db->get('tbl_konfigurasi');
		return $query->row();
	}

	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('tbl_konfigurasi', $data);
	}
}

/* End of file M_konfigurasi.php */
/* Location: ./application/models/M_konfigurasi.php */
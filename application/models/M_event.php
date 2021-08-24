<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_event extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tbl_owner_event');
		$this->db->order_by('id_owner', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('tbl_owner_event', $data);
	}

	public function detail($id_owner)
	{
		$this->db->select('*');
		$this->db->from('tbl_owner_event');
		$this->db->where('id_owner ', $id_owner);
		$this->db->order_by('id_owner', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function edit($data)
	{
		$this->db->where('id_owner', $data['id_owner']);
		$this->db->update('tbl_owner_event', $data);
	}

}

/* End of file M_owner_event.php */
/* Location: ./application/models/M_owner_event.php */
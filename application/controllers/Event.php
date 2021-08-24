<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_event');
	}

	public function index()
	{
		$this->load->view('v_event');
	}

	public function tambah_data()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_owner','Nama Lengkap', 'required|min_length[2]|max_length[40]', 
			array(	'required'   	=> '%s harus diisi',
					'min_length'	=> '%s minimal 2 karakter',
					'max_length'	=> '%s maksimal 40 karakter'));

		$valid->set_rules('no_telp_owner','Nomor Telepon', 'required|min_length[12]|max_length[12]|is_unique[tbl_owner_event.no_telp_owner]', 
			array(	'required'   => '%s harus diisi',
					'min_length'	=> '%s minimal 12 karakter',
					'max_length'	=> '%s maksimal 12 karakter',
					'is_unique'		=> '%s sudah terdaftar'));

		$valid->set_rules('email_owner','Email', 'required|valid_email|is_unique[tbl_owner_event.email_owner]', 
			array(	'required'   	=> '%s harus diisi',
					'is_unique'		=> '%s sudah terdaftar'));

		$valid->set_rules('alamat_owner','Alamat', 'required|min_length[3]|max_length[150]', 
			array(	'required'   	=> 	'%s harus diisi',
					'min_length'	=>	'%s minimal 3 karakter',
					'max_length'	=>	'%s maksimal 150 karakter'));

		$valid->set_rules('keterangan_event','Keterangan', 'required|min_length[3]|max_length[150]', 
			array(	'required'  	=> 	'%s harus diisi',
					'min_length'	=>	'%s minimal 3 karakter',
					'max_length'	=>	'%s maksimal 150 karakter'));

		if($valid->run()){

			$config['upload_path']    = './assets/upload/file/';
			$config['allowed_types']  = 'pdf|doc|docx';
			$config['max_size']       = 0;
			// $config['max_width']      = '2024';
			// $config['max_height']     = '2024';
			
			$this->load->library('upload', $config);
			
		if ( ! $this->upload->do_upload('proposal_event')){

		$data = array('error'    => $this->upload->display_errors(),
					  'isi'      => 'event/tambah_data'
					 );
		$this->load->view('v_event', $data, FALSE);
		//masuk database
		}else{
			$upload_data = $this->upload->data();
			$i = $this->input;
			$data = array( 'nama_owner'      	=> $i->post('nama_owner'),
						   'no_telp_owner'      => $i->post('no_telp_owner'),
						   'email_owner'      	=> $i->post('email_owner'),
						   'alamat_owner' 	  	=> $i->post('alamat_owner'),
						   'proposal_event'     => $upload_data['file_name'],
						   'keterangan_event'   => $i->post('keterangan_event'),
						   'status'				=> 'pending'
			);
			$this->m_event->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah di proses');
			redirect(base_url('event'),'refresh');
		}}else{
			$data = array('isi' => 'event/tambah_data');
			$this->load->view('v_event', $data, FALSE);
		}
	}

}

/* End of file Owner_event.php */
/* Location: ./application/controllers/Owner_event.php */
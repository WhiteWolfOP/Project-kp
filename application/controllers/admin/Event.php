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
		$event = $this->m_event->listing();
		$data = array(	'event'  	=> $event,
					  	'isi'   	=> 'admin/event');
		$this->load->view('admin/v_event_list', $data, FALSE);
	}

	public function detail_status($id_owner)
	{
		$event = $this->m_event->detail($id_owner);
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('status','Status', 'required', 
			array(	'required'   	=> '%s harus diisi'));

		if($valid->run()===FALSE){

		$data = array('event'  => $event, 
					  'isi'   => 'admin/event/detail_status');
		$this->load->view('admin/detail_update_status', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array( 'id_owner'    => $id_owner,
						   'status'      => $i->post('status')
			);
			$this->m_event->edit($data);
			$this->session->set_flashdata('sukses', 'Status Berhasil Di Ubah');
			redirect(base_url('admin/event'),'refresh');
		}
		//end masuk database
	}

}

/* End of file Event.php */
/* Location: ./application/controllers/admin/Event.php */
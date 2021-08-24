<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_konfigurasi');
	}

	public function index()
	{
		$konfigurasi = $this->m_konfigurasi->listing();

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pemilik','Nama Pemilik', 'required|min_length[3]|max_length[32]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		$valid->set_rules('namaweb','Nama Website', 'required|min_length[3]|max_length[32]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		$valid->set_rules('no_telp','Nomor telp Website', 'required|min_length[12]|max_length[12]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 12 karakter',
				  'max_length'  => '%s maksimal 12 karakter'));

		$valid->set_rules('email','Email Website', 'required|valid_email', 
			array('required'    => '%s harus diisi'));

		$valid->set_rules('alamat','Alamat Perusahaan', 'required|min_length[3]|max_length[100]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		if($valid->run()===FALSE){

		$data = array('konfigurasi' => $konfigurasi,
					  'isi'         => 'admin/konfigurasi'
					 );
		$this->load->view('admin/v_konfigurasi', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array( 'id_konfigurasi'      	=> $konfigurasi->id_konfigurasi,
						   'nama_pemilik'           => $i->post('nama_pemilik'),
						   'namaweb'             	=> $i->post('namaweb'),
						   'no_telp'             	=> $i->post('no_telp'),
						   'email' 		         	=> $i->post('email'),
						   'alamat'            	 	=> $i->post('alamat'),
						   'visi'            		=> $i->post('visi'),
						   'misi'            		=> $i->post('misi'),
						   'about_us'             	=> $i->post('about_us')
						 );

			$this->m_konfigurasi->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di update');
			redirect(base_url('admin/konfigurasi'),'refresh');
		}
		//end masuk database
	}

	public function wallpaper()
	{
		$konfigurasi = $this->m_konfigurasi->listing();

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pemilik','Nama Pemilik', 'required|min_length[3]|max_length[32]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		$valid->set_rules('namaweb','Nama Website', 'required|min_length[3]|max_length[32]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		$valid->set_rules('no_telp','Nomor telp Website', 'required|min_length[12]|max_length[12]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 12 karakter',
				  'max_length'  => '%s maksimal 12 karakter'));

		$valid->set_rules('email','Email Website', 'required|valid_email', 
			array('required'    => '%s harus diisi'));

		$valid->set_rules('alamat','Alamat Perusahaan', 'required|min_length[3]|max_length[100]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		if($valid->run()){
			//check jika gambar diganti
			if(!empty($_FILES['wallpaper']['name'])){

			$config['upload_path']    = './assets/upload/image/';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['max_size']       = '2400';
			$config['max_width']      = '2024';
			$config['max_height']     = '2024';
			
			$this->load->library('upload', $config);
			
		if ( ! $this->upload->do_upload('wallpaper')){

		$data = array('konfigurasi' => $konfigurasi,
					  'error'    	=> $this->upload->display_errors(),
					  'isi'      	=> 'admin/konfigurasi/wallpaper'
					 );
		$this->load->view('admin/v_konfigurasi_wallpaper', $data, FALSE);
		//masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//create thumbnail
				$config['image_library']   = 'gd2';
				$config['source_image']    = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
				//lokasi folder thumbnail
				$config['new_image']       = './assets/upload/image/thumbs/';
 				$config['create_thumb']    = TRUE;
				$config['maintain_ratio']  = TRUE;
				$config['width']           = 250;//pixel
				$config['height']          = 250;//pixel
				$config['thumb_marker']    = '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
			//end create thumbnail

			$i = $this->input;
			$data = array( 'id_konfigurasi'    	=> $konfigurasi->id_konfigurasi,
						   'nama_pemilik'	   	=> $i->post('nama_pemilik'),
						   'namaweb'		   	=> $i->post('namaweb'),
						   'no_telp'			=> $i->post('no_telp'),
						   'email'				=> $i->post('email'),
						   'alamat'				=> $i->post('alamat'),
						   //disimpan nama file gambarnya
						   'wallpaper'          => $upload_gambar['upload_data']['file_name']
						 );
			$this->m_konfigurasi->edit($data);
			$this->session->set_flashdata('sukses', 'wallpaper telah di perbarui');
			redirect(base_url('admin/konfigurasi/wallpaper'),'refresh');
		}}else{
			//edit produk tanpa ubah gambar
			$i = $this->input;
			$data = array( 'id_konfigurasi'    => $konfigurasi->id_konfigurasi,
						   'nama_pemilik'	   	=> $i->post('nama_pemilik'),
						   'namaweb'		   	=> $i->post('namaweb'),
						   'no_telp'			=> $i->post('no_telp'),
						   'email'				=> $i->post('email'),
						   'alamat'				=> $i->post('alamat')
						   //disimpan nama file gambarnya
						   //'logo'            => $upload_gambar['upload_data']['file_name']
						 );
			$this->m_konfigurasi->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diperbarui');
			redirect(base_url('admin/konfigurasi/wallpaper'),'refresh');
		}}
		//end masuk database
		$data = array('konfigurasi' => $konfigurasi,
					  'isi'      	=> 'admin/konfigurasi/wallpaper'
					 );
		$this->load->view('admin/v_konfigurasi_wallpaper', $data, FALSE);
	}

	public function wallpaper2()
	{
		$konfigurasi = $this->m_konfigurasi->listing();

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pemilik','Nama Pemilik', 'required|min_length[3]|max_length[32]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		$valid->set_rules('namaweb','Nama Website', 'required|min_length[3]|max_length[32]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		$valid->set_rules('no_telp','Nomor telp Website', 'required|min_length[12]|max_length[12]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 12 karakter',
				  'max_length'  => '%s maksimal 12 karakter'));

		$valid->set_rules('email','Email Website', 'required|valid_email', 
			array('required'    => '%s harus diisi'));

		$valid->set_rules('alamat','Alamat Perusahaan', 'required|min_length[3]|max_length[100]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		if($valid->run()){
			//check jika gambar diganti
			if(!empty($_FILES['wallpaper2']['name'])){

			$config['upload_path']    = './assets/upload/image/';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['max_size']       = '2400';
			$config['max_width']      = '2024';
			$config['max_height']     = '2024';
			
			$this->load->library('upload', $config);
			
		if ( ! $this->upload->do_upload('wallpaper2')){

		$data = array('konfigurasi' => $konfigurasi,
					  'error'    	=> $this->upload->display_errors(),
					  'isi'      	=> 'admin/konfigurasi/wallpaper2'
					 );
		$this->load->view('admin/v_konfigurasi_wallpaper_2', $data, FALSE);
		//masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//create thumbnail
				$config['image_library']   = 'gd2';
				$config['source_image']    = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
				//lokasi folder thumbnail
				$config['new_image']       = './assets/upload/image/thumbs/';
 				$config['create_thumb']    = TRUE;
				$config['maintain_ratio']  = TRUE;
				$config['width']           = 250;//pixel
				$config['height']          = 250;//pixel
				$config['thumb_marker']    = '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
			//end create thumbnail

			$i = $this->input;
			$data = array( 'id_konfigurasi'    	=> $konfigurasi->id_konfigurasi,
						   'nama_pemilik'	   	=> $i->post('nama_pemilik'),
						   'namaweb'		   	=> $i->post('namaweb'),
						   'no_telp'			=> $i->post('no_telp'),
						   'email'				=> $i->post('email'),
						   'alamat'				=> $i->post('alamat'),
						   //disimpan nama file gambarnya
						   'wallpaper2'          => $upload_gambar['upload_data']['file_name']
						 );
			$this->m_konfigurasi->edit($data);
			$this->session->set_flashdata('sukses', 'wallpaper telah di perbarui');
			redirect(base_url('admin/konfigurasi/wallpaper2'),'refresh');
		}}else{
			//edit produk tanpa ubah gambar
			$i = $this->input;
			$data = array( 'id_konfigurasi'    => $konfigurasi->id_konfigurasi,
						   'nama_pemilik'	   	=> $i->post('nama_pemilik'),
						   'namaweb'		   	=> $i->post('namaweb'),
						   'no_telp'			=> $i->post('no_telp'),
						   'email'				=> $i->post('email'),
						   'alamat'				=> $i->post('alamat')
						   //disimpan nama file gambarnya
						   //'logo'            => $upload_gambar['upload_data']['file_name']
						 );
			$this->m_konfigurasi->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diperbarui');
			redirect(base_url('admin/konfigurasi/wallpaper2'),'refresh');
		}}
		//end masuk database
		$data = array('konfigurasi' => $konfigurasi,
					  'isi'      	=> 'admin/konfigurasi/wallpaper2'
					 );
		$this->load->view('admin/v_konfigurasi_wallpaper_2', $data, FALSE);
	}

	public function wallpaper3()
	{
		$konfigurasi = $this->m_konfigurasi->listing();

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pemilik','Nama Pemilik', 'required|min_length[3]|max_length[32]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		$valid->set_rules('namaweb','Nama Website', 'required|min_length[3]|max_length[32]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		$valid->set_rules('no_telp','Nomor telp Website', 'required|min_length[12]|max_length[12]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 12 karakter',
				  'max_length'  => '%s maksimal 12 karakter'));

		$valid->set_rules('email','Email Website', 'required|valid_email', 
			array('required'    => '%s harus diisi'));

		$valid->set_rules('alamat','Alamat Perusahaan', 'required|min_length[3]|max_length[100]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		if($valid->run()){
			//check jika gambar diganti
			if(!empty($_FILES['wallpaper3']['name'])){

			$config['upload_path']    = './assets/upload/image/';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['max_size']       = '2400';
			$config['max_width']      = '2024';
			$config['max_height']     = '2024';
			
			$this->load->library('upload', $config);
			
		if ( ! $this->upload->do_upload('wallpaper3')){

		$data = array('konfigurasi' => $konfigurasi,
					  'error'    	=> $this->upload->display_errors(),
					  'isi'      	=> 'admin/konfigurasi/wallpaper3'
					 );
		$this->load->view('admin/v_konfigurasi_wallpaper_3', $data, FALSE);
		//masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//create thumbnail
				$config['image_library']   = 'gd2';
				$config['source_image']    = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
				//lokasi folder thumbnail
				$config['new_image']       = './assets/upload/image/thumbs/';
 				$config['create_thumb']    = TRUE;
				$config['maintain_ratio']  = TRUE;
				$config['width']           = 250;//pixel
				$config['height']          = 250;//pixel
				$config['thumb_marker']    = '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
			//end create thumbnail

			$i = $this->input;
			$data = array( 'id_konfigurasi'    	=> $konfigurasi->id_konfigurasi,
						   'nama_pemilik'	   	=> $i->post('nama_pemilik'),
						   'namaweb'		   	=> $i->post('namaweb'),
						   'no_telp'			=> $i->post('no_telp'),
						   'email'				=> $i->post('email'),
						   'alamat'				=> $i->post('alamat'),
						   //disimpan nama file gambarnya
						   'wallpaper3'          => $upload_gambar['upload_data']['file_name']
						 );
			$this->m_konfigurasi->edit($data);
			$this->session->set_flashdata('sukses', 'wallpaper telah di perbarui');
			redirect(base_url('admin/konfigurasi/wallpaper3'),'refresh');
		}}else{
			//edit produk tanpa ubah gambar
			$i = $this->input;
			$data = array( 'id_konfigurasi'    => $konfigurasi->id_konfigurasi,
						   'nama_pemilik'	   	=> $i->post('nama_pemilik'),
						   'namaweb'		   	=> $i->post('namaweb'),
						   'no_telp'			=> $i->post('no_telp'),
						   'email'				=> $i->post('email'),
						   'alamat'				=> $i->post('alamat')
						   //disimpan nama file gambarnya
						   //'logo'            => $upload_gambar['upload_data']['file_name']
						 );
			$this->m_konfigurasi->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diperbarui');
			redirect(base_url('admin/konfigurasi/wallpaper3'),'refresh');
		}}
		//end masuk database
		$data = array('konfigurasi' => $konfigurasi,
					  'isi'      	=> 'admin/konfigurasi/wallpaper3'
					 );
		$this->load->view('admin/v_konfigurasi_wallpaper_3', $data, FALSE);
	}

	public function icon()
	{
		$konfigurasi = $this->m_konfigurasi->listing();

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pemilik','Nama Pemilik', 'required|min_length[3]|max_length[32]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		$valid->set_rules('namaweb','Nama Website', 'required|min_length[3]|max_length[32]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		$valid->set_rules('no_telp','Nomor telp Website', 'required|min_length[12]|max_length[12]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 12 karakter',
				  'max_length'  => '%s maksimal 12 karakter'));

		$valid->set_rules('email','Email Website', 'required|valid_email', 
			array('required'    => '%s harus diisi'));

		$valid->set_rules('alamat','Alamat Perusahaan', 'required|min_length[3]|max_length[100]', 
			array('required'    => '%s harus diisi',
				  'min_length'  => '%s minimal 3 karakter',
				  'max_length'  => '%s maksimal 32 karakter'));

		if($valid->run()){
			//check jika gambar diganti
			if(!empty($_FILES['icon']['name'])){

			$config['upload_path']    = './assets/upload/image/';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['max_size']       = '2400';
			$config['max_width']      = '2024';
			$config['max_height']     = '2024';
			
			$this->load->library('upload', $config);
			
		if ( ! $this->upload->do_upload('icon')){

		$data = array('konfigurasi' => $konfigurasi,
					  'error'    	=> $this->upload->display_errors(),
					  'isi'      	=> 'admin/konfigurasi/icon'
					 );
		$this->load->view('admin/v_konfigurasi_icon', $data, FALSE);
		//masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//create thumbnail
				$config['image_library']   = 'gd2';
				$config['source_image']    = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
				//lokasi folder thumbnail
				$config['new_image']       = './assets/upload/image/thumbs/';
 				$config['create_thumb']    = TRUE;
				$config['maintain_ratio']  = TRUE;
				$config['width']           = 250;//pixel
				$config['height']          = 250;//pixel
				$config['thumb_marker']    = '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
			//end create thumbnail

			$i = $this->input;
			$data = array( 'id_konfigurasi'    	=> $konfigurasi->id_konfigurasi,
						   'nama_pemilik'	   	=> $i->post('nama_pemilik'),
						   'namaweb'		   	=> $i->post('namaweb'),
						   'no_telp'			=> $i->post('no_telp'),
						   'email'				=> $i->post('email'),
						   'alamat'				=> $i->post('alamat'),
						   //disimpan nama file gambarnya
						   'icon'          		=> $upload_gambar['upload_data']['file_name']
						 );
			$this->m_konfigurasi->edit($data);
			$this->session->set_flashdata('sukses', 'icon telah di perbarui');
			redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}}else{
			//edit produk tanpa ubah gambar
			$i = $this->input;
			$data = array( 'id_konfigurasi'    	=> $konfigurasi->id_konfigurasi,
						   'nama_pemilik'	   	=> $i->post('nama_pemilik'),
						   'namaweb'		   	=> $i->post('namaweb'),
						   'no_telp'			=> $i->post('no_telp'),
						   'email'				=> $i->post('email'),
						   'alamat'				=> $i->post('alamat')
						   //disimpan nama file gambarnya
						   //'logo'            => $upload_gambar['upload_data']['file_name']
						 );
			$this->m_konfigurasi->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diperbarui');
			redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}}
		//end masuk database
		$data = array('konfigurasi' => $konfigurasi,
					  'isi'      	=> 'admin/konfigurasi/icon'
					 );
		$this->load->view('admin/v_konfigurasi_icon', $data, FALSE);
	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */
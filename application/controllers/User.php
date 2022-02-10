<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		belom_login();
		not_kasir();
		
	}

	public function index()
	{
		$data['user'] = $this->user_model->tampil_data()->result(); 
		$this->template->load('template', 'user/user', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('konpass', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|integer|max_length[14]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('gaji', 'Gaji', 'required|integer');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('blokir', 'Blokir', 'required');
		//$this->form_validation->set_rules('foto', 'Foto', 'required');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');
		$this->form_validation->set_message('valid_email','%s tidak valid!');
		$this->form_validation->set_message('max_length','%s tidak boleh lebih dari 14 karakter!');
		$this->form_validation->set_message('is_unique','Data %s sudah ada, silahkan pakai username lain!');
		$this->form_validation->set_message('matches','%s tidak sesuai dengan password');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
            {
				$this->template->load('template', 'user/form_add_user');	
         	}
        else
         	{
         		$post = $this->input->post(null, TRUE);

         		$config['upload_path']          = './uploads/user/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;
                $config['file_name']            = 'user-'.date('ymd');
                $this->load->library('upload', $config);
                if($this->upload->do_upload('foto'))
                {
            		$post['foto'] = $this->upload->data('file_name');
            		$this->user_model->add($post);
            		if ($this->db->affected_rows() > 0) {
            		echo "<script>
            				alert('Data berhasil di input')
							window.location='".site_url('user')."';
						  </script>";
            		}
                } 
                else{
                	// $error = array('error' => $this->upload->display_error());
					echo "<script>
            				alert('Data gagal!')
							window.location='".site_url('user/add')."';
						  </script>";
                }
            	
        	}
	}



	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|integer|max_length[14]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if($this->fungsi->user_login()->level == 3){
			$this->form_validation->set_rules('gaji', 'Gaji', 'required|integer');
			$this->form_validation->set_rules('level', 'Level', 'required');
		}
		
		$this->form_validation->set_rules('blokir', 'Blokir', 'required');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');
		$this->form_validation->set_message('valid_email','%s tidak valid!');
		$this->form_validation->set_message('max_length','%s tidak boleh lebih dari 14 karakter!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
            {
				$query = $this->user_model->get($id);
				if ($query->num_rows() > 0 ) 
				{
						$data['row'] = $query->row();
						$this->template->load('template', 'user/form_edit_user', $data);
				}
				else
				{
					echo "<script>
            				alert('Data tidak di temukan!!!')
							window.location='".site_url('user')."';
						  </script>";
				}
         	}
        else
         	{
         		$post = $this->input->post(null, TRUE);
                $this->user_model->edit($post);
            	if ($this->db->affected_rows() > 0){
	           		echo "<script>
	           				alert('Data berhasil di edit')
							window.location='".site_url('user')."';
						  </script>";
                }
            	else
            	{
            		redirect('user');
            	}
        	}
	}

	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
		if ($query->num_rows() > 0 ){
			$this->form_validation->set_message('username_check','%s telah dipakai, silahkan ganti');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
}
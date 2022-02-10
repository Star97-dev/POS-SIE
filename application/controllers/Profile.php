<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		belom_login();
		
	}

	public function index()
	{
		$query = $this->profile_model->get();
				if ($query->num_rows() > 0 ) 
				{
						$data['row'] = $query->row();
						$this->template->load('template', 'profile/profile_data', $data);
				}
				else
				{
					echo "<script>
            				alert('Data tidak di temukan!!!')
							window.location='".site_url('dashboard')."';
						  </script>";
				}		
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|integer|max_length[14]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');
		$this->form_validation->set_message('valid_email','%s tidak valid!');
		$this->form_validation->set_message('max_length','%s tidak boleh lebih dari 14 karakter!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->profile_model->get($id);

				if ($query->num_rows() > 0 ) 
				{
						$data['row'] = $query->row();
						$this->template->load('template', 'profile/form_edit_profile', $data);
				}
				else
				{
					echo "<script>
            				alert('Data tidak di temukan!!!')
							window.location='".site_url('profile/index')."';
						  </script>";
				}
		}
		else{
			
				$config['upload_path']          = './uploads/user/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;
                $config['file_name']            = 'user-'.date('ymd');
                $this->load->library('upload', $config);

                $post = $this->input->post(null, TRUE);
               
				if($_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){
						$user = $this->user_model->get($post['id_user'])->row();
						if($user->foto != null){
							$folder_file = './uploads/user/'.$user->foto;
							unlink($folder_file);
						}

	                	$post['foto'] = $this->upload->data('file_name');
		            	$this->profile_model->edit($post);
		            	if ($this->db->affected_rows() > 0)
		            	{
		            		echo "<script>
		            				alert('Data berhasil di edit')
									window.location='".site_url('profile/index')."';
								  </script>";
		            	}
		            	else
		            	{
							redirect('profile/index');
		            		
	            		}
				}  
			}    
					else{
						$post['foto'] = null;
						$this->profile_model->edit($post);
		            	if ($this->db->affected_rows() > 0)
		            	{
		            		echo "<script>
		            				alert('Data berhasil di edit')
									window.location='".site_url('profile/index')."';
								  </script>";
		            	}
		            	else
		            	{
		            		redirect('profile/index');
	            		}

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

	public function ubah_pass($post)
	{
		if ($this->input->post('old'))
		{
			$this->form_validation->set_rules('new', 'Password', 'required');
		}
		if ($this->input->post('new')) 
		{
			$this->form_validation->set_rules('konpass', 'Konfirmasi Password','required|matches[new]');
		}
		

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('matches','%s tidak sesuai dengan password!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->template->load('template','profile/ubah_pass');	
		}
		else
		{
			$cek_old = $this->profile_model->cek();
				if ($cek_old == FALSE) 
				{
					 echo "<script>
            				alert('Password lama salah!')
							window.location='".site_url('template','profile/ubah_pass')."';
						  </script>";
				}
				else
				{
            		$this->profile_model->update($post);
            			if ($this->db->affected_rows() > 0)
            			{
            				echo "<script>
            						alert('Data berhasil di update')
									window.location='".site_url('auth/logout')."';
						  		  </script>";
            			}
            			else
            			{
            				redirect('auth/logout');
            			}
				}
		}
	}
}

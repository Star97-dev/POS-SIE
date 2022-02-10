<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_Controller{
		
		public function index()
		{
			dah_login();
			$this->load->view('login');
		}

		public function proses_login()
		{
			$this->form_validation->set_rules('username','username','required');
			$this->form_validation->set_rules('password','password','required');

			$this->form_validation->set_message('required','%s tidak boleh kosong!');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('login');
			}
			else
			{
				$username	= $this->input->post('username');
				$password	= $this->input->post('password');
				
				$user	= $username;
				$pass 	= md5($password);
				
				$query 	= $this->login_model->cek_login($user,$pass);

				if($query->num_rows() > 0)
				{
					$row = $query->row();
					$params = array(
						'id_user'	=> $row->id_user,
						'level'		=> $row->level
					);
					
					$this->session->set_userdata($params);
					echo "<script>
							alert('Selamat, login berhasil')
							window.location='".site_url('dashboard')."';
						  </script>";
				}
				else
				{
					echo "<script>
							alert('Login gagal!!!')
							window.location='".site_url('auth')."';
						  </script>";
				}
			}
		}

		public function logout()
		{
			$params = array('id_user','level');
			$this->session->unset_userdata($params);
			redirect('auth');
		}
}
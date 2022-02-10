<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class profile_model extends CI_Model{
		public function get($id = null)
		{
			$this->db->from('user');
			if ($id != null) {
				$this->db->where('id_user', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		public function edit($post)
		{
			$params = [
				'nama'			=> $post['nama'],
				'username'		=> $post['username'],
				'email'			=> $post['email'],
				'no_telepon'	=> $post['no_telepon'],
				'alamat'		=> $post['alamat'],
			];
			if($post['foto'] != null){
				$params['foto'] = $post['foto'];
			}

			$this->db->where('id_user', $post['id_user']);	
			$this->db->update('user', $params);
		}

		public function cek()
		{
			$old = md5($this->input->post('old'));
			$this->db->where('password', $old);
			$query = $this->db->get('user');
			return $query->result();
		}

		public function update()
		{
			$pass = md5($this->input->post('new'));
			$params = [
				'password'	=> $pass,
			];

			$this->db->where('id_user', $this->session->userdata('id_user'));
			$this->db->update('user', $params);
		}
	}
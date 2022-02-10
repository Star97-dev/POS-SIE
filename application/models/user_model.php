<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends CI_Model{

		public function tampil_data()
		{
			return $this->db->get('user');	
		}

		public function add($post)
		{
			$params['nama'] 		= $post['nama'];
			$params['username'] 	= $post['username'];
			$params['password'] 	= md5($post['password']);
			$params['email'] 		= $post['email'];
			$params['no_telepon'] 	= $post['no_telepon'];
			$params['alamat'] 		= $post['alamat'];
			$params['gaji'] 		= $post['gaji'];
			$params['foto'] 		= $post['foto'];
			$params['level'] 		= $post['level'];
			$params['blokir'] 		= $post['blokir'];
			
			$this->db->insert('user', $params);
		}

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
				'nama' 			=> $post['nama'],
				'username'		=> $post['username'],
				'email'			=> $post['email'],
				'no_telepon'	=> $post['no_telepon'],
				'alamat'		=> $post['alamat'],
				'blokir'		=> $post['blokir'],
			];
			$this->db->where('id_user', $post['id_user']);	
			$this->db->update('user', $params);
		}	
	}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model{

		public function cek_login ($username,$password)
		{
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			return $this->db->get('user');
		}

		public function get($id = null)
		{
			$this->db->from('user');
			if($id != null)
			{
				$this->db->where('id_user', $id);
			}
			$query = $this->db->get();
			return $query;
		}
	}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Menu_model extends CI_Model{

		public function tampil_data()
		{
			return $this->db->get('menu');
		}

		public function add($data)
		{
			$params = [
				'nama' => $data['nama'],
				'jenis' => $data['jenis'],
				'harga' => $data['harga'],
			];

			$this->db->insert('menu', $params);
		}

		public function get($id = null)
		{
			$this->db->from('menu');
			if ($id != null) {
				$this->db->where('id_menu', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		public function edit($data)
		{
			$params = [
				'nama'	=> $data['nama'],
				'jenis'	=> $data['jenis'],
				'harga'	=> $data['harga'],
			];

			$this->db->where('id_menu', $data['id_menu']);
			$this->db->update('menu', $params);
		}

		public function del($id)
		{
			$this->db->where('id_menu', $id);
			$this->db->delete('menu');
		}
	}
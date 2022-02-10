<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model{
	
	public function tampil_data()
	{
		return $this->db->get('supplier');
	}

	public function add($data)
	{
		$params = [
			'nama' => $data['nama'],
			'no_telepon' => $data['no_telepon'],
			'alamat' => $data['alamat'],
			'keterangan' => empty($data['keterangan']) ? null : $data['keterangan'],
		];
		$this->db->insert('supplier', $params);
	}

	public function get($id = null)
		{
			$this->db->from('supplier');
			if ($id != null) {
				$this->db->where('id_supplier', $id);
			}
			$query = $this->db->get();
			return $query;
		}

	public function edit($data)
	{
		$params = [
			'nama' 			=> $data['nama'],
			'no_telepon' 	=> $data['no_telepon'],
			'alamat' 		=> $data['alamat'],
			'keterangan'	=> empty($data['keterangan']) ? null : $data['keterangan'],
		];
		$this->db->where('id_supplier', $data['id_supplier']);
		$this->db->update('supplier', $params);
	}

	public function del($id)
	{
		$this->db->where('id_supplier', $id);
		$this->db->delete('supplier');
	}	
}
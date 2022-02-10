<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan_model extends CI_Model{
	
	public function tampil_data()
	{
		return $this->db->get('bahan');
	}

	public function add($data)
	{
		$params = [
			'nama' => $data['nama'],
			'satuan' => $data['satuan'],
		];
		$this->db->insert('bahan', $params);
	}

	public function get($id = null)
		{
			$this->db->from('bahan');
			if ($id != null) {
				$this->db->where('id_bahan', $id);
			}
			$query = $this->db->get();
			return $query;
		}

	public function edit($data)
	{
		$params = [
			'nama' => $data['nama'],
			'satuan' => $data['satuan'],
		];
		$this->db->where('id_bahan', $data['id_bahan']);
		$this->db->update('bahan', $params);
	}

	public function del($id)
	{
		$this->db->where('id_bahan', $id);
		$this->db->delete('bahan');
	}

		function update_stok_in($data)
		{
			$qty = $data['qty'];
			$id = $data['id_bahan'];
			$sql = "UPDATE bahan SET 
					stok = stok + '$qty', 
					stok_in = stok_in + '$qty',
					stok_akhir = stok_awal + stok_in - stok_out
					WHERE id_bahan = '$id'";
			$this->db->query($sql);
		}

		function delete_stok_in($data)
		{
			$qty = $data['qty'];
			$id = $data['id_bahan'];
			$sql = "UPDATE bahan SET 
					stok = stok - '$qty',
					stok_in = stok_in - '$qty', 
					stok_akhir = stok_awal + stok_in - stok_out
					WHERE id_bahan = '$id'";
			$this->db->query($sql);
		}

		function update_stok_out($data)
		{
			$qty = $data['qty'];
			$id = $data['id_bahan'];
			$sql = "UPDATE bahan SET 
					stok = stok - '$qty', 
					stok_out = stok_out + '$qty' 
					stok_akhir = stok_awal + stok_in - stok_out
					WHERE id_bahan = '$id'";
			$this->db->query($sql);
		}

		function delete_stok_out($data)
		{
			$qty = $data['qty'];
			$id = $data['id_bahan'];
			$sql = "UPDATE bahan SET 
					stok = stok + '$qty', 
					stok_out = stok_out - '$qty',
					stok_akhir = stok_awal + stok_in - stok_out
					WHERE id_bahan = '$id'";
			$this->db->query($sql);
		}

		function minus_cart($totalqty, $id_bahan)
		{
			$value = $totalqty;
			$id = $id_bahan;
			
			$sql = "UPDATE bahan SET 
					stok = stok - '$value', 
					stok_out = stok_out + '$value',
					stok_akhir = stok_awal + stok_in - stok_out
					WHERE id_bahan = '$id'";
			$this->db->query($sql);
		}

		function updateOpname($id){
			$sql = "UPDATE bahan SET 
			stok_awal = stok_akhir,
			stok_in = 0,
			stok_out = 0,
			stok_akhir = 0
			WHERE id_bahan = '$id'";
			$this->db->query($sql);
		}
}
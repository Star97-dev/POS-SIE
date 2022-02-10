<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model{
	
	public function tampil_data()
	{
		$this->db->select('*, user.nama as nama_user');
		$this->db->from('pengeluaran');
		$this->db->join('user','user.id_user = pengeluaran.id_user');
		$this->db->order_by('tanggal', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$params = [
			'id_user' => $this->session->userdata('id_user'),
			'tanggal' => $data['tanggal'],
			'jenis' => $data['jenis'],
			'biaya' => $data['biaya'],
			'keterangan' => empty($data['keterangan']) ? null : $data['keterangan'],
		];
		$this->db->insert('pengeluaran', $params);
	}

	public function get($id = null)
		{
			$this->db->from('pengeluaran');
			if ($id != null) {
				$this->db->where('id_pengeluaran', $id);
			}
			$query = $this->db->get();
			return $query;
		}

	public function edit($data)
	{
		$params = [
			'id_user' 		=> $this->session->userdata('id_user'),
			'tanggal' 		=> $data['tanggal'],
			'jenis'		 	=> $data['jenis'],
			'biaya' 		=> $data['biaya'],
			'keterangan'	=> empty($data['keterangan']) ? null : $data['keterangan'],
		];
		$this->db->where('id_pengeluaran', $data['id_pengeluaran']);
		$this->db->update('pengeluaran', $params);
	}

	function input_stok($data)
	{
		$params = [
		'id_user' => $this->session->userdata('id_user'),
		'tanggal' => $data['tanggal'],
		'jenis' => 'Bahan',
		'biaya' => $data['total'],
		'keterangan' => $data['keterangan'] == '' ? null : $data['keterangan'],
	];
		$this->db->insert('pengeluaran', $params);
	}

	public function getModal(){
		$query = $this->db->query("SELECT SUM(biaya) as modal FROM pengeluaran WHERE YEAR(tanggal)=YEAR(now())");
		return $query;
	}
}
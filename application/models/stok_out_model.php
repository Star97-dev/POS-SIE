<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class stok_out_model extends CI_Model{

		public function get($id = null)
		{
			$this->db->from('stok');
			if($id != null)
			{
				$this->db->where('id_stok', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		public function tampil_data()
		{
			$this->db->select('id_stok, user.nama as nama_user, supplier.nama as supplier_name, bahan.nama as bahan_name, tanggal, qty, stok.keterangan as keterangan, bahan.id_bahan');
			$this->db->from('stok');
			$this->db->join('user','user.id_user = stok.id_user');
			$this->db->join('bahan','stok.id_bahan = bahan.id_bahan');
			$this->db->join('supplier','stok.id_supplier = supplier.id_supplier','left');
			$this->db->where('tipe','Out');
			$this->db->order_by('id_stok','desc');
			$query = $this->db->get();
			return $query;
		}

		public function add($post)
		{
			$params = [
				'id_user'	=> $this->session->userdata('id_user'),
				'id_bahan'	=> $post['id_bahan'],
				'tanggal'	=> $post['tanggal'],
				'tipe'		=> 'Out',
				'qty'		=> $post['qty'],
				'keterangan'=> $post['keterangan'] == '' ? null : $post['keterangan']
			];
			$this->db->insert('stok', $params);
		}

		public function del($id)
		{
			$this->db->where('id_stok',$id);
			$this->db->delete('stok');
		}
	}
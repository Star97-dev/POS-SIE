<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep_model extends CI_Model
{
	public function tampil_data(){
		$this->db->select('*, menu.nama as nama_menu');
		$this->db->from('menu');
		$query = $this->db->get();
		return $query;
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

		public function get_detail($id = null)
		{
			$query = $this->db->query("SELECT id_detail_resep, detail_resep.id_menu as id_menu_detail, detail_resep.id_bahan as id_bahan_detail, menu.nama as nama_menu, 
					 bahan.nama as nama_bahan, qty, detail_resep.satuan as satuan_detail FROM detail_resep 
					 JOIN menu ON menu.id_menu = detail_resep.id_menu JOIN bahan ON bahan.id_bahan = detail_resep.id_bahan WHERE detail_resep.id_menu ='$id'");
			return $query;
		}

		public function detail_bahan($id = null){
			$this->db->from('detail_resep');
			if($id != null){
				$this->db->where('id_bahan', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		public function edit($data){
			$params = array(
				'id_bahan' => $data['id_bahan'],
				'qty' => $data['qty'],
				'satuan' => $data['satuan'],
			);
			$this->db->where('id_detail_resep', $data['id_detail_resep']);
			$this->db->update('detail_resep', $params);
		}

		public function del($id){
			$this->db->where('id_detail_resep',$id);
			$this->db->delete('detail_resep');
		}

	public function input_cart($data)
	{
		$query = $this->db->query("SELECT MAX(id_cart) AS no_cart from cart");
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$no_car = ((int)$row->no_cart) + 1;
		} else {
			$no_car = "1";
		}
		$params = array(
			'id_cart' => $no_car,
			'id_bahan' => $data['id_bahan'],
			'qty' => $data['qty'],
			'satuan' => $data['satuan'],
			'id_user' => $this->session->userdata('id_user'),
		);

		$this->db->insert('cart', $params);
	}

	public function get_cart()
	{
		$this->db->select('*, bahan.nama as nama_bahan');
		$this->db->from('cart');
		$this->db->join('bahan', 'cart.id_bahan = bahan.id_bahan');
		$query = $this->db->get();
		return $query;
	}

	public function cart_del($params = null)
	{
		if ($params != null) {
			$this->db->where($params);
		}
		$this->db->delete('cart');
	}

	function add_resep_detail($params)
	{
		$this->db->insert_batch('detail_resep', $params);
	}

	public function get_kalkulasi($id_menu)
	{
		$this->db->select('id_menu, id_bahan, qty');
		$this->db->from('detail_resep');
		$this->db->where('id_menu = ' . $id_menu);
		return $this->db->get();
	}
}

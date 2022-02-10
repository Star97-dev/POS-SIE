<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pos_model extends CI_Model{

		public function no_invoice()
		{
			$sql = "SELECT MAX(MID(invoice,9,4)) AS no_invoice 
					FROM penjualan 
					WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
			$query = $this->db->query($sql);
			if($query->num_rows() > 0){
				$row = $query->row();
				$n = ((int)$row->no_invoice) + 1;
				$no = sprintf("%'.04d", $n); 
			} else{
				$no = "0001";
			}
			$invoice = "RJ".date('ymd').$no;
			return $invoice;
		}

		public function get_cart($params = null)
		{
			$this->db->select('*, menu.nama as nama_menu, menu.harga as harga_menu');
			$this->db->from('cart');
			$this->db->join('menu','cart.id_menu = menu.id_menu');
			if ($params != null) {
				$this->db->where($params);
			}
			$this->db->where('id_user', $this->session->userdata('id_user'));
			$query = $this->db->get();
			return $query;
		}

		public function add_cart($data)
		{
			$query = $this->db->query("SELECT MAX(id_cart) AS no_cart FROM cart");
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$no_car = ((int)$row->no_cart) + 1;
			} else {
				$no_car = 1;
			}

			$params = array(
				'id_cart' => $no_car,
				'id_menu' => $data['id_menu'],
				'harga' => $data['harga'],
				'qty' => $data['qty'],
				'total' => ($data['harga'] * $data['qty']),
				'id_user' => $this->session->userdata('id_user')
			);
			$this->db->insert('cart', $params);
		}

		function update_qty($data)
		{
			$sql = "UPDATE cart SET
					harga = '$data[harga]',
					qty = qty + '$data[qty]',
					total = '$data[harga]' * qty
					WHERE id_menu = '$data[id_menu]'";
			$this->db->query($sql);
		}

		public function del_cart($params = null)
		{
			if($params != null){
				$this->db->where($params);
			}
			$this->db->delete('cart');
		}

		function edit_cart($data)
		{
			$params = array(
				'qty' => $data['qty'],
				'total' => $data['total'],
			);
			$this->db->where('id_cart', $data['id_cart']);
			$this->db->update('cart', $params);
		}

		public function add_sale($data)
		{
			$params = array(
				'id_user' => $this->session->userdata('id_user'),
				'tanggal' => $data['tanggal'],
				'invoice' => $this->no_invoice(),
				'sub_total' => $data['sub_total'],
				'diskon' => $data['diskon'],
				'total' => $data['grand_total'],
				'cash' => $data['cash'],
				'change' => $data['change'],
				'note' => $data['note']
			);
			$this->db->insert('penjualan', $params);
			return $this->db->insert_id();
		}

		function add_sale_detail($params){
			$this->db->insert_batch('detail_penjualan', $params);
		}
	}
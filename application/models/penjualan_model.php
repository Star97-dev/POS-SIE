<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Penjualan_model extends CI_Model{

		public function get($id = null){
			$this->db->select('*, user.nama as nama_user');
			$this->db->from('penjualan');
			$this->db->join('user','user.id_user = penjualan.id_user');
			if($id != null){
				$this->db->where('id_penjualan', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		public function edit($data){
			$params = [
				'sub_total' => $data['sub_total'],
				'diskon' => $data['diskon'],
				'total' => $data['grand_total'],
				'cash' => $data['cash'],
				'change' => $data['change'],
			];
			$this->db->where('id_penjualan', $data['id_penjualan']);
			$this->db->update('penjualan', $params);
		}

		public function get_detail($id = null){
			$query = $this->db->query("SELECT id_detail_penjualan, detail_penjualan.id_penjualan as penjualan_id, detail_penjualan.id_menu as id_menu_detail,
			menu.nama as nama_menu, qty, detail_penjualan.harga as harga_detail, total FROM detail_penjualan 
			JOIN menu ON menu.id_menu = detail_penjualan.id_menu WHERE detail_penjualan.id_penjualan = '$id'");
			return $query;
		}

		public function detail_penjualan($id = null){
			$this->db->from('detail_penjualan');
			if($id != null){
				$this->db->where('id_detail_penjualan', $id);
			}
			$query = $this->db->get();
			return $query;
		}

		public function edit_dt($data){
			$params = [
				'id_menu' => $data['id_menu'],
				'harga' => $data['harga'],
				'qty' => $data['qty'],
				'total' => $data['total'],
			];
			$this->db->where('id_detail_penjualan', $data['id_detail_penjualan']);
			$this->db->update('detail_penjualan', $params);
		}

		public function del($id){
			$this->db->where('id_detail_penjualan', $id);
			$this->db->delete('detail_penjualan');
		}

		public function getOmset(){
			$query = $this->db->query("SELECT SUM(total) as omset FROM penjualan WHERE YEAR(tanggal)=YEAR(now())");
			return $query;
		}
	}
?>
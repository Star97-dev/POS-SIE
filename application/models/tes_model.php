<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Tes_model extends CI_model{

		public function nyoba($id_menu=2){
			
			// $this->db->select('menu.nama as id_menu, bahan.nama as id_bahan, detail_penjualan.qty as dp, detail_resep.qty as dr, bahan.satuan');
			// $this->db->select('(detail_penjualan.qty * detail_resep.qty) as result');
			// $this->db->from('detail_resep');
			// $this->db->join('menu','menu.id_menu = detail_resep.id_menu');
			// $this->db->join('bahan','bahan.id_bahan = detail_resep.id_bahan');
			// $this->db->join('detail_penjualan','detail_penjualan.id_menu = detail_resep.id_menu');
			// $this->db->where('detail_penjualan.id_menu = detail_resep.id_menu');
			// return $this->db->get();

			$this->db->select('id_menu, id_bahan, qty');
			$this->db->from('detail_resep');
			// $this->db->join('detail_penjualan','detail_penjualan.id_menu = detail_resep.id_menu');
			$this->db->where('id_menu = '.$id_menu);
			return $this->db->get();
		}

		public function tes(){
			$this->db->select('detail_penjualan.qty, detail_resep.qty');
			$this->db->select('(detail_penjualan.qty * detail_resep.qty) as value');
			$this->db->from('detail_resep');
			$this->db->join('detail_penjualan','detail_penjualan.id_menu = detail_resep.id_menu');
			$this->db->where('detail_penjualan.id_menu = detail_resep.id_menu');
			return $this->db->get();
		}

		public function get_bahan($data){

			$qty = $data['qty'];

			$this->db->select('*, $qty');
			$this->db->from('bahan');
			$this->db->join('detail_resep','detail_resep.id_bahan = bahan.id_bahan');
			$this->db->where('detail_resep.id_bahan = bahan.id_bahan');
			return $this->db->get();
		}

		public function get_drill(){
            // $query = "SELECT  distinct(MONTHNAME(a.tanggal)) as tanggal_penjualan, a.id_penjualan as id_penjualan, a.total as total_penjualan, 
			// 		  f.id_stok as id_stok
			// 		  from penjualan a join detail_penjualan b on (a.id_penjualan = b.id_penjualan) join menu c on (b.id_menu = c.id_menu) 
			// 		  left join detail_resep d on (c.id_menu = d.id_menu) left join bahan e on (d.id_bahan = e.id_bahan)
			// 		  full outer join stok f on (e.id_bahan = f.id_bahan) ";

			$query = "SELECT a.tanggal as tanggal_penjualan, a.id_penjualan as id_penjualan, a.total as total_penjualan, b.tanggal as tanggal_stok
					  from penjualan a join stok b on (a.id_stok = b.id_stok)"; 
            return $this->db->query($query);

			
        }

		public function getB($bulan){
			$query = "SELECT MONTHNAME(tanggal) from penjualan where MONTHNAME(tanggal) = '$bulan'";

			return $this->db->get($query);
		}
	}	

?>
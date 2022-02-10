<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		belom_login();

		$query = $this->db->query("SELECT detail_penjualan.id_menu, menu.nama, penjualan.tanggal as tanggal,
			(SELECT SUM(detail_penjualan.qty)) as sold 
			from detail_penjualan
				inner join menu on detail_penjualan.id_menu = menu.id_menu
				inner join penjualan on detail_penjualan.id_penjualan = penjualan.id_penjualan
				where year(tanggal)=year(now()) and month(tanggal)=month(now())
				group by detail_penjualan.id_menu
				order by sold desc
				limit 5
				");
		$data['row'] = $query->result();
		$this->template->load('template', 'dashboard', $data);
	}
}

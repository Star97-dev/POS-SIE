<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drilldown extends CI_Controller {

	public function index()
	{
		belom_login();
		cek_manager();
		$data['get_date'] = $this->drilldown_model->get_date()->result();
		$data['penjualan'] = $this->penjualan_model->getOmset()->result();
		$data['pengeluaran'] = $this->pengeluaran_model->getModal()->result();
		$this->template->load('template', 'analisis/drilldown/drilldown', $data);
	}

	public function getCharts(){
		$years = $this->input->post('year');
		$get_series = $this->drilldown_model->get_cart($years)->result();
		
		$data=[
			'get_series' => $get_series,	
		];
		echo json_encode($data);
	}
	// $this->template->load('template', 'analisis/drilldown/drilldown', $data);
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

function __construct()
	{
		parent::__construct();
	}

	// public function index()
	// {
	// 	$data['detail_resep'] = $this->tes_model->nyoba()->result();
	// 	$this->load->view('tes', $data);
		
	// }

	public function index()
	{
		$this->load->view('tes');
	}

	public function getBulan(){

		$bulan = $this->input->post('bulan');

		$data['bulan'] = $this->tes_model->getB($bulan)->result();
		$this->load->view('tes', $data);
		var_dump($bulan);
	}


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

function __construct()
	{
		parent::__construct();
		belom_login();
		not_admin();	
	}

	public function index()
	{
		$data['penjualan'] = $this->penjualan_model->get()->result();
		$this->template->load('template','transaksi/penjualan/penjualan', $data);
	}

	public function detail($id){
		$menu = $this->menu_model->get()->result();
		$detail_penjualan = $this->penjualan_model->get_detail($id)->result();
		$penjualan = $this->penjualan_model->get($id)->result();
		$data = [
			'menu' => $menu,
			'detail_penjualan' => $detail_penjualan,
			'penjualan' => $penjualan,
		];
		$this->template->load('template','transaksi/penjualan/form_detail_penjualan',$data);
	}

	public function proses(){
		$data = $this->input->post(null, TRUE);
		
		if(isset($_POST['edit_detail'])){
		$this->penjualan_model->edit_dt($data);
	
			if ($this->db->affected_rows() > 0) {
				$params = array('success' => true);
			} else {
				$params = array('success' => false);
			}
			echo json_encode($params);

		}

		if(isset($_POST['del_detail'])){
			$id = $this->input->post('id_detail_penjualan');
			$this->penjualan_model->del($id);
	
				if ($this->db->affected_rows() > 0) {
					$params = array('success' => true);
				} else {
					$params = array('success' => false);
				}
				echo json_encode($params);
		}

		if(isset($_POST['back_detail'])){
			$this->penjualan_model->edit($data);
				if ($this->db->affected_rows() > 0) {
					$params = array('success' => true);
				} else {
					$params = array('success' => false);
				}
				echo json_encode($params);
			}
		
		if(isset($_POST['edit_penjualan'])){
			$this->penjualan_model->edit($data);
				if ($this->db->affected_rows() > 0) {
					$params = array('success' => true);
				} else {
					$params = array('success' => false);
				}
				echo json_encode($params);
			}
	}
}
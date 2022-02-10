<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {

function __construct()
	{
		parent::__construct();
		belom_login();
		cek_kasir();	
	}

	public function index()
	{
		$menu = $this->menu_model->get()->result();
		$cart = $this->pos_model->get_cart();
		$diskon = $this->diskon_model->getDiskon()->result();
		$data = array(
				'menu' => $menu,
				'cart' => $cart,
				'diskon' => $diskon,
				'invoice' => $this->pos_model->no_invoice(),
		);
		$this->template->load('template','transaksi/pos/pos', $data);
	}


	public function proses()
	{
		$data = $this->input->post(null, TRUE);

		if (isset($_POST['add_cart'])) {
			$id_menu = $this->input->post('id_menu');
			$cek_cart = $this->pos_model->get_cart(['cart.id_menu' => $id_menu])->num_rows();
			if ($cek_cart > 0) {
				$this->pos_model->update_qty($data);
			} else {
				$this->pos_model->add_cart($data);
			}

		if ($this->db->affected_rows() > 0) {
			$params = array("success" => true );
		} 
		else
		{
			$params = array("success" => false );
		}
		echo json_encode($params);
	}

	if(isset($_POST['edit_cart'])){
		$this->pos_model->edit_cart($data);
		if ($this->db->affected_rows() > 0) {
			$params = array("success" => true );
		} 
		else
		{
			$params = array("success" => false );
		}
		echo json_encode($params); 
	}

	if(isset($_POST['payment'])) {
		$penjualan_id = $this->pos_model->add_sale($data);
		$cart = $this->pos_model->get_cart()->result();
		$row = [];
		foreach ($cart as $c => $value) {
			array_push($row, array(
				'id_penjualan' => $penjualan_id,
				'id_menu' => $value->id_menu,
				'qty' => $value->qty,
				'harga' => $value->harga,
				'total' => $value->total,
				)
			);
		$resep = $this->resep_model->get_kalkulasi($value->id_menu)->result();

		$qty = $value->qty;
			foreach ($resep as $key => $value) {
				$totalqty = $value->qty * $qty;
				$id_bahan = $value->id_bahan;
				
				$kurangstok = $this->bahan_model->minus_cart($totalqty, $id_bahan);
			}
		}
		$this->pos_model->add_sale_detail($row);
		$this->pos_model->del_cart(['id_user' => $this->session->userdata('id_user')]);

		if ($this->db->affected_rows() > 0) {
			$params = array("success" => true );
		} 
		else
		{
			$params = array("success" => false );
		}
		echo json_encode($params);
	}
 }
	
	function cart_data()
	{
		$cart = $this->pos_model->get_cart();
		$data['cart'] = $cart;
		$this->load->view('transaksi/pos/cart', $data);
	}

	public function cart_del()
	{
		$id_cart = $this->input->post('id_cart');
		$this->pos_model->del_cart(['id_cart' => $id_cart]);

		if ($this->db->affected_rows() > 0) {
			$params = array("success" => true );
		} 
		else
		{
			$params = array("success" => false );
		}
		echo json_encode($params);
	 }
}
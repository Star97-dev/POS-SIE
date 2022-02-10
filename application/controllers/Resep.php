
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		belom_login();
		cek_admin();
	}

	public function index()
	{
		$data['resep'] = $this->resep_model->tampil_data()->result();
		$this->template->load('template', 'inventory/resep/resep', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Cari bahan', 'required');
		$this->form_validation->set_rules('qty', 'Qty', 'required|integer');

		$this->form_validation->set_message('required', '%s tidak boleh kosong!');
		$this->form_validation->set_message('integer', '%s harus angka!');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$menu = $this->menu_model->get()->result();
			$bahan = $this->bahan_model->get()->result();
			$cart = $this->resep_model->get_cart();
			$data = [
				'menu' => $menu,
				'bahan' => $bahan,
				'cart' => $cart,
			];
			$this->template->load('template', 'inventory/resep/form_add_resep', $data);
		} else {
			$post = $this->input->post(null, TRUE);
		}
	}

	public function detail($id)
	{
		$bahan = $this->bahan_model->get()->result();
		$detail = $this->resep_model->get_detail($id)->result();
		$menu = $this->resep_model->get($id)->result();
		$data = [
			'bahan' => $bahan,
			'detail' => $detail,
			'menu'	 => $menu,
		];
		$this->template->load('template', 'inventory/resep/form_detail_resep', $data);
	}

	public function del_detail($id, $id_menu_detail){
		$this->resep_model->del($id);
		if($this->db->affected_rows() > 0){
			echo "<script> 
					alert('Data berhasil di hapus!')
				  	window.location='".site_url('resep/detail/'.$id_menu_detail)."'; 
				  </script>";
		} else {
			echo "<script> 
					alert('Data gagal di hapus!')
					window.location='".site_url('resep/detail/'.$id_menu_detail)."'; 
				 </script>";
		}
	}

	public function proses()
	{
		$data = $this->input->post(null, TRUE);

		if(isset($_POST['edit_detail'])){
		$this->resep_model->edit($data);
		
		if($this->db->affected_rows() > 0){
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

		if (isset($_POST['input_cart'])) {

			$this->resep_model->input_cart($data);

			if ($this->db->affected_rows() > 0) {
				$params = array('success' => true);
			} else {
				$params = array('success' => false);
			}
			echo json_encode($params);
		}

		if(isset($_POST['del_detail'])){
			$id = $this->input->post('id_detail_resep');
			$this->resep_model->del($id);
			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true );
			} 
			else
			{
				$params = array("success" => false );
			}
			echo json_encode($params);
		}

		if (isset($_POST['simpan_cart'])) {
			//$this->resep_model->add_resep($data);
			$cart = $this->resep_model->get_cart()->result();
			$id_menu = $this->input->post('id_menu');
			$row = array();
			foreach ($cart as $c => $value) {
				array_push(
					$row,
					array(
						'id_menu' => $id_menu,
						'id_bahan' => $value->id_bahan,
						'qty' => $value->qty,
						'satuan' => $value->satuan,
					)
				);
			}
			$this->resep_model->add_resep_detail($row);
			$this->resep_model->cart_del(['id_user' => $this->session->userdata('id_user')]);

			if ($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}
	}

	function cart_resep()
	{
		$cart = $this->resep_model->get_cart();
		$data['cart'] = $cart;
		$this->load->view('inventory/resep/cart', $data);
	}

	public function cart_del()
	{
		$id_cart = $this->input->post('id_cart');
		$this->resep_model->cart_del(['id_cart' => $id_cart]);

		// $data = $this->input->post(null, TRUE);
		// $this->resep_model->update_del($data);

		if ($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}

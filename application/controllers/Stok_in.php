<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_in extends CI_Controller {

function __construct()
	{
		parent::__construct();
		belom_login();
		not_kasir();	
		
	}

	public function index()
	{
		$data['stok'] = $this->stok_in_model->tampil_data()->result();
		$this->template->load('template','transaksi/stok_in/stok_in', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('tanggal','Tanggal','required');
		$this->form_validation->set_rules('nama','Cari bahan','required');
		$this->form_validation->set_rules('qty','Qty','required|integer');
		$this->form_validation->set_rules('total','Total','required|integer');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus angka!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) 
		{
			$bahan = $this->bahan_model->get()->result();
			$supplier = $this->supplier_model->get()->result();
			$data = [
				 'bahan' => $bahan, 
				 'supplier' => $supplier,
				];
			$this->template->load('template','transaksi/stok_in/form_add_stok_in', $data);
		}
		else
		{
			$post = $this->input->post(null,TRUE);
			$this->stok_in_model->add($post);
			$this->bahan_model->update_stok_in($post);
			// var_dump();
			$this->pengeluaran_model->input_stok($post);
			if($this->db->affected_rows() > 0) 
			{
				echo "<script>
            			alert('Data berhasil di input!')
						window.location='".site_url('stok_in')."';
					  </script>";
            }
            else
            {
            	redirect('stok');
            }
		}
	}

	public function del()
	{
		$id_stok = $this->uri->segment(3);
		$id_bahan = $this->uri->segment(4);
		$qty = $this->stok_in_model->get($id_stok)->row()->qty;
		$data = 
		[   
			'qty' => $qty,
			'id_bahan' => $id_bahan
		];
		$this->bahan_model->delete_stok_in($data);
		$this->stok_in_model->del($id_stok);
		if($this->db->affected_rows() > 0) 
			{
				echo "<script>
            			alert('Data berhasil di hapus!')
						window.location='".site_url('stok_in')."';
					  </script>";
            }
            else
            {
            	redirect('stok_in');
            }

	}

	
	
}
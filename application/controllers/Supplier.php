<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

function __construct()
	{
		parent::__construct();
		belom_login();
		cek_admin();	
	}

	public function index()
	{
		$data['supplier'] = $this->supplier_model->tampil_data()->result(); 
		$this->template->load('template', 'supplier/supplier', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|integer|max_length[14]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');
		$this->form_validation->set_message('max_length','%s tidak boleh lebih dari 14 karakter!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
            {
				$this->template->load('template', 'supplier/form_add_supplier');	
         	}
        else
         	{
         		$data = $this->input->post(null, TRUE);
            	$this->supplier_model->add($data);
            	if ($this->db->affected_rows() > 0) {
            		echo "<script>
            				alert('Data berhasil di input')
							window.location='".site_url('supplier')."';
						  </script>";
            	}
        	}
	}

	public function edit($id)
	{		
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|integer|max_length[14]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');
		$this->form_validation->set_message('max_length','%s tidak boleh lebih dari 14 karakter!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
            {
            	$query = $this->supplier_model->get($id);
            	if ($query->num_rows() > 0) 
            	{
            		$data['row'] = $query->row();
					$this->template->load('template','supplier/form_edit_supplier', $data);	
            	}
            	else
				{
					echo "<script>
            				alert('Data tidak di temukan!!!')
							window.location='".site_url('supplier')."';
						  </script>";
				}
         	}
        else
         	{
         		$data = $this->input->post(null, TRUE);
            	$this->supplier_model->edit($data);
            	if ($this->db->affected_rows() > 0) {
            		echo "<script>
            				alert('Data berhasil di update!')
							window.location='".site_url('supplier')."';
						  </script>";
            	}
            	else
            	{
            		redirect('supplier');
            	}
        	}
	}

	public function del($id)
	{
		$this->supplier_model->del($id);
		if($this->db->affected_rows() > 0 )
		{
			echo "<script>
            		alert('Data berhasil di hapus')
					window.location='".site_url('supplier')."';
				  </script>";
		}
	}
}
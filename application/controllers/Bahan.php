<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {

function __construct()
	{
		parent::__construct();
		belom_login();
		cek_admin();	
	}

	public function index()
	{
		$data['bahan'] = $this->bahan_model->tampil_data()->result(); 
		$this->template->load('template', 'inventory/bahan/bahan', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
            {
				$this->template->load('template', 'inventory/bahan/form_add_bahan');	
         	}
        else
         	{
         		$data = $this->input->post(null, TRUE);
            	$this->bahan_model->add($data);
            	if ($this->db->affected_rows() > 0) 
            	{
            		echo "<script>
            				alert('Data berhasil di input')
							window.location='".site_url('bahan')."';
						  </script>";
            	}
        	}
	}

	public function edit($id)
	{		
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
            {
            	$query = $this->bahan_model->get($id);
            	if ($query->num_rows() > 0) 
            	{
            		$data['row'] = $query->row();
					$this->template->load('template','inventory/bahan/form_edit_bahan', $data);	
            	}
            	else
				{
					echo "<script>
            				alert('Data tidak di temukan!!!')
							window.location='".site_url('bahan')."';
						  </script>";
				}
         	}
        else
         	{
         		$data = $this->input->post(null, TRUE);
            	$this->bahan_model->edit($data);
            	if ($this->db->affected_rows() > 0) {
            		echo "<script>
            				alert('Data berhasil di update!')
							window.location='".site_url('bahan')."';
						  </script>";
            	}
            	else
            	{
            		redirect('bahan');
            	}
        	}
	}

	public function del($id)
	{
		$this->bahan_model->del($id);
		if($this->db->affected_rows() > 0 )
		{
			echo "<script>
            		alert('Data berhasil di hapus')
					window.location='".site_url('bahan')."';
				  </script>";
		}
	}
}
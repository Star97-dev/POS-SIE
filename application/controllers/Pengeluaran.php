<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

function __construct()
	{
		parent::__construct();
		belom_login();
		not_kasir();	
	}

	public function index()
	{
		$data['pengeluaran'] = $this->pengeluaran_model->tampil_data()->result(); 
		$this->template->load('template', 'pengeluaran/pengeluaran', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('biaya', 'Biaya', 'required|integer');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
            {
				$this->template->load('template', 'pengeluaran/form_add_pengeluaran');	
         	}
        else
         	{
         		$data = $this->input->post(null, TRUE);
            	$this->pengeluaran_model->add($data);
            	if ($this->db->affected_rows() > 0) 
            	{
            		echo "<script>
            				alert('Data berhasil di input')
							window.location='".site_url('pengeluaran')."';
						  </script>";
            	}
        	}
	}

	public function edit($id)
	{		
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('biaya', 'Biaya', 'required|integer');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
            {
            	$query = $this->pengeluaran_model->get($id);
            	if ($query->num_rows() > 0) 
            	{
            		$data['row'] = $query->row();
					$this->template->load('template','pengeluaran/form_edit_pengeluaran', $data);
            	}
            	else
				{
					echo "<script>
            				alert('Data tidak di temukan!!!')
							window.location='".site_url('pengeluaran')."';
						  </script>";
				}
         	}
        else
         	{
         		$data = $this->input->post(null, TRUE);
            	$this->pengeluaran_model->edit($data);
            	if ($this->db->affected_rows() > 0) {
            		echo "<script>
            				alert('Data berhasil di update!')
							window.location='".site_url('pengeluaran')."';
						  </script>";
            	}
            	else
            	{
            		redirect('pengeluaran');
            	}
        	}
	}
}
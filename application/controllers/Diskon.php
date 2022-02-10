<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskon extends CI_Controller {

function __construct()
	{
		parent::__construct();
		belom_login();
		cek_kasir();	
	}

	public function index()
	{
		$data['diskon'] = $this->diskon_model->get()->result(); 
		$this->template->load('template', 'diskon/diskon', $data);
	}

    public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama Diskon', 'required');
		$this->form_validation->set_rules('hargaDiskon', 'Diskon', 'required|integer');
        $this->form_validation->set_rules('tanggalAwal', 'Tanggal mulai Diskon', 'required');
        $this->form_validation->set_rules('tanggalAkhir', 'Tanggal akhir Diskon', 'required');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
            {
				$this->template->load('template', 'diskon/add_diskon');	
         	}
        else
         	{
         		$data = $this->input->post(null, TRUE);
            	$this->diskon_model->add($data);
            	if ($this->db->affected_rows() > 0) 
            	{
            		echo "<script>
            				alert('Data berhasil di input')
							window.location='".site_url('diskon')."';
						  </script>";
            	}
        	}
	}
}
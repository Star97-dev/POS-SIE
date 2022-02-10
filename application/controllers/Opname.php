<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opname extends CI_Controller {

function __construct()
	{
		parent::__construct();
		belom_login();
		cek_admin();	
	}

	public function index()
	{
		$data['opname'] = $this->opname_model->get()->result(); 
		$this->template->load('template', 'inventory/opname/opname', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		

		$this->form_validation->set_message('required','%s tidak boleh kosong!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE)
            {
                $data['bahan'] = $this->bahan_model->tampil_data()->result();
				$this->template->load('template', 'inventory/opname/opname_add', $data);	
         	}
        else
         	{
         		$data = $this->input->post(null, TRUE);
                
                $date = $this->input->post('tanggal');
                $id = $this->input->post('bahan');

                $opname = $this->opname_model->getOpname($id)->result();
                foreach($opname as $opn) {
                    $params = [
                        'tanggal' => $date,
                        'id_bahan' => $opn->id_bahan,
                        'stok_awal' => $opn->stok_awal,
                        'stok_in' => $opn->stok_in,
                        'stok_out' => $opn->stok_out,
                        'stok_akhir' => $opn->stok_akhir,
                    ];
                }
                $this->opname_model->add($params);
                $this->bahan_model->updateOpname($id);
            	if ($this->db->affected_rows() > 0) 
            	{
            		echo "<script>
            				alert('Data berhasil di input')
							window.location='".site_url('opname')."';
						  </script>";
            	}
        	}
	}
}
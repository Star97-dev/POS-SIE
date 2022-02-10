<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

function __construct()
	{
		parent::__construct();
		belom_login();
			
	}

	public function index()
	{
		$data['menu'] = $this->menu_model->tampil_data()->result();
		$this->template->load('template','inventory/menu/menu', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jenis','Jenis','required');
		$this->form_validation->set_rules('harga','Harga','required|integer');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->template->load('template','inventory/menu/form_add_menu');
		}
		else
		{
			$data = $this->input->post(null, TRUE);
			$this->menu_model->add($data);
			if ($this->db->affected_rows() > 0) 
			{
				echo "<script>
						alert('Data berhasil di input')
						window.location='".site_url('menu')."';
					  </script>";
			}
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jenis','Jenis','required');
		$this->form_validation->set_rules('harga','Harga','required|integer');

		$this->form_validation->set_message('required','%s tidak boleh kosong!');
		$this->form_validation->set_message('integer','%s harus menggunakan angka!');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');	
		
		if($this->form_validation->run() == FALSE)
			{
				$query = $this->menu_model->get($id);
				if ($query->num_rows() > 0) 
				{
					$data['row'] = $query->row();
					$this->template->load('template','inventory/menu/form_edit_menu', $data);
				}
				else
				{
					echo "<script>
	            				alert('Data tidak di temukan!!!')
								window.location='".site_url('menu')."';
							  </script>";
				}
			}
		else
			{
				$data = $this->input->post(null, TRUE);
				$this->menu_model->edit($data);
				if ($this->db->affected_rows() > 0) {
					echo "<script> 
							alert('Data berhasil di update!')
						  	window.location='".site_url('menu')."'; 
						  </script>";
				}
				else
				{
					redirect('menu');
				}
			}
			
	}

	public function del($id)
	{
		$this->menu_model->del($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script> 
					alert('Data berhasil di hapus!')
					window.location='".site_url('menu')."';
				  </script>";
		}
	}
}
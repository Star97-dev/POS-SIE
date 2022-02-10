<?php

class Fungsi{
	protected $ci;
	public function __construct()
	{
		$this->ci =& get_instance();
	}

	function user_login()
	{
		$this->ci->load->model('login_model');
		$id_user 	= $this->ci->session->userdata('id_user');
		$user_data 	= $this->ci->login_model->get($id_user)->row();
		return $user_data;
	}

	public function hitung_menu() 
	{
		$this->ci->load->model('menu_model');
		return $this->ci->menu_model->get()->num_rows();
	}

	public function hitung_user() 
	{
		$this->ci->load->model('user_model');
		return $this->ci->user_model->get()->num_rows();
	}

	public function hitung_supplier() 
	{
		$this->ci->load->model('supplier_model');
		return $this->ci->supplier_model->get()->num_rows();
	}
}
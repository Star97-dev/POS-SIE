<?php
	
	function dah_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('id_user');
		if($user_session)
		{
			redirect('dashboard');
		}
	}

	function belom_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('id_user');
		if(!$user_session)
		{
			redirect('auth');
		}
	}

	function cek_admin()
	{
		$ci =& get_instance();
		$ci->load->library('fungsi');
		if ($ci->fungsi->user_login()->level != 1) {
			echo "<script>
            		alert('Error! Anda bukan admin!')
					window.location='".site_url('dashboard')."';
				  </script>";	
		}
	}

	function cek_kasir()
	{
		$ci =& get_instance();
		$ci->load->library('fungsi');
		if ($ci->fungsi->user_login()->level != 2) {
			echo "<script>
            		alert('Error! Anda bukan kasir!')
					window.location='".site_url('dashboard')."';
				  </script>";	
		}
	}

	function cek_manager()
	{
		$ci =& get_instance();
		$ci->load->library('fungsi');
		if ($ci->fungsi->user_login()->level != 3) {
			echo "<script>
            		alert('Error! Anda bukan manager!')
					window.location='".site_url('dashboard')."';
				  </script>";	
		}
	}

	function not_kasir()
	{
		$ci =& get_instance();
		$ci->load->library('fungsi');
		if($ci->fungsi->user_login()->level == 2) {
			echo "<script>
            		alert('Kasir tidak dapat mengakses halaman ini!')
					window.location='".site_url('dashboard')."';
				  </script>";
		}
	}

	function not_admin()
	{
		$ci =& get_instance();
		$ci->load->library('fungsi');
		if($ci->fungsi->user_login()->level == 1) {
			echo "<script>
            		alert('Admin tidak dapat mengakses halaman ini!')
					window.location='".site_url('dashboard')."';
				  </script>";
		}
	}

	function indo_currency($nominal)
	{
		$result = "Rp " . number_format($nominal, 0, ',', '.');
		return $result;
	}

	function indo_date($date)
	{
		$d = substr($date,8,2);
		$m = substr($date,5,2);
		$y = substr($date,0,4);
		return $d.'/'.$m.'/'.$y;
	}
?>
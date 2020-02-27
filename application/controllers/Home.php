<?php
	class Home extends CI_Controller
	{
		public function __construct() {
	        parent::__construct();

	        if($this->session->userdata('account') == null) {
				redirect('Login');
			}
	    }

		function index()
		{
			$data['title'] = 'Ini adalah title Home';
			$data['description'] = 'Ini adalah description Home';
			$data['keywords'] = 'Ini adalah keywords Home';

			$akun = $this->session->userdata('account');
			$id_pasien = $akun['id_pasien'];
			
			$data['data_akun'] = $this->M_setting->get_data_akun($id_pasien);

			$this->load->view('Backend/User/V_home',$data);
		}
	}
?>	
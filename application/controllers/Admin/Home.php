<?php
	class Home extends CI_Controller
	{
		public function __construct() {
	        parent::__construct();

	        if($this->session->userdata('account') == null) {
				redirect('Admin/Login');
			}
	    }

		function index()
		{
			$data['title'] = 'Ini adalah title Home';
			$data['description'] = 'Ini adalah description Home';
			$data['keywords'] = 'Ini adalah keywords Home';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);

			$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);

			$this->load->view('Backend/Admin/V_home',$data);
		}
	}
?>	
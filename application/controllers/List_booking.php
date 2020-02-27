<?php
	class List_booking extends CI_Controller
	{
		function __contruct(){
			parent::__construct();
		}

		function index()
		{
			$data['title'] = 'Ini adalah title Booking';
			$data['description'] = 'Ini adalah description Booking';
			$data['keywords'] = 'Ini adalah keywords Booking';

			$akun = $this->session->userdata('account');
			$id_pasien = $akun['id_pasien'];

                  $data['list'] = $this->M_list_booking->get_data_list($id_pasien);
			$data['data_akun'] = $this->M_list_booking->get_data_akun($id_pasien);

			$this->load->view('Backend/User/V_list_booking',$data);
		}
	}
?>	
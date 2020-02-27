<?php
	class List_booking extends CI_Controller
	{
		function __contruct(){
			parent::__construct();
		}

		function index()
		{
			$data['title'] = 'Ini adalah title List Booking';
			$data['description'] = 'Ini adalah description List Booking';
			$data['keywords'] = 'Ini adalah keywords List Booking';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);
          	$data['list'] = $this->M_admin_list_booking->get_data_list($id_admin);	

          	$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);
			
			$this->load->view('Backend/Admin/V_list_booking',$data);
		}

		function Konfirmasi_booking()
		{
			$data['title'] = 'Ini adalah title List Booking';
			$data['description'] = 'Ini adalah description List Booking';
			$data['keywords'] = 'Ini adalah keywords List Booking';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);

			$id_booking = $this->input->post('id_booking');
			$status = "Confirmed";
			$data = array(
                "status" => $status
            ); 

            $this->M_admin_list_booking->konfirmasi_booking($data,$id_booking);
            redirect('Admin/List_booking');
		}
	}
?>	
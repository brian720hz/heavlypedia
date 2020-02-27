<?php
	class Booking extends CI_Controller
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

			$data['data_akun'] = $this->M_booking->get_data_akun($id_pasien);
			$data['data_poli'] = $this->M_booking->get_data_poli();
			
			$this->load->view('Backend/User/V_booking',$data);
		}

		function List()
		{
			$data['title'] = 'Ini adalah title List';
			$data['description'] = 'Ini adalah description List';
			$data['keywords'] = 'Ini adalah keywords List';

			$id_pasien = $this->input->post('id_pasien');
			$nama_pasien = $this->input->post('nama');
			$tgl_booking = $this->input->post('tgl_booking');
			$jam_booking = $this->input->post('jam_booking');
			$poli = $this->input->post('poli');
			$latitude = $this->input->post('latitude');
			$longtitude = $this->input->post('longitude');

			$temp = explode(" ", $tgl_booking);
			$temp2 = $temp[0];

			if($temp2 == 'Sunday'){
				$hari = 'Minggu';
			}
			else if($temp2 == 'Monday'){
				$hari = 'Senin';
			}
			else if($temp2 == 'Tuesday'){
				$hari = 'Selasa';
			}
			else if($temp2 == 'Wednesday'){
				$hari = 'Rabu';
			}
			else if($temp2 == 'Thursday'){
				$hari = 'Kamis';
			}
			else if($temp2 == 'Friday'){
				$hari = 'Jumat';
			}
			else if($temp2 == 'Saturday'){
				$hari = 'Sabtu';
			}

			$data['booking'] = array(
                "id_pasien" => $id_pasien,
                "nama_pasien" => $nama_pasien,
                "tgl_booking" => $tgl_booking,
                "jam_booking" => $jam_booking,
                "poli" => $poli,
            ); 

			$rs_terdekat = $this->M_booking->get_hasil($latitude,$longtitude);

			$data['hasil'] = [];
			$data['jadwal'] = [];

			date_default_timezone_set("Asia/Bangkok");
			$n_date = explode(" ", $tgl_booking);
			$n_day = $n_date[3];
			$n_month = $n_date[2];
			$n_year = $n_date[1];

			if($n_month == 'January'){
				$n_month = '01';
			}
			else if($n_month == 'February'){
				$n_month = '02';
			}
			else if($n_month == 'March'){
				$n_month = '03';
			}
			else if($n_month == 'April'){
				$n_month = '04';
			}
			else if($n_month == 'May'){
				$n_month = '05';
			}
			else if($n_month == 'June'){
				$n_month = '06';
			}
			else if($n_month == 'July'){
				$n_month = '07';
			}
			else if($n_month == 'August'){
				$n_month = '08';
			}
			else if($n_month == 'September'){
				$n_month = '09';
			}
			else if($n_month == 'October'){
				$n_month = '10';
			}
			else if($n_month == 'November'){
				$n_month = '11';
			}
			else if($n_month == 'December'){
				$n_month = '12';
			}

			$temp_date = $n_year."-".$n_month."-".$n_day;
			$new_date = $temp_date;
			$now_date = date("d-m-Y");
			$now_time = date("H:i");;

			$status = 1;
			if($new_date < $now_date){
				$status = 0;
			}
			if($jam_booking < $now_time){
				$status = 0;
			}

			foreach ($rs_terdekat as $rs) {
				$i = 0;
				$id_admin = $rs['id_admin'];
				$tersedia = $this->M_booking->cari_tersedia($id_admin, $poli, $hari, $jam_booking);
				if (!empty($tersedia) and $status == 1) {
					array_push($data['hasil'], $rs);
					array_push($data['jadwal'], $tersedia);
				}			
			}

			if(!empty($data['hasil'])){
				$this->load->view('Backend/User/V_tampil_hasil',$data);
			}
			else{
				$this->load->view('Backend/User/V_not_found',$data);
			}

			
		}

		function Booking_now()
		{
			$data['title'] = 'Ini adalah title Booking Now!';
			$data['description'] = 'Ini adalah description Booking Now!';
			$data['keywords'] = 'Ini adalah keywords Booking Now!';

			$id_booking = uniqid();
			$id_admin = $this->input->post('id_admin');
			$id_dokter = $this->input->post('id_dokter');
			$id_pasien = $this->input->post('id_pasien');
			$nama_pasien = $this->input->post('nama_pasien');
			$nama_dokter = $this->input->post('nama_dokter');
			$nama_admin = $this->input->post('nama_admin');
			$tgl_booking = $this->input->post('tgl_booking');
			$jam_booking = $this->input->post('jam_booking');
			$poli = $this->input->post('poli');

			$data = array(
                "id_booking" => $id_booking,
                "id_admin" => $id_admin,
                "id_dokter" => $id_dokter,
                "id_pasien" => $id_pasien,
                "nama_pasien" => $nama_pasien,
                "nama_dokter" => $nama_dokter,
                "nama_admin" => $nama_admin,
                "tgl_booking" => $tgl_booking,
                "jam_booking" => $jam_booking,
                "poli" => $poli,
            ); 

			$this->M_booking->book_now($data);		

			$data_kuota = $this->M_booking->cari_kuota($id_admin,$id_dokter,$poli);
			$id_jadwal = $data_kuota[0]['id_jadwal'];
			$temp_kuota = $data_kuota[0]['kuota_sekarang'];

			$kuota_sekarang = $temp_kuota - 1;
			$data = array(
                "kuota_sekarang" => $kuota_sekarang
            ); 

            $this->M_booking->kuota_berkurang($data,$id_jadwal);	

			redirect('List_booking');
		}
	}
?>	
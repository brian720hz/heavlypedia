<?php
	class Dokter extends CI_Controller
	{
		public function __construct() {
	        parent::__construct();

	        if($this->session->userdata('account') == null) {
				redirect('Admin/Login');
			}
	    }

		function index()
		{
			$data['title'] = 'Ini adalah title Daftar Dokter';
			$data['description'] = 'Ini adalah description  Daftar Dokter';
			$data['keywords'] = 'Ini adalah keywords Daftar Dokter';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);
			
			$data['data_dokter'] = $this->M_admin_dokter->get_data_akun($id_admin);
			$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);

			$this->load->view('Backend/Admin/V_daftar_dokter',$data);
		}

		function Tambah_dokter()
		{
			$data['title'] = 'Ini adalah title Tambah Dokter';
			$data['description'] = 'Ini adalah description Tambah Dokter';
			$data['keywords'] = 'Ini adalah keywords Tambah Dokter';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);

			$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);

			$this->load->view('Backend/Admin/V_tambah_dokter',$data);
		}

		function Tambah_data_dokter()
		{
			$nama = $this->input->post('nama');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');



			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data = array(
                "id_admin" => $id_admin,
                "nama_dokter" => $nama,
                "tgl_lahir" => $tgl_lahir,
                "jenis_kelamin" => $jenis_kelamin,
                "alamat" => $alamat,
                "no_telp" => $no_telp,
            );

            $this->M_admin_dokter->tambah_data_dokter($data); 
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil ditambah</div>');
			redirect('Admin/Dokter/Tambah_dokter');
		}

		function Edit_dokter($id_dokter)
		{
			$data['title'] = 'Ini adalah title Edit Dokter';
			$data['description'] = 'Ini adalah description Edit Dokter';
			$data['keywords'] = 'Ini adalah keywords Edit Dokter';
			
			$data['data_dokter'] = $this->M_admin_dokter->get_data_dokter($id_dokter);

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);

			$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);

			$this->load->view('Backend/Admin/V_edit_dokter',$data);
		}

		function Edit_data_dokter()
		{
			$id_dokter = $this->input->post('id_dokter');
			$nama = $this->input->post('nama');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');

			$data = array(
                "nama_dokter" => $nama,
                "tgl_lahir" => $tgl_lahir,
                "jenis_kelamin" => $jenis_kelamin,
                "alamat" => $alamat,
                "no_telp" => $no_telp,
            );

            $data1 = array(
                "nama_dokter" => $nama
            );

            $this->M_admin_dokter->edit_data_dokter($data,$id_dokter); 
            $this->M_admin_dokter->edit_all_data_dokter($data1,$id_dokter); 

            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil diubah</div>');
			redirect('Admin/Dokter/Edit_dokter/'.$id_dokter);
		}

		function Delete_dokter()
		{
            $id_dokter = $this->input->post('id_dokter');
            $this->M_admin_dokter->delete_data_dokter($id_dokter);
            $this->M_admin_dokter->delete_all_data_dokter($id_dokter);
			redirect('Admin/Dokter');
		}

		function Jadwal_dokter()
		{
			$data['title'] = 'Ini adalah title Jadwal Dokter';
			$data['description'] = 'Ini adalah description  Jadwal Dokter';
			$data['keywords'] = 'Ini adalah keywords Jadwal Dokter';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);
			
			$data['data_jadwal_dokter'] = $this->M_admin_dokter->get_data_jadwal_dokter($id_admin);
			$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);

			$this->load->view('Backend/Admin/V_jadwal_dokter',$data);
		}

		function Tambah_jadwal_dokter()
		{
			$data['title'] = 'Ini adalah title Tambah Jadwal Dokter';
			$data['description'] = 'Ini adalah description Tambah Jadwal Dokter';
			$data['keywords'] = 'Ini adalah keywords Tambah Jadwal Dokter';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);

			$data['data_dokter'] = $this->M_admin_dokter->get_data_akun($id_admin);
			$data['data_poli'] = $this->M_admin_dokter->get_data_poli();

			$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);

			$this->load->view('Backend/Admin/V_tambah_jadwal_dokter',$data);
		}

		function Tambah_data_jadwal_dokter()
		{
			$nama = $this->input->post('nama');
			$poli = $this->input->post('poli');
			$hari_praktek = $this->input->post('hari_praktek');
			$mulai_praktek = $this->input->post('mulai_praktek');
			$selesai_praktek = $this->input->post('selesai_praktek');
			$kuota = $this->input->post('kuota');
			$kuota_sekarang = $this->input->post('kuota');

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$id_dokter = $this->M_admin_dokter->cari_dokter($id_admin,$nama);

			$data = array(
                "id_dokter" => $id_dokter,
                "id_admin" => $id_admin,
                "nama_dokter" => $nama,
                "poli" => $poli,
                "hari_praktek" => $hari_praktek,
                "mulai_praktek" => $mulai_praktek,
                "selesai_praktek" => $selesai_praktek,
                "kuota" => $kuota,
                "kuota_sekarang" => $kuota,
            );

            $this->M_admin_dokter->tambah_data_jadwal_dokter($data); 
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil ditambah</div>');
			redirect('Admin/Dokter/Tambah_jadwal_dokter');
		}

		function Edit_jadwal_dokter($id_jadwal)
		{
			$data['title'] = 'Ini adalah title Edit Jadwal Dokter';
			$data['description'] = 'Ini adalah description Edit Jadwal Dokter';
			$data['keywords'] = 'Ini adalah keywords Edit Jadwal Dokter';
			
			$data['data_jadwal'] = $this->M_admin_dokter->get_data_jadwal_dokter_for_edit($id_jadwal);

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);

			$data['data_dokter'] = $this->M_admin_dokter->get_data_akun($id_admin);
			$data['data_poli'] = $this->M_admin_dokter->get_data_poli();

			$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);

			$this->load->view('Backend/Admin/V_edit_jadwal_dokter',$data);
		}

		function Edit_data_jadwal_dokter()
		{
			$id_jadwal = $this->input->post('id_jadwal');
			$nama = $this->input->post('nama');
			$poli = $this->input->post('poli');
			$hari_praktek = $this->input->post('hari_praktek');
			$mulai_praktek = $this->input->post('mulai_praktek');
			$selesai_praktek = $this->input->post('selesai_praktek');
			$kuota = $this->input->post('kuota');

			$data = array(
                "nama_dokter" => $nama,
                "poli" => $poli,
                "hari_praktek" => $hari_praktek,
                "mulai_praktek" => $mulai_praktek,
                "selesai_praktek" => $selesai_praktek,
                "kuota" => $kuota,
            );

            $this->M_admin_dokter->edit_data_jadwal_dokter($data,$id_jadwal); 
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil diubah</div>');
			redirect('Admin/Dokter/Edit_jadwal_dokter/'.$id_jadwal);
		}

		function Delete_jadwal_dokter()
		{
            $id_jadwal = $this->input->post('id_jadwal');
            $this->M_admin_dokter->delete_data_jadwal_dokter($id_jadwal);
			redirect('Admin/Dokter/Jadwal_dokter');
		}

	}
?>	
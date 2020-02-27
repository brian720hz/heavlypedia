<?php
	class Setting extends CI_Controller
	{
		public function __construct() {
	        parent::__construct();

	        if($this->session->userdata('account') == null) {
				redirect('Admin/Login');
			}
	    }

		function index()
		{
			$data['title'] = 'Ini adalah title Setting';
			$data['description'] = 'Ini adalah description Setting';
			$data['keywords'] = 'Ini adalah keywords Setting';

			$akun = $this->session->userdata('account');
			$id_admin = $akun['id_admin'];

			$data['jum_pasien'] = $this->M_admin_login->get_data_jum_pasien($id_admin);
			$data['jum_dokter'] = $this->M_admin_login->get_data_jum_dokter($id_admin);
			$data['jum_booking'] = $this->M_admin_login->get_data_jum_booking($id_admin);
			
			$data['data_akun'] = $this->M_admin_setting->get_data_akun($id_admin);

			$this->load->view('Backend/Admin/V_setting',$data);
		}

		function Edit_profil()
		{
			$id_admin = $this->input->post('id_admin');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');

			$nama_foto = 'foto_admin_id_'.$id_admin;

			$config['upload_path']          = './assets/backend/images/admin/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 3000;
            $config['file_name']            = $nama_foto;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')){
                $this->M_admin_setting->delete_foto($id_admin);
                $upload_data = $this->upload->data();
                $image = $upload_data["file_name"];

                $data = array(
	                "nama_admin" => $nama,
	                "alamat" => $alamat,
	                "no_telp" => $no_telp,
	                "gambar" => $image
	            );

	            $this->M_admin_setting->edit_data_akun($data,$id_admin); 
            }
            else{
            	$data = array(
	                "nama_admin" => $nama,
	                "alamat" => $alamat,
	                "no_telp" => $no_telp,
	            );

            	$this->M_admin_setting->edit_data_akun($data,$id_admin); 
            }

            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil diubah</div>');
            
			redirect('Admin/Setting');
		}
	}
?>	
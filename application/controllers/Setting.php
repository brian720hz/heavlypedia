<?php
	class Setting extends CI_Controller
	{
		public function __construct() {
	        parent::__construct();

	        if($this->session->userdata('account') == null) {
				redirect('Login');
			}
	    }

		function index()
		{
			$data['title'] = 'Ini adalah title Setting';
			$data['description'] = 'Ini adalah description Setting';
			$data['keywords'] = 'Ini adalah keywords Setting';

			$akun = $this->session->userdata('account');
			$id_pasien = $akun['id_pasien'];
			
			$data['data_akun'] = $this->M_setting->get_data_akun($id_pasien);

			$this->load->view('Backend/User/V_setting',$data);
		}

		function Edit_profil()
		{
			$id_pasien = $this->input->post('id_pasien');
			$nama = $this->input->post('nama');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');
			$email = $this->input->post('email');

			$nama_foto = 'foto_pasien_id_'.$id_pasien;

			$config['upload_path']          = './assets/backend/images/patients/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 1000;
            $config['file_name']            = $nama_foto;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')){
                $this->M_setting->delete_foto($id_pasien);
                $upload_data = $this->upload->data();
                $image = $upload_data["file_name"];

                $data = array(
	                "nama_pasien" => $nama,
	                "tgl_lahir" => $tgl_lahir,
	                "jenis_kelamin" => $jenis_kelamin,
	                "alamat" => $alamat,
	                "no_telp" => $no_telp,
	                "email" => $email,
	                "gambar" => $image
	            );

	            $this->M_setting->edit_data_akun($data,$id_pasien); 
            }
            else{
            	$data = array(
	                "nama_pasien" => $nama,
	                "tgl_lahir" => $tgl_lahir,
	                "jenis_kelamin" => $jenis_kelamin,
	                "alamat" => $alamat,
	                "no_telp" => $no_telp,
	                "email" => $email
	            );

            	$this->M_setting->edit_data_akun($data,$id_pasien); 
            }

			
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data berhasil diubah</div>');
			redirect('Setting');
		}
	}
?>	
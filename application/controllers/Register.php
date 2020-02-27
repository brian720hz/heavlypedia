<?php
	class Register extends CI_Controller
	{
		function __contruct(){
			parent::__construct();
		}

		function index()
		{
			$data['title'] = 'Ini adalah title Register';
			$data['description'] = 'Ini adalah description Register';
			$data['keywords'] = 'Ini adalah keywords Register';

			$data['data_username'] = $this->M_register->list_username();
			
			$this->load->view('Backend/User/V_register',$data);
		}

		function cek_username()
		{
            if($this->M_register->cek_username($_POST["username"])){  
            	echo '<label class="text-danger"><span class="glyphicon glyphicon-remove" style="color:red;"> Username Sudah Digunakan </span>  </label>';  
            }
		}

		function register_akun()
		{
			$username = $this->input->post('username');
			$password_old = $this->input->post('password');
			$password = hash ( "sha256", $password_old );
			$nama = $this->input->post('nama');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
			$no_telp = $this->input->post('no_telp');
			$email = $this->input->post('email');

			$temp = explode("/", $tgl_lahir);
			$temp_1 = $temp[2]."-".$temp[1]."-".$temp[0];
			$temp2 = strtotime('$temp_1');

			$hari = date('l', $temp2);
			$tanggal = $temp[0];
			$bulan = date('F', $temp2);
			$tahun = $temp[2];

			$tgl_lahir_fix = $hari." ".$tanggal." ".$bulan." ".$tahun;

			$data = array(
                "username" => $username,
                "password" => $password,
                "nama_pasien" => $nama,
                "tgl_lahir" => $tgl_lahir_fix,
                "jenis_kelamin" => $jenis_kelamin,
                "alamat" => $alamat,
                "no_telp" => $no_telp,
                "email" => $email
            ); 

            $this->M_register->add_account($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Akun berhasil dibuat</div>');
            redirect('Register');
			
		}
	}
?>	
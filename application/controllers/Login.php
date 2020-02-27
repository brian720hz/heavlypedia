<?php
	class Login extends CI_Controller
	{
		function __contruct(){
			parent::__construct();
		}

		function index()
		{
			$data['title'] = 'Ini adalah title Login';
			$data['description'] = 'Ini adalah description Login';
			$data['keywords'] = 'Ini adalah keywords Login';
			
			$this->load->view('Backend/User/V_login',$data);
		}

		function login_akun() {
			$username = $this->input->post('username');
			$password_old = $this->input->post('password');
			$password = hash ( "sha256", $password_old );

			$data = array(
				'username' => $username,
				'password' => $password
			);

			$result = $this->M_login->getAccount($data);

			if ($result) {
				$data_account = array(
					'username' => $result->username,
					'nama_pasien' => $result->nama_pasien,
					'id_pasien' => $result->id_pasien,
				);

				$this->session->set_userdata('account', $data_account);
				
				redirect('Home');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Login gagal !</div>');
				redirect('Login');
			}
		}

		function logout(){
			$this->session->sess_destroy();
			redirect("Login");
		}
	}
?>	
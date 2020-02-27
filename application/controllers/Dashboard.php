<?php
	class Dashboard extends CI_Controller
	{
		function __contruct(){
			parent::__construct();
		}

		function index()
		{
			$data['title'] = 'Ini adalah title Dashboard';
			$data['description'] = 'Ini adalah description Dashboard';
			$data['keywords'] = 'Ini adalah keywords Dashboard';
			
			$this->load->view('Frontend/V_dashboard',$data);
		}
	}
?>	
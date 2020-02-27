<?php
	class M_register extends CI_Model
	{
		function cek_username($username){		
			$this->db->where('username', $username);  
        	$query = $this->db->get("akun_pasien");  
       		if($query->num_rows() > 0){  
                return true;  
           	}  
           	else {  
                return false;  
           	}  
		}

		function add_account($data){
			$this->db->insert("akun_pasien", $data);
		}

		function list_username(){
			$data = $this->db->query("SELECT username FROM akun_pasien");
    		return $data->result_array();
		}
	}

?>
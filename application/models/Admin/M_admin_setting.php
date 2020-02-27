<?php
	class M_admin_setting extends CI_Model
	{
		function get_data_akun($id_admin) {
			$this->db->where('id_admin',$id_admin);
            return $this->db->get('akun_admin')->result_array();
		}

		function edit_data_akun($data,$id_admin) {
			$this->db->where("id_admin", $id_admin);
			$this->db->update("akun_admin", $data);
		}

		function delete_foto($id_admin)
		{
			$data = $this->db->query("SELECT * FROM akun_admin WHERE id_admin = '$id_admin'")->row();
		    $gambar = $data->gambar;

		    if ($gambar != "default.png") {
	        	unlink(FCPATH."assets/backend/images/admin/".$gambar);
		    }
		    
		}
	}

?>
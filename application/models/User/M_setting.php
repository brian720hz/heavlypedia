<?php
	class M_setting extends CI_Model
	{
		function get_data_akun($id_pasien) {
			$this->db->where('id_pasien',$id_pasien);
            return $this->db->get('akun_pasien')->result_array();
		}

		function edit_data_akun($data,$id_pasien) {
			$this->db->where("id_pasien", $id_pasien);
			$this->db->update("akun_pasien", $data);
		}

		function delete_foto($id_pasien)
		{
			$data = $this->db->query("SELECT * FROM akun_pasien WHERE id_pasien = '$id_pasien'")->row();
		    $gambar = $data->gambar;

		    if ($gambar != "default.png") {
	        	unlink(FCPATH."assets/backend/images/patients/".$gambar);
		    }
		    
		}
	}

?>
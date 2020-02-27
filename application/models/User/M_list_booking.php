<?php
	class M_list_booking extends CI_Model
	{
		function get_data_akun($id_pasien) {
			$this->db->where('id_pasien',$id_pasien);
            return $this->db->get('akun_pasien')->result_array();
		}
		
		function get_data_list($id_pasien) {
           	$this->db->where('id_pasien',$id_pasien);
           	$this->db->order_by("id_booking", "desc");
            return $this->db->get('booking')->result_array();
		}

	}

?>
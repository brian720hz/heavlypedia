<?php
	class M_admin_login extends CI_Model
	{
		function getAccount($data_account) {
			$query = $this->db->get_where('akun_admin', $data_account);
			if ($query->num_rows() != 0) {
				return $query->row();
			} else {
				return array();
			}
		}

		function get_data_jum_pasien($id_admin) {
			$query = $this->db->query("SELECT count(DISTINCT id_pasien) FROM booking WHERE id_admin = '$id_admin'");
            return $query->result_array();
		}

		function get_data_jum_dokter($id_admin) {
			$query = $this->db->query("SELECT count(DISTINCT id_dokter) FROM dokter WHERE id_admin = '$id_admin'");
            return $query->result_array();
		}

		function get_data_jum_booking($id_admin) {
			$query = $this->db->query("SELECT count(id_booking) FROM booking WHERE id_admin = '$id_admin'");
            return $query->result_array();
		}
	}

?>
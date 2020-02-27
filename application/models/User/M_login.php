<?php
	class M_login extends CI_Model
	{
		function getAccount($data_account) {
			$query = $this->db->get_where('akun_pasien', $data_account);
			if ($query->num_rows() != 0) {
				return $query->row();
			} else {
				return array();
			}
		}
	}

?>
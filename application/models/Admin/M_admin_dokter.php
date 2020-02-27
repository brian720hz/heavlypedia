<?php
	class M_admin_dokter extends CI_Model
	{
		function get_data_akun($id_admin) {
			$this->db->where('id_admin',$id_admin);
            return $this->db->get('dokter')->result_array();
		}

		function get_data_dokter($id_dokter) {
			$this->db->where('id_dokter',$id_dokter);
            return $this->db->get('dokter')->result_array();
		}

		function get_data_jadwal_dokter($id_admin) {
			$this->db->where('id_admin',$id_admin);
            return $this->db->get('jadwal_dokter')->result_array();
		}

		function get_data_jadwal_dokter_for_edit($id_jadwal) {
			$this->db->where('id_jadwal',$id_jadwal);
            return $this->db->get('jadwal_dokter')->result_array();
		}

		function tambah_data_dokter($data)
		{
			$this->db->insert('dokter',$data);
		}

		function tambah_data_jadwal_dokter($data)
		{
			$this->db->insert('jadwal_dokter',$data);
		}

		function edit_data_dokter($data,$id_dokter) {
			$this->db->where("id_dokter", $id_dokter);
			$this->db->update("dokter", $data);
		}

		function edit_all_data_dokter($data1,$id_dokter) {
			$this->db->where("id_dokter", $id_dokter);
			$this->db->update("jadwal_dokter", $data1);
		}

		function edit_data_jadwal_dokter($data,$id_jadwal) {
			$this->db->where("id_jadwal", $id_jadwal);
			$this->db->update("jadwal_dokter", $data);
		}

		function delete_data_dokter($id_dokter)
		{
			$this->db->where('id_dokter',$id_dokter);
			$this->db->delete('dokter');
		}

		function delete_all_data_dokter($id_dokter)
		{
			$this->db->where('id_dokter',$id_dokter);
			$this->db->delete('jadwal_dokter');
		}

		function delete_data_jadwal_dokter($id_jadwal)
		{
			$this->db->where('id_jadwal',$id_jadwal);
			$this->db->delete('jadwal_dokter');
		}

		function cari_dokter($id_admin,$nama){
            $query = $this->db->query("SELECT id_dokter FROM dokter where id_admin = '$id_admin' AND nama_dokter = '$nama'");
            return $query->result_array()[0]['id_dokter'];
        }

        function get_data_poli() {
            $query = $this->db->query("SELECT * FROM poli ORDER BY nama_poli ASC");
            return $query->result_array();
		}
	}

?>
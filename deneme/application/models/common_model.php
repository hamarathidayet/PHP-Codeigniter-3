<?php 
class Common_model extends CI_Model {
	public function get($where,$table){
		return $this->db->where($where)->get($table)->row();
	}
	public function insert($table,$data){
		return $this->db->insert($table,$data);
	}

	public function update($where,$table,$urun){
		return $this->db->where($where)->update($table,$urun);
	}

	public function delete ($where,$tabel) {
		return $this->db->where($where)->delete($tabel);
	}
}

?>
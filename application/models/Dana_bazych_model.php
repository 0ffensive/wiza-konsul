<?php

class Dana_bazych_model extends CI_Model {

	public function getData(){
		$query = $this->db->get('dane_osobowe');
		return $query->result();
	}

	public function addData($data){
		$this->db->insert('dane_osobowe', $data);
		$this->db->insert_id();
	}

}

?>

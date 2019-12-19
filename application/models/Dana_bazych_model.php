<?php

class Dana_bazych_model extends CI_Model {

	public function getData(){
				 $this->db->order_by('id','ASC');
		$query = $this->db->get('dane_osobowe');

		return $query->result();
	}

	public function addData($data){
		$this->db->insert('dane_osobowe', $data);
		$this->db->insert_id();
	}

}

?>

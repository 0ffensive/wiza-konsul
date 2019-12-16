<?php

class Dana_bazych_model extends CI_Model {

	public function users(){
		$query = $this->db->get('dane_osobowe');
		return $query->result();
	}

}


?>

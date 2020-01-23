<?php

class Kraj_model extends CI_Model {

	public function pobierz_dane(){
					 $this->db->order_by('nazwa','ASC');
		$zapytanie = $this->db->get('kraje');

		return $zapytanie->result();
	}
}
?>

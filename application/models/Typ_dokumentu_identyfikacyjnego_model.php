<?php

class Typ_dokumentu_identyfikacyjnego_model extends CI_Model {

	public function pobierz_dane(){
					 $this->db->order_by('nazwa','ASC');
		$zapytanie = $this->db->get('typy_dokumentow_identyfikacyjnych');

		return $zapytanie->result();
	}
}
?>

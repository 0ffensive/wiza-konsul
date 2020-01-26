<?php

class Decyzja_model extends CI_Model {
    public function pobierz_dane_lista($parametr){
       
        $this->db->select('decyzje.rodzaj, decyzje.data_wydania, decyzje.wydajacy, decyzje.uzasadnienie');
        $this->db->from('decyzje');
        $this->db->where($parametr);
		$this->db->order_by('decyzje.data_wydania','ASC');
		$zapytanie = $this->db->get();
		return $zapytanie->result();
	}
}
?>

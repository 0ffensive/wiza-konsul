<?php

class Wnioskodawca_model extends CI_Model {

	public function pobierz_dane(){
		$this->db->select('*');
		$this->db->from('wnioskodawcy');							
		$this->db->join('dane_osobowe', 'wnioskodawcy.dane_osobowe = dane_osobowe.id', 'left');
		$this->db->order_by('dane_osobowe.nazwisko, dane_osobowe.imie','ASC');
		$zapytanie = $this->db->get();
		
		return $zapytanie->result();
	}

	public function wyszukaj_wnioskodawcow($parametry_wyszukiwania){
		$this->db->select('*');
		$this->db->from('wnioskodawcy');							
		$this->db->join('dane_osobowe', 'wnioskodawcy.dane_osobowe = dane_osobowe.id', 'left');
		$this->db->where($parametry_wyszukiwania);
		$this->db->order_by('dane_osobowe.nazwisko, dane_osobowe.imie','ASC');
		$zapytanie = $this->db->get();
		
		return $zapytanie->result();
	}
}
?>

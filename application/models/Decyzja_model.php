<?php

class Decyzja_model extends CI_Model {
    public function pobierz_dane_lista($parametr){
        $this->db->select('decyzje.rodzaj, decyzje.data_wydania, decyzje.wydajacy, pracownicy_konsulatu.nazwisko, pracownicy_konsulatu.imie, decyzje.uzasadnienie');
        $this->db->from('decyzje');
        $this->db->join('kierownictwa', 'decyzje.wydajacy = kierownictwa.kierownik');
        $this->db->join('kierownicy', 'kierownicy.id = kierownictwa.kierownik');
        $this->db->join('pracownicy_placowki', 'kierownicy.pracownik_placowki = pracownicy_placowki.id');
        $this->db->join('pracownicy_konsulatu', 'pracownicy_konsulatu.id = pracownicy_placowki.pracownik_konsulatu');
        $this->db->where($parametr);
		$this->db->order_by('decyzje.data_wydania','ASC');
		$zapytanie = $this->db->get();
		return $zapytanie->result();
	}
}
?>

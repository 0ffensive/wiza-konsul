<?php

//sprawa + wnioskodawca + ... wszystko co składa się na dane sprawy -> przy wyszukiwaniu
//wnioskodawcy + przodkowie + adres + ... wszystko co składa się na dane wnioskodawcy

class Sprawa_model extends CI_Model {

	public function pobierz_dane_lista(){
		$this->db->select('sprawy.id_globalne, sprawy.id_lokalne, sprawy.wnioskodawca, 
						   dane_osobowe.nazwisko, dane_osobowe.imie, dane_osobowe.data_urodzenia, 
						   sprawy.data_zalozenia, sprawy.cel, sprawy.czy_rozstrzygnieta');
		$this->db->from('sprawy');							
		$this->db->join('dane_osobowe', 'dane_osobowe.id = sprawy.dane_osobowe', 'left');
		$this->db->join('zatrudnienia', 'zatrudnienia.pracownik_placowki = sprawy.pracownik_zakladajacy', 'left');
		$this->db->order_by('sprawy.id_lokalne','ASC');
		$zapytanie = $this->db->get();
		
		return $zapytanie->result();
	}

	public function wyszukaj_sprawy($parametry_wyszukiwania, $data_zalozenia){
		$this->db->select('sprawy.id_globalne, sprawy.id_lokalne, sprawy.wnioskodawca, 
						   dane_osobowe.nazwisko, dane_osobowe.imie, dane_osobowe.data_urodzenia, 
						   sprawy.data_zalozenia, sprawy.cel, sprawy.czy_rozstrzygnieta');
		$this->db->from('sprawy');							
		$this->db->join('dane_osobowe', 'dane_osobowe.id = sprawy.dane_osobowe', 'left');
		$this->db->join('zatrudnienia', 'zatrudnienia.pracownik_placowki = sprawy.pracownik_zakladajacy', 'left');
		$this->db->where($parametry_wyszukiwania);
		if ($data_zalozenia != NULL){
			$this->db->where('CAST(sprawy.data_zalozenia AS DATE) =', $data_zalozenia);
		}
		$this->db->order_by('sprawy.id_lokalne','ASC');
		$zapytanie = $this->db->get();
		
		return $zapytanie->result();
	}

	public function pobierz_dane($id){
				 $this->db->where('id', $id);
		$zapytanie = $this->db->get('adresy');

		return $zapytanie->result();
	}

	public function dodaj_dane($dane){
		$this->db->insert('adresy', $date);
		$this->db->insert_id();
	}

}

?>

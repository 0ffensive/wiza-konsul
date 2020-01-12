<?php

//sprawa + wnioskodawca + ... wszystko co składa się na dane sprawy -> przy wyszukiwaniu
//wnioskodawcy + przodkowie + adres + ... wszystko co składa się na dane wnioskodawcy

class Sprawa_model extends CI_Model {

	public function pobierz_dane_lista(){
				 $this->db->order_by('sprawy.id_lokalne','ASC');
				 $this->db->join('zatrudnienia', 'zatrudnienia.pracownik_placowki = sprawy.pracownik_zakladajacy', 'left');
				 $this->db->join('dane_osobowe', 'dane_osobowe.id = sprawy.dane_osobowe', 'left');
				 $this->db->select('sprawy.id_globalne, sprawy.id_lokalne, zatrudnienia.placowka, 
									sprawy.wnioskodawca, dane_osobowe.nazwisko, dane_osobowe.imie, 
									dane_osobowe.data_urodzenia, sprawy.data_zalozenia, sprawy.cel, 
									sprawy.czy_rozstrzygnieta');
		$query = $this->db->get('sprawy');

		return $query->result();
	}

	public function pobierz_dane($id){
				 $this->db->where('id', $id);
		$query = $this->db->get('adresy');

		return $query->result();
	}

	public function dodaj_dane($dane){
		$this->db->insert('adresy', $data);
		$this->db->insert_id();
	}

}

?>

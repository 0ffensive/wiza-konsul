<?php

class Wnioskodawca_model extends CI_Model {

	public function pobierz_dane($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->select('wnioskodawcy.id as id_wnioskodawcy, 
							wnioskodawcy.dane_osobowe, 
							wnioskodawcy.plec, 
							wnioskodawcy.narodowosc, 
							wnioskodawcy.adres_zamieszkania,
							dane_osobowe.id,
							dane_osobowe.nazwisko,
							dane_osobowe.imie,
							dane_osobowe.obywatelstwo,
							dane_osobowe.data_urodzenia,
							dane_osobowe.typ_dokumentu_identyfikacyjnego,
							dane_osobowe.nr_dokumentu_identyfikacyjnego');
		$this->db->from('wnioskodawcy');							
		$this->db->join('dane_osobowe', 'wnioskodawcy.dane_osobowe = dane_osobowe.id', 'left');
		$this->db->order_by('wnioskodawcy.id','ASC');
		$zapytanie = $this->db->get();
		if ($zapytanie->num_rows() > 0) {
			foreach ($zapytanie->result() as $wiersz) {
				$wnioskodawcy[] = $wiersz;
			}
			return $wnioskodawcy;
		}
		return false;
	}

	public function liczba_znalezionych_wnioskodawcow($parametry_wyszukiwania) {
		$this->db->select('wnioskodawcy.id as id_wnioskodawcy, 
			wnioskodawcy.dane_osobowe, 
			wnioskodawcy.plec, 
			wnioskodawcy.narodowosc, 
			wnioskodawcy.adres_zamieszkania,
			dane_osobowe.id,
			dane_osobowe.nazwisko,
			dane_osobowe.imie,
			dane_osobowe.obywatelstwo,
			dane_osobowe.data_urodzenia,
			dane_osobowe.typ_dokumentu_identyfikacyjnego,
			dane_osobowe.nr_dokumentu_identyfikacyjnego');
		$this->db->from('wnioskodawcy');							
		$this->db->join('dane_osobowe', 'wnioskodawcy.dane_osobowe = dane_osobowe.id', 'left');							
		$this->db->where($parametry_wyszukiwania);
		$zapytanie = $this->db->get();
		return $zapytanie->num_rows();
	}

	public function wyszukaj_wnioskodawcow($parametry_wyszukiwania, $limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->select('wnioskodawcy.id as id_wnioskodawcy, 
							wnioskodawcy.dane_osobowe, 
							wnioskodawcy.plec, 
							wnioskodawcy.narodowosc, 
							wnioskodawcy.adres_zamieszkania,
							dane_osobowe.id,
							dane_osobowe.nazwisko,
							dane_osobowe.imie,
							dane_osobowe.obywatelstwo,
							dane_osobowe.data_urodzenia,
							dane_osobowe.typ_dokumentu_identyfikacyjnego,
							dane_osobowe.nr_dokumentu_identyfikacyjnego');
		$this->db->from('wnioskodawcy');							
		$this->db->join('dane_osobowe', 'wnioskodawcy.dane_osobowe = dane_osobowe.id', 'left');
		$this->db->join('adresy', 'wnioskodawcy.adres_zamieszkania = adresy.id', 'left');
		$this->db->where($parametry_wyszukiwania);
		$this->db->order_by('wnioskodawcy.id','ASC');
		$zapytanie = $this->db->get();
		
		if ($zapytanie->num_rows() > 0) {
			foreach ($zapytanie->result() as $wiersz) {
				$wnioskodawcy[] = $wiersz;
			}
			return $wnioskodawcy;
		}
		return false;
	}

	public function znajdz_wnioskodawce($id_wnioskodawcy) {
		$this->db->select('wnioskodawcy.id as id_wnioskodawcy, 
							wnioskodawcy.dane_osobowe, 
							wnioskodawcy.plec, 
							wnioskodawcy.narodowosc, 
							wnioskodawcy.adres_zamieszkania,
							dane_osobowe.id,
							dane_osobowe.nazwisko,
							dane_osobowe.imie,
							dane_osobowe.obywatelstwo,
							dane_osobowe.data_urodzenia,
							dane_osobowe.typ_dokumentu_identyfikacyjnego,
							dane_osobowe.nr_dokumentu_identyfikacyjnego,
							adresy.miejscowosc,
							adresy.ulica,
							adresy.nr_domu,
							adresy.nr_lokalu,
							adresy.kod_pocztowy,
							adresy.panstwo');
		$this->db->from('wnioskodawcy');							
		$this->db->join('dane_osobowe', 'wnioskodawcy.dane_osobowe = dane_osobowe.id', 'left');
		$this->db->join('adresy', 'wnioskodawcy.adres_zamieszkania = adresy.id', 'left');
		$this->db->where($id_wnioskodawcy);
		$zapytanie = $this->db->get();
		return $zapytanie->row();
	}

	public function liczba_wnioskodawcow() {
		return $this->db->count_all('wnioskodawcy');
	}
}
?>

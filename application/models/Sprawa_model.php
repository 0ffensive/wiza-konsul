<?php

//sprawa + wnioskodawca + ... wszystko co składa się na dane sprawy -> przy wyszukiwaniu
//wnioskodawcy + przodkowie + adres + ... wszystko co składa się na dane wnioskodawcy

class Sprawa_model extends CI_Model {

	public function pobierz_stale_dane_sprawy($id_lokalne_sprawy){
		$this->db->select('S.id_lokalne, S.id_globalne, S.placowka, S.data_zalozenia, S.cel, S.czy_rozstrzygnieta');
		$this->db->from('sprawy S');
		$this->db->where('S.id_lokalne',$id_lokalne_sprawy);

		$zapytanie = $this->db->get();
		
		return $zapytanie->result()[0];
	}

	public function pobierz_dane_sprawy($id_lokalne_sprawy){
		$this->db->select('S.id_lokalne, S.id_globalne, S.placowka, S.data_zalozenia, S.cel, S.czy_rozstrzygnieta,
							D.nazwisko, D.imie, S.plec, D.data_urodzenia, D.obywatelstwo, S.narodowosc, D.typ_dokumentu_identyfikacyjnego, D.nr_dokumentu_identyfikacyjnego,
							A.panstwo, A.miejscowosc, A.kod_pocztowy, A.ulica, A.nr_domu, A.nr_lokalu,
							D1.nazwisko as "nazwisko1", D1.imie as "imie1", D1.data_urodzenia as "data_urodzenia1", P1.pokrewienstwo as "pokrewienstwo1", D1.obywatelstwo as "obywatelstwo1", 
							D1.typ_dokumentu_identyfikacyjnego as "typ_dokumentu_identyfikacyjnego1", D1.nr_dokumentu_identyfikacyjnego as "nr_dokumentu_identyfikacyjnego1",
							D2.nazwisko as "nazwisko2", D2.imie as "imie2", D2.data_urodzenia as "data_urodzenia2", P2.pokrewienstwo as "pokrewienstwo2", D2.obywatelstwo as "obywatelstwo2", 
							D2.typ_dokumentu_identyfikacyjnego as "typ_dokumentu_identyfikacyjnego2", D2.nr_dokumentu_identyfikacyjnego as "nr_dokumentu_identyfikacyjnego2"');
		$this->db->from('sprawy S');							
		$this->db->join('dane_osobowe D', 'D.id = S.dane_osobowe', 'left');
		$this->db->join('adresy A', 'A.id = S.adres_zamieszkania', 'left');

		$this->db->join('przodkowie P1', 'P1.id = S.przodek_pierwszy', 'left');
		$this->db->join('dane_osobowe D1', 'D1.id = P1.dane_osobowe', 'left');
		
		$this->db->join('przodkowie P2', 'P2.id = S.przodek_drugi', 'left');
		$this->db->join('dane_osobowe D2', 'D2.id = P2.dane_osobowe', 'left');
		
		$this->db->where('S.id_lokalne',$id_lokalne_sprawy);

		$zapytanie = $this->db->get();
		
		return $zapytanie->result()[0];
	}

	public function pobierz_dane(){
		$this->db->select('sprawy.id_globalne, 
							sprawy.id_lokalne, 
							sprawy.wnioskodawca, 
							dane_osobowe.nazwisko, 
							dane_osobowe.imie, dane_osobowe.data_urodzenia, 
							sprawy.data_zalozenia, 
							sprawy.cel, 
							sprawy.czy_rozstrzygnieta');
		$this->db->from('sprawy');							
		$this->db->join('dane_osobowe', 'dane_osobowe.id = sprawy.dane_osobowe', 'left');
		$this->db->order_by('sprawy.id_lokalne','ASC');
		$zapytanie = $this->db->get();
		
		return $zapytanie->result();
	}

	public function liczba_spraw() {
		return $this->db->count_all('sprawy');
	}

	public function pobierz_dane_paginacja($limit, $start){
		$this->db->limit($limit, $start);

		$this->db->select('sprawy.id_globalne, 
							sprawy.id_lokalne,
							sprawy.wnioskodawca, 
							dane_osobowe.nazwisko,
							dane_osobowe.imie,
							dane_osobowe.data_urodzenia, 
							sprawy.data_zalozenia,
							sprawy.cel, 
							sprawy.czy_rozstrzygnieta,
							case when count(decyzje.id) = 0 then "Brak decyzji"
								when sprawy.czy_rozstrzygnieta = 0 then "Do uzupełnienia"
								when (select d.rodzaj from decyzje d where d.sprawa = sprawy.id_lokalne and d.rodzaj != "Do uzupełnienia") = "Pozytywny" then "Pozytywna decyzja"
								else "Negatywna decyzja" 
								end as decyzje');
		$this->db->from('sprawy');							
		$this->db->join('dane_osobowe', 'dane_osobowe.id = sprawy.dane_osobowe', 'left');
		$this->db->join('decyzje', 'decyzje.sprawa = sprawy.id_lokalne', 'left');
		$this->db->group_by('sprawy.id_globalne, 
							sprawy.id_lokalne,
							sprawy.wnioskodawca, 
							dane_osobowe.nazwisko,
							dane_osobowe.imie,
							dane_osobowe.data_urodzenia, 
							sprawy.data_zalozenia,
							sprawy.cel, 
		    				sprawy.czy_rozstrzygnieta');
		$this->db->order_by('sprawy.id_lokalne','ASC');
		$zapytanie = $this->db->get();
		
		if ($zapytanie->num_rows() > 0) {
			foreach ($zapytanie->result() as $wiersz) {
				$sprawy[] = $wiersz;
			}
			return $sprawy;
		}
		return false;
	}




	public function pobierz_dane_lista(){
		$this->db->select('sprawy.id_globalne, 
							sprawy.id_lokalne,
							sprawy.wnioskodawca, 
							dane_osobowe.nazwisko,
							dane_osobowe.imie,
							dane_osobowe.data_urodzenia, 
							sprawy.data_zalozenia,
							sprawy.cel, 
							sprawy.czy_rozstrzygnieta,
							case when count(decyzje.id) = 0 then "Brak decyzji"
								when sprawy.czy_rozstrzygnieta = 0 then "Do uzupełnienia"
								when (select d.rodzaj from decyzje d where d.sprawa = sprawy.id_lokalne and d.rodzaj != "Do uzupełnienia") = "Pozytywny" then "Pozytywna decyzja"
								else "Negatywna decyzja" 
								end as decyzje');
		$this->db->from('sprawy');							
		$this->db->join('dane_osobowe', 'dane_osobowe.id = sprawy.dane_osobowe', 'left');
		$this->db->join('decyzje', 'decyzje.sprawa = sprawy.id_lokalne', 'left');
		$this->db->group_by('sprawy.id_globalne, 
							sprawy.id_lokalne,
							sprawy.wnioskodawca, 
							dane_osobowe.nazwisko,
							dane_osobowe.imie,
							dane_osobowe.data_urodzenia, 
							sprawy.data_zalozenia,
							sprawy.cel, 
		    				sprawy.czy_rozstrzygnieta');
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

	private function znajdz_sprawe($id_lokalne_sprawy){
		$this->db->select('*');
		$this->db->from('sprawy');
		$this->db->where('id_lokalne', $id_lokalne_sprawy);
		$zapytanie = $this->db->get();
		
		return $zapytanie->result()[0];
	}

	private function znajdz_placowke($id_pracownika_placowki){
		$this->db->select('placowka');
		$this->db->from('zatrudnienia');
		$this->db->where('pracownik_placowki', $id_pracownika_placowki);
		$zapytanie = $this->db->get();

		return $zapytanie->result()[0]->placowka;
	}

	private function znajdz_wnioskodawce($id_wnioskodawcy){
		$this->db->select('*');
		$this->db->from('wnioskodawcy');
		$this->db->where('id',$id_wnioskodawcy);
		$zapytanie = $this->db->get();
		
		return $zapytanie->result()[0];
	}



	public function dodaj_sprawe($input_dane_sprawy,$input_dane_wnioskodawcy,$input_dane_adresu_zamieszkania,$input_dane_przodka_pierwszego,$input_dane_przodka_drugiego){

		$dane_sprawy = array(
			"placowka" => $this->znajdz_placowke($_SESSION["id_pracownika_placowki"]),
			"pracownik_zakladajacy" => $_SESSION["id_pracownika_placowki"],
			"cel" => $input_dane_sprawy["cel"],
			"plec" => $input_dane_wnioskodawcy["plec"],
			"przodek_pierwszy" => NULL,
			"przodek_drugi" => NULL,
			"rodzaj_dokumentu" => $_SESSION["rodzaj_dokumentu"],
			"wnioskodawca" => NULL,
			"dane_osobowe" => NULL,
			"narodowosc" => $input_dane_wnioskodawcy["narodowosc"],
			"adres_zamieszkania" => NULL
		);

		$dane_dane_osobowe_przodka_pierwszego = $input_dane_przodka_pierwszego;
		$dane_dane_osobowe_przodka_drugiego = $input_dane_przodka_drugiego;
		$dane_dane_osobowe_sprawy = $input_dane_wnioskodawcy;

		//dodawanie przodka pierwszego
		if ($input_dane_przodka_pierwszego != NULL){
			unset($dane_dane_osobowe_przodka_pierwszego["pokrewienstwo"]);
			$this->db->insert('dane_osobowe', $dane_dane_osobowe_przodka_pierwszego);

			$dane_przodka_pierwszego = array(
				"dane_osobowe" => $this->db->insert_id(),
				"pokrewienstwo" => $input_dane_przodka_pierwszego["pokrewienstwo"]
			);

			$this->db->insert('przodkowie', $dane_przodka_pierwszego);
			$dane_sprawy["przodek_pierwszy"] = $this->db->insert_id();
		}

		//dodawanie przodka drugiego
		if ($input_dane_przodka_drugiego != NULL){
			unset($dane_dane_osobowe_przodka_drugiego["pokrewienstwo"]);
			$this->db->insert('dane_osobowe', $dane_dane_osobowe_przodka_drugiego);

			$dane_przodka_drugiego = array(
				"dane_osobowe" => $this->db->insert_id(),
				"pokrewienstwo" => $input_dane_przodka_drugiego["pokrewienstwo"]
			);

			$this->db->insert('przodkowie', $dane_przodka_drugiego);
			$dane_sprawy["przodek_drugi"] = $this->db->insert_id();
		}
		
		//dodawanie danych osobowych sprawy
		unset($dane_dane_osobowe_sprawy["plec"]);
		unset($dane_dane_osobowe_sprawy["narodowosc"]);

		$this->db->insert('dane_osobowe', $dane_dane_osobowe_sprawy);
		$dane_sprawy["dane_osobowe"] = $this->db->insert_id();

		//dodawanie adresu sprawy
		$this->db->insert('adresy', $input_dane_adresu_zamieszkania);
		$dane_sprawy["adres_zamieszkania"] = $this->db->insert_id();

		//dodawanie/updatowanie wnioskodawcy
		if ($_SESSION["id_wnioskodawcy"] == NULL) {	
			
			$dane_wnioskodawcy = array(
				"dane_osobowe" => NULL,
				"plec" => $input_dane_wnioskodawcy["plec"],
				"adres_zamieszkania" => NULL,
				"narodowosc" => $input_dane_wnioskodawcy["narodowosc"]
			);

			$dane_osobowe_wnioskodawcy = $input_dane_wnioskodawcy;
			unset($dane_osobowe_wnioskodawcy["plec"]);
			unset($dane_osobowe_wnioskodawcy["narodowosc"]);

			$this->db->insert('dane_osobowe', $dane_osobowe_wnioskodawcy);
			$dane_wnioskodawcy["dane_osobowe"] = $this->db->insert_id();

			$this->db->insert('adresy', $input_dane_adresu_zamieszkania);
			$dane_wnioskodawcy["adres_zamieszkania"] = $this->db->insert_id();

			$this->db->insert('wnioskodawcy', $dane_wnioskodawcy);
			$dane_sprawy["wnioskodawca"] = $this->db->insert_id();

		} else {
			$wnioskodawca = $this->znajdz_wnioskodawce($_SESSION["id_wnioskodawcy"]);
			
			$dane_osobowe_wnioskodawcy = $input_dane_wnioskodawcy;
			unset($dane_osobowe_wnioskodawcy["plec"]);
			unset($dane_osobowe_wnioskodawcy["narodowosc"]);

			$this->db->where('id', $wnioskodawca->dane_osobowe);
			$this->db->update('dane_osobowe', $dane_osobowe_wnioskodawcy);

			$this->db->where('id', $wnioskodawca->adres_zamieszkania);
			$this->db->update('adresy', $input_dane_adresu_zamieszkania);

			$dane_wnioskodawcy = array(
				"plec" => $input_dane_wnioskodawcy["plec"],
				"narodowosc" => $input_dane_wnioskodawcy["narodowosc"]
			);

			$this->db->where('id', $wnioskodawca->id);
			$this->db->update('wnioskodawcy', $dane_wnioskodawcy);
			$dane_sprawy["wnioskodawca"] = $_SESSION["id_wnioskodawcy"];
		}
		$this->db->insert('sprawy', $dane_sprawy);
	}



	public function edytuj_sprawe($input_dane_wnioskodawcy,$input_dane_adresu_zamieszkania,$input_dane_przodka_pierwszego,$input_dane_przodka_drugiego){
		$dane_sprawy = array(
			"plec" => $input_dane_wnioskodawcy["plec"],
			"narodowosc" => $input_dane_wnioskodawcy["narodowosc"]
		);

		$sprawa = $this->znajdz_sprawe($_SESSION[id_lokalne]);

		$sprawa->przodek_pierwszy;
		$sprawa->przodek_drugi;


		//updatowanie wnioskodawcy
		$wnioskodawca = $this->znajdz_wnioskodawce($sprawa->wnioskodawca);
			
		$dane_osobowe_wnioskodawcy = $input_dane_wnioskodawcy;
		unset($dane_osobowe_wnioskodawcy["plec"]);
		unset($dane_osobowe_wnioskodawcy["narodowosc"]);

		$this->db->where('id', $wnioskodawca->dane_osobowe);
		$this->db->update('dane_osobowe', $dane_osobowe_wnioskodawcy);

		$this->db->where('id', $wnioskodawca->adres_zamieszkania);
		$this->db->update('adresy', $input_dane_adresu_zamieszkania);

		$dane_wnioskodawcy = array(
			"plec" => $input_dane_wnioskodawcy["plec"],
			"narodowosc" => $input_dane_wnioskodawcy["narodowosc"]
		);

		$this->db->where('id', $wnioskodawca->id);
		$this->db->update('wnioskodawcy', $dane_wnioskodawcy);
		$dane_sprawy["wnioskodawca"] = $_SESSION["id_wnioskodawcy"];	

		//
		$sprawa->dane_osobowe;
		$sprawa->adres_zamieszkania;

	}

	public function sprawdz_czy_rozstrzygnieta($id_lokalne) {
		$this->db->select('czy_rozstrzygnieta');
		$this->db->from('sprawy');
		$this->db->where($id_lokalne);
		$zapytanie = $this->db->get();
		
		return $zapytanie->row();
	}

}

?>

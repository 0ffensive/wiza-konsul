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
		$this->db->order_by('decyzje.data_wydania','DSC');
		$decyzje = $this->db->get();
		return $decyzje->result();
    }
    
    private function znajdz_kierownika($id_pracownika_placowki) {
        $this->db->select('kierownictwa.kierownik');
        $this->db->from('kierownictwa');
        $this->db->join('kierownicy', 'kierownicy.id = kierownictwa.kierownik');
        $this->db->where('kierownicy.pracownik_placowki', $id_pracownika_placowki);
        $kierownik = $this->db->get();
        return $kierownik->row();
    }

    private function znajdz_placowke($id_pracownika_placowki) {
        $this->db->select('kierownictwa.placowka');
        $this->db->from('kierownictwa');
        $this->db->join('kierownicy', 'kierownicy.id = kierownictwa.kierownik');
        $this->db->where('kierownicy.pracownik_placowki', $id_pracownika_placowki);
        $placowka = $this->db->get();
        return $placowka->row();
    }

    private function rozstrzygnij_sprawe($id_lokalne) {
        $this->db->select('czy_rozstrzygnieta');
        $this->db->from('sprawy');
        $this->db->where('id_lokalne', $id_lokalne);
        $czy_rozstrzygnieta = $this->db->get()->row()->czy_rozstrzygnieta;
        if($czy_rozstrzygnieta == 1) {
            return false;
        } else {
            $this->db->where('id_lokalne', $id_lokalne);
            $this->db->update('sprawy', array('czy_rozstrzygnieta' => 1));
        }
    }

    public function dodaj_decyzje($parametry) {        
        $kierownik = $this->znajdz_kierownika($_SESSION["id_pracownika_placowki"])->kierownik;
        $placowka = $this->znajdz_placowke($_SESSION["id_pracownika_placowki"])->placowka;
        $id_lokalne = $_SESSION["id_lokalne"];
        $parametry += array("wydajacy" => $kierownik);
        $parametry += array("placowka" => $placowka);
        $parametry += array("sprawa" => $id_lokalne);
        $this->db->insert('decyzje', $parametry);
        if($parametry["rodzaj"] != "Do uzupełnienia") {
            $this->rozstrzygnij_sprawe($id_lokalne);
        }
    }
}
?>

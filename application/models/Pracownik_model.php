<?php

class Pracownik_model extends CI_Model {

	public function sprawdz_czy_kierownictwo($id_pracownika_placowki){
                $this->db->select('kierownictwa.kierownik');
                $this->db->from('kierownictwa');
                $this->db->join('kierownicy', 'kierownicy.id = kierownictwa.kierownik');
                $this->db->join('pracownicy_placowki', 'kierownicy.id = pracownicy_placowki.id');
                $this->db->where('pracownicy_placowki.id', $id_pracownika_placowki);
                $kierownictwo = $this->db->get();
                return ($kierownictwo->num_rows() > 0);
	}
}
?>

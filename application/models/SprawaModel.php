//sprawa + wnioskodawca + ... wszystko co składa się na dane sprawy -> przy wyszukiwaniu
//wnioskodawcy + przodkowie + adres + ... wszystko co składa się na dane wnioskodawcy

<?php

class SprawaModel extends CI_Model {

	public function pobierz_dane(){
				 $this->db->order_by('id','ASC');
		$query = $this->db->get('adresy');

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

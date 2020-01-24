<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zarzadzanie_sprawami extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Sprawa_model', 'sprawa_m');
		$this->load->model('Wnioskodawca_model', 'wnioskodawca_m');
		$this->load->model('Kraj_model', 'kraj_m');
		$this->load->model('Typ_dokumentu_identyfikacyjnego_model', 'typ_dok_m');

		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}

	public function index(){

	}

	function wyszukaj_sprawy(){
		$parametry = array("id_lokalne", "id_globalne", "wnioskodawca", "nazwisko", "imie", "data_urodzenia", "data_zalozenia", "cel", "czy_rozstrzygnieta");
		$parametry_wyszukiwania = array();
		$data_zalozenia = NULL;

		foreach ($parametry as $param){
			if($this->input->post($param) != NULL){
				if ($param == "data_zalozenia"){
					$data_zalozenia = $this->input->post($param);
				} else{
					$parametry_wyszukiwania += array($param => ($this->input->post($param)));
				}
			}
		}
		
		$wyniki['dane'] = $this->sprawa_m->wyszukaj_sprawy($parametry_wyszukiwania, $data_zalozenia);
		$this->load->view('zarzadzanie_sprawami/zarzadzanie_sprawami_view', $wyniki);
	}

	function dodawanie_sprawy(){
		if ($this->input->post('reset') == "Anuluj"){
			$this->load->view('zarzadzanie_decyzjami_view');
		} else if ($this->input->post('submit') == "Dodaj") {
			echo "Dodaj";

			// substr($string, 0, -1);  --dla przodków
		}
	}


	function wyszukaj_wnioskodawcow(){
		$parametry = array('id', "nazwisko", "imie", "data_urodzenia");
		$parametry_wyszukiwania = array();

		foreach ($parametry as $param){
			if($this->input->post($param) != NULL){
				if ($param == "id"){
					$parametry_wyszukiwania += array("wnioskodawcy.id" => ($this->input->post($param)));
				} else {
					$parametry_wyszukiwania += array($param => ($this->input->post($param)));
				}
			}
		}
		
		$dane['wnioskodawcy'] = $this->wnioskodawca_m->wyszukaj_wnioskodawcow($parametry_wyszukiwania);
		$this->load->view('zarzadzanie_sprawami/wyszukiwanie_wnioskodawcow_view', $dane);
	}

	function wybierz_wnioskodawce(){
		$parametry_wyszukiwania = array("wnioskodawcy.id" => ($this->input->post("id")));

		$dane['wnioskodawca'] = $this->wnioskodawca_m->wyszukaj_wnioskodawcow($parametry_wyszukiwania)[0];
		$dane['kraje'] = $this->kraj_m->pobierz_dane();
		$dane['typy'] = $this->typ_dok_m->pobierz_dane();
		$this->load->view('zarzadzanie_sprawami/dodawanie_sprawy_view', $dane);
	}
}

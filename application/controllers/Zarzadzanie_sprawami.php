<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zarzadzanie_sprawami extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('Sprawa_model', 'sprawa_m');
		$this->load->model('Wnioskodawca_model', 'wnioskodawca_m');
		$this->load->model('Kraj_model', 'kraj_m');
		$this->load->model('Typ_dokumentu_identyfikacyjnego_model', 'typ_dok_m');
		$this->load->model('Decyzja_model', 'decyzja_m');
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
		session_start();
		if ($this->input->post('reset') == "Anuluj"){

			$dane['dane'] = $this->sprawa_m->pobierz_dane_lista();
			$this->load->view('zarzadzanie_sprawami/zarzadzanie_sprawami_view',$dane);

		} else if ($this->input->post('submit') == "Dodaj") {
			
			//validation rules
			$this->form_validation->set_rules("cel","Cel sprawy","required");
			$this->form_validation->set_rules("nazwisko","Nazwisko","required");
			$this->form_validation->set_rules("imie","Imię","required");
			$this->form_validation->set_rules("plec","Płeć","required");
			$this->form_validation->set_rules("data_urodzenia","Data urodzenia","required");
			$this->form_validation->set_rules("obywatelstwo","Obywatelstwo","required");
			$this->form_validation->set_rules("narodowosc","Narodowość","required");
			$this->form_validation->set_rules("typ_dokumentu_identyfikacyjnego","Typ dokumentu identyfikacyjnego","required");
			$this->form_validation->set_rules("nr_dokumentu_identyfikacyjnego","Nr dokumentu identyfikacyjnego","required");
			$this->form_validation->set_rules("nr_domu","Nr domu","required");
			$this->form_validation->set_rules("kod_pocztowy","Kod pocztowy","required");
			$this->form_validation->set_rules("miejscowosc","Miejscowość","required");
			$this->form_validation->set_rules("panstwo","Państwo","required");

			if ($this->input->post("przodek_pierwszy")){
				$this->form_validation->set_rules("nazwisko1","Nazwisko","required");
				$this->form_validation->set_rules("imie1","Imię","required");
				$this->form_validation->set_rules("data_urodzenia1","Data urodzenia","required");
				$this->form_validation->set_rules("pokrewienstwo1","Pokrewieństwo","required");
				$this->form_validation->set_rules("obywatelstwo1","Obywatelstwo","required");
				$this->form_validation->set_rules("typ_dokumentu_identyfikacyjnego1","Typ dokumentu identyfikacyjnego","required");
				$this->form_validation->set_rules("nr_dokumentu_identyfikacyjnego1","Nr dokumentu identyfikacyjnego","required");
			}

			if ($this->input->post("przodek_drugi")){
				$this->form_validation->set_rules("nazwisko2","Nazwisko","required");
				$this->form_validation->set_rules("imie2","Imię","required");
				$this->form_validation->set_rules("data_urodzenia2","Data urodzenia","required");
				$this->form_validation->set_rules("pokrewienstwo2","Pokrewieństwo","required");
				$this->form_validation->set_rules("obywatelstwo2","Obywatelstwo","required");
				$this->form_validation->set_rules("typ_dokumentu_identyfikacyjnego2","Typ dokumentu identyfikacyjnego","required");
				$this->form_validation->set_rules("nr_dokumentu_identyfikacyjnego2","Nr dokumentu identyfikacyjnego","required");
			}

			if($this->form_validation->run() == FALSE){

				$dane['wnioskodawca'] = NULL;
				$dane['kraje'] = $this->kraj_m->pobierz_dane();
				$dane['typy'] = $this->typ_dok_m->pobierz_dane();
				$this->load->view('zarzadzanie_sprawami/dodawanie_sprawy_view', $dane);

			} else {

				//dodanie sprawy
				// substr($string, 0, -1);  --dla przodków
				
				
				$dane['dane'] = $this->sprawa_m->pobierz_dane_lista();
				$_SESSION["id"] = NULL;
				$this->load->view('zarzadzanie_sprawami/zarzadzanie_sprawami_view',$dane);
			}
		}
		$_SESSION["id"] = NULL;
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
		session_start();
		$_SESSION["id"] = $this->input->post("id");

		$parametry_wyszukiwania = array("wnioskodawcy.id" => ($this->input->post("id")));

		$dane['wnioskodawca'] = $this->wnioskodawca_m->wyszukaj_wnioskodawcow($parametry_wyszukiwania)[0];
		$dane['kraje'] = $this->kraj_m->pobierz_dane();
		$dane['typy'] = $this->typ_dok_m->pobierz_dane();
		$this->load->view('zarzadzanie_sprawami/dodawanie_sprawy_view', $dane);
	}

	function decyzje_sprawy(){
		$parametr = array("decyzje.sprawa" => ($this->input->post("id_lokalne")));
		$dane['decyzje'] = $this->decyzja_m->pobierz_dane_lista($parametr);
		$this->load->view('zarzadzanie_decyzjami/zarzadzanie_decyzjami_view', $dane);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linki extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Dana_bazych_model', 'baza');
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}

	public function index(){}


	public function do_strona_glowna_wybor(){
		$this->load->view('strona_glowna_wybor_view');
	}

	public function do_strona_glowna_placowka(){
		session_start();
		if ($this->input->post('pracownik') == "Pracownik"){
			$_SESSION["id_pracownika_placowki"] = 1;

		} else if ($this->input->post('pracownik') == "Kierownik") {
			$_SESSION["id_pracownika_placowki"] = 2;
		}

		$this->load->view('strona_glowna_placowka_view');
	}
	


	// Zarzadzanie sprawami

	function do_zarzadzanie_sprawami(){
		$this->load->model('Sprawa_model', 'sprawa_m');

		$dane['dane'] = $this->sprawa_m->pobierz_dane_lista();
		$this->load->view('zarzadzanie_sprawami/zarzadzanie_sprawami_view', $dane);
	}

	function do_dodawanie_sprawy_wybor(){
		$this->load->view('zarzadzanie_sprawami/dodawanie_sprawy_wybor_view');
	}

	function do_dodawanie_sprawy(){
		$this->load->model('Kraj_model', 'kraj_m');
		$this->load->model('Typ_dokumentu_identyfikacyjnego_model', 'typ_dok_m');

		$dane['wnioskodawca'] = NULL;
		$dane['kraje'] = $this->kraj_m->pobierz_dane();
		$dane['typy'] = $this->typ_dok_m->pobierz_dane();
		$this->load->view('zarzadzanie_sprawami/dodawanie_sprawy_view', $dane);
	}

	function do_wyszukiwanie_wnioskodawcy(){
		$this->load->model('Wnioskodawca_model', 'wnioskodawca_m');

		$dane['wnioskodawcy'] = $this->wnioskodawca_m->pobierz_dane();
		$this->load->view('zarzadzanie_sprawami/wyszukiwanie_wnioskodawcow_view', $dane);
	}

	function do_przegladanie_sprawy(){
		$this->load->view('zarzadzanie_sprawami/przegladanie_sprawy_view');
	}

	function do_edycja_sprawy(){
		$this->load->view('zarzadzanie_sprawami/edytowanie_sprawy_view');
	}

	function usun_sprawe(){

	}


	// Zarzadzanie dokumentami

	function do_zarzadzanie_dokumentami(){
		$this->load->view('zarzadzanie_dokumentami/zarzadzanie_dokumentami_view');
	}

	function do_dodawanie_dokumentu(){
		$this->load->view('zarzadzanie_dokumentami/dodawanie_dokumentu_view');
	}

	function do_zalaczanie_z_istniejacych(){
		$this->load->view('zarzadzanie_dokumentami/zalaczanie_z_istniejacych_view');
	}


	// Zarzadzanie decyzjami

	function do_zarzadzanie_decyzjami(){
		$this->load->model('Decyzja_model', 'decyzja_m');

		$parametr = array("decyzje.sprawa" => ($this->input->post("id_lokalne")));
		$dane['decyzje'] = $this->decyzja_m->pobierz_dane_lista($parametr);
		$this->load->view('zarzadzanie_decyzjami/zarzadzanie_decyzjami_view', $dane);
	}
	
	function do_dodawanie_decyzji(){
		$this->load->view('zarzadzanie_decyzjami/dodawanie_decyzji_view');
	}

}

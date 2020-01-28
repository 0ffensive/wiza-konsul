<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linki extends CI_Controller {

	function __construct() {
		parent::__construct();		
		$this->load->model('Sprawa_model', 'sprawa_m');
		$this->load->model('Kraj_model', 'kraj_m');
		$this->load->model('Typ_dokumentu_identyfikacyjnego_model', 'typ_dok_m');
		$this->load->model('Wnioskodawca_model', 'wnioskodawca_m');
		$this->load->model('Decyzja_model', 'decyzja_m');

		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}

	public function index(){}


	// Główne
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
		
		$_SESSION["rodzaj_dokumentu"] = "Karta Polaka";

		$this->load->view('strona_glowna_placowka_view');
	}
	


	// Zarzadzanie sprawami
	function do_zarzadzanie_sprawami(){
		$dane['dane'] = $this->sprawa_m->pobierz_dane_lista();
		$this->load->view('zarzadzanie_sprawami/zarzadzanie_sprawami_view', $dane);
	}

	function do_dodawanie_sprawy_wybor(){
		$this->load->view('zarzadzanie_sprawami/dodawanie_sprawy_wybor_view');
	}

	function do_dodawanie_sprawy(){
		session_start();
		$_SESSION["id_wnioskodawcy"] = NULL;

		$dane['wnioskodawca'] = NULL;
		$dane['kraje'] = $this->kraj_m->pobierz_dane();
		$dane['typy'] = $this->typ_dok_m->pobierz_dane();
		$this->load->view('zarzadzanie_sprawami/dodawanie_sprawy_view', $dane);
	}

	function do_wyszukiwanie_wnioskodawcy(){
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
		session_start();
		($_SESSION["id_lokalne"] == NULL) ? $_SESSION["id_lokalne"] = $this->input->post("id_lokalne") : "";
		$parametr_decyzji = array("decyzje.sprawa" => $_SESSION["id_lokalne"]);
		$parametr_sprawy = array( "sprawy.id_lokalne" => $_SESSION["id_lokalne"]);
		$dane['decyzje'] = $this->decyzja_m->pobierz_dane_lista($parametr_decyzji);
		$dane['czy_rozstrzygnieta'] = $this->sprawa_m->sprawdz_czy_rozstrzygnieta($parametr_sprawy);
		$this->load->view('zarzadzanie_decyzjami/zarzadzanie_decyzjami_view', $dane);
	}
	
	function do_dodawanie_decyzji(){
		$this->load->model('Sprawa_model', 'sprawa_m');
		session_start();
		$parametr_sprawy = array("sprawy.id_lokalne" => $_SESSION["id_lokalne"]);


		$this->load->view('zarzadzanie_decyzjami/dodawanie_decyzji_view');
	}

}

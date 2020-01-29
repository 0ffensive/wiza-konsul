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
		$this->load->model('Pracownik_model', 'pracownik_m');

		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
		$this->load->library("pagination");

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
		$config = array();
        $config["base_url"] = base_url().'index.php/linki/do_zarzadzanie_sprawami';
        $config["total_rows"] = $this->sprawa_m->liczba_spraw();
        $config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$strona = $this->uri->segment(3);
        $dane["sprawy"] = $this->sprawa_m->pobierz_dane_paginacja($config["per_page"], $strona);
		$dane["paginacja"] = $this->pagination->create_links();
		
		session_start();
		$_SESSION["id_lokalne"] = NULL;
		$id_pracownika_placowki = $_SESSION["id_pracownika_placowki"];
		$dane['czy_kierownik'] = $this->pracownik_m->sprawdz_czy_kierownictwo($id_pracownika_placowki);
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
		$config = array();
		$config["base_url"] = base_url().'index.php/linki/do_wyszukiwanie_wnioskodawcy';
		$config["total_rows"] = $this->wnioskodawca_m->liczba_wnioskodawcow();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$strona = $this->uri->segment(3);
		$dane["wnioskodawcy"] = $this->wnioskodawca_m->pobierz_dane($config["per_page"], $strona);
		$dane["paginacja"] = $this->pagination->create_links();
		$this->load->view('zarzadzanie_sprawami/wyszukiwanie_wnioskodawcow_view', $dane);
	}

	function do_przegladanie_sprawy(){
		$id_lokalne_sprawy = $this->input->post('id_lokalne');

		$dane['sprawa'] = $this->sprawa_m->pobierz_dane_sprawy($id_lokalne_sprawy);
		$this->load->view('zarzadzanie_sprawami/przegladanie_sprawy_view', $dane);
	}

	function do_edycja_sprawy(){
		session_start();
		$_SESSION["id_lokalne"] = $this->input->post("id_lokalne");

		$dane['sprawa_stale'] = $this->sprawa_m->pobierz_stale_dane_sprawy($_SESSION["id_lokalne"]);
		$dane['sprawa'] = $this->sprawa_m->pobierz_dane_sprawy($_SESSION["id_lokalne"]);
		$dane['kraje'] = $this->kraj_m->pobierz_dane();
		$dane['typy'] = $this->typ_dok_m->pobierz_dane();
		$this->load->view('zarzadzanie_sprawami/edytowanie_sprawy_view', $dane);
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
		($_SESSION["id_lokalne"] == NULL) ? ($_SESSION["id_lokalne"] = $this->input->post('id_lokalne')) : "";
		$parametr_decyzji = array("decyzje.sprawa" => $_SESSION["id_lokalne"]);
		$parametr_sprawy = array( "sprawy.id_lokalne" => $_SESSION["id_lokalne"]);
		$dane['decyzje'] = $this->decyzja_m->pobierz_dane_lista($parametr_decyzji);
		$dane['czy_rozstrzygnieta'] = $this->sprawa_m->sprawdz_czy_rozstrzygnieta($parametr_sprawy);
		$this->load->view('zarzadzanie_decyzjami/zarzadzanie_decyzjami_view', $dane);
	}
	
	function do_dodawanie_decyzji(){
		session_start();
		$parametr_sprawy = array("sprawy.id_lokalne" => $_SESSION["id_lokalne"]);
		$this->load->view('zarzadzanie_decyzjami/dodawanie_decyzji_view');
	}

}

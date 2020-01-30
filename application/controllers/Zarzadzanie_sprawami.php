<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zarzadzanie_sprawami extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('Sprawa_model', 'sprawa_m');
		$this->load->model('Wnioskodawca_model', 'wnioskodawca_m');
		$this->load->model('Kraj_model', 'kraj_m');
		$this->load->model('Typ_dokumentu_identyfikacyjnego_model', 'typ_dok_m');
		$this->load->model('Pracownik_model', 'pracownik_m');

		$this->load->library("pagination");

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

		$config = array();
        $config["base_url"] = base_url().'index.php/zarzadzanie_sprawami/wyszukaj_sprawy';
        $config["total_rows"] = $this->sprawa_m->liczba_spraw();
        $config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$strona = $this->uri->segment(3);
		$dane["paginacja"] = $this->pagination->create_links();
		$dane["sprawy"] = $this->sprawa_m->wyszukaj_sprawy_paginacja($config["per_page"], $strona, $parametry_wyszukiwania, $data_zalozenia);
	
		session_start();
		$_SESSION["id_lokalne"] = NULL;
		$id_pracownika_placowki = $_SESSION["id_pracownika_placowki"];
		$dane['czy_kierownik'] = $this->pracownik_m->sprawdz_czy_kierownictwo($id_pracownika_placowki);
		$this->load->view('zarzadzanie_sprawami/zarzadzanie_sprawami_view', $dane);
	}

	private function do_zarzadzania_sprawami(){
		session_id() == '' ? session_start() : "" ;

		$config = array();
		$config["base_url"] = base_url().'index.php/linki/do_zarzadzanie_sprawami';
		$config["total_rows"] = $this->sprawa_m->liczba_spraw();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
				
		$this->pagination->initialize($config);
		$strona = $this->uri->segment(3);
		$dane["sprawy"] = $this->sprawa_m->pobierz_dane_paginacja($config["per_page"], $strona);
		$dane["paginacja"] = $this->pagination->create_links();
		$id_pracownika_placowki = $_SESSION["id_pracownika_placowki"];
		$dane['czy_kierownik'] = $this->pracownik_m->sprawdz_czy_kierownictwo($id_pracownika_placowki);
		$this->load->view('zarzadzanie_sprawami/zarzadzanie_sprawami_view', $dane);	
	}

	function dodawanie_sprawy(){
		session_start();
		if ($this->input->post('submit') == "Anuluj"){
			$this->do_zarzadzania_sprawami();
			$_SESSION["id_wnioskodawcy"] = NULL;

		} else if ($this->input->post('submit') == "Dodaj") {
		
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
				$pola_sprawa = array('cel');
				$pola_dane_wnioskodawcy = array('nazwisko','imie','plec','data_urodzenia','obywatelstwo','narodowosc','typ_dokumentu_identyfikacyjnego','nr_dokumentu_identyfikacyjnego');
				$pola_adres_zamieszkania = array('ulica','nr_domu','nr_lokalu','kod_pocztowy','miejscowosc','panstwo');
				$pola_dane_pierwszego_przodka = array('nazwisko1','imie1','data_urodzenia1','pokrewienstwo1','obywatelstwo1','typ_dokumentu_identyfikacyjnego1','nr_dokumentu_identyfikacyjnego1');
				$pola_dane_drugiego_przodka = array('nazwisko2','imie2','data_urodzenia2','pokrewienstwo2','obywatelstwo2','typ_dokumentu_identyfikacyjnego2','nr_dokumentu_identyfikacyjnego2');
				$dane = array(array(), array(), array(), array(), array());

				foreach ($pola_sprawa as $pole){
					$dane[0] += array($pole => ($this->input->post($pole)));
				}
				foreach ($pola_dane_wnioskodawcy as $pole){
					$dane[1] += array($pole => ($this->input->post($pole)));
				}
				foreach ($pola_adres_zamieszkania as $pole){
					$dane[2] += array($pole => ($this->input->post($pole)));
				}

				if ($this->input->post("przodek_pierwszy")){
					foreach ($pola_dane_pierwszego_przodka as $pole){
						$dane[3] += array(substr($pole, 0, -1) => ($this->input->post($pole)));
					}
				} else {
					$dane[3] = NULL;
				}

				if ($this->input->post("przodek_drugi")){
					foreach ($pola_dane_drugiego_przodka as $pole){
						$dane[4] += array(substr($pole, 0, -1) => ($this->input->post($pole)));
					}
				} else {
					$dane[4] = NULL;
				}

				$this->sprawa_m->dodaj_sprawe($dane[0],$dane[1],$dane[2],$dane[3],$dane[4]);
				
				$this->do_zarzadzania_sprawami();
				$_SESSION["id_wnioskodawcy"] == NULL ? $alert = "Sprawa została dodana." : $alert = "Sprawa została dodana. Dane wnioskodawcy zostały zaktualizowane.";
				echo "<script type='text/javascript'>alert('$alert');</script>";

				$_SESSION["id_wnioskodawcy"] = NULL;
			}
		}
	}

	function edytowanie_sprawy(){
		session_start();
		if ($this->input->post('submit') == "Anuluj"){
			$this->do_zarzadzania_sprawami();
			$_SESSION["id_wnioskodawcy"] = NULL;

		} else if ($this->input->post('submit') == "Zatwierdź") {
			
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

				$dane['sprawa_stale'] = $this->sprawa_m->pobierz_stale_dane_sprawy($_SESSION["id_lokalne"]);
				$dane['sprawa'] = NULL;
				$dane['kraje'] = $this->kraj_m->pobierz_dane();
				$dane['typy'] = $this->typ_dok_m->pobierz_dane();
				$this->load->view('zarzadzanie_sprawami/edytowanie_sprawy_view', $dane);

			} else {
				$pola_dane_wnioskodawcy = array('nazwisko','imie','plec','data_urodzenia','obywatelstwo','narodowosc','typ_dokumentu_identyfikacyjnego','nr_dokumentu_identyfikacyjnego');
				$pola_adres_zamieszkania = array('ulica','nr_domu','nr_lokalu','kod_pocztowy','miejscowosc','panstwo');
				$pola_dane_pierwszego_przodka = array('nazwisko1','imie1','data_urodzenia1','pokrewienstwo1','obywatelstwo1','typ_dokumentu_identyfikacyjnego1','nr_dokumentu_identyfikacyjnego1');
				$pola_dane_drugiego_przodka = array('nazwisko2','imie2','data_urodzenia2','pokrewienstwo2','obywatelstwo2','typ_dokumentu_identyfikacyjnego2','nr_dokumentu_identyfikacyjnego2');
				$dane = array(array(), array(), array(), array());

				foreach ($pola_dane_wnioskodawcy as $pole){
					$dane[0] += array($pole => ($this->input->post($pole)));
				}
				foreach ($pola_adres_zamieszkania as $pole){
					$dane[1] += array($pole => ($this->input->post($pole)));
				}

				if ($this->input->post("przodek_pierwszy")){
					foreach ($pola_dane_pierwszego_przodka as $pole){
						$dane[2] += array(substr($pole, 0, -1) => ($this->input->post($pole)));
					}
				} else {
					$dane[2] = NULL;
				}

				if ($this->input->post("przodek_drugi")){
					foreach ($pola_dane_drugiego_przodka as $pole){
						$dane[3] += array(substr($pole, 0, -1) => ($this->input->post($pole)));
					}
				} else {
					$dane[3] = NULL;
				}

				$this->sprawa_m->edytuj_sprawe($dane[0],$dane[1],$dane[2],$dane[3]);
				$this->do_zarzadzania_sprawami();
				$alert = "Zmiany zostały zapisane.";
				echo "<script type='text/javascript'>alert('$alert');</script>";
				$_SESSION["id_lokalne"] = NULL;
			}
		}
	}

	function usuwanie_sprawy(){
		$id_lokalne = $this->input->post("id_lokalne");
		$this->sprawa_m->usun_sprawe($id_lokalne);

		$this->do_zarzadzania_sprawami();
		$alert = "Sprawa została usunięta.";
		echo "<script type='text/javascript'>alert('$alert');</script>";
	}


	function wyszukaj_wnioskodawcow(){			
		$config = array();
		$config["base_url"] = base_url().'index.php/linki/wyszukaj_wnioskodawcow';
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;			
		$this->pagination->initialize($config);
		$strona = $this->uri->segment(3);
		$dane["paginacja"] = $this->pagination->create_links();
		if($this->input->post('submit') == "Pokaż wszystko") {
			$config = array();
			$config["total_rows"] = $this->wnioskodawca_m->liczba_wnioskodawcow();
			$this->pagination->initialize($config);
			$strona = $this->uri->segment(3);
			$dane["wnioskodawcy"] = $this->wnioskodawca_m->pobierz_dane($config["per_page"], $strona);
			$dane["paginacja"] = $this->pagination->create_links();
			$this->load->view('zarzadzanie_sprawami/wyszukiwanie_wnioskodawcow_view', $dane);
		} else if($this->input->post('submit') == "Wyszukaj"){
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

			$config["total_rows"] = $this->wnioskodawca_m->liczba_znalezionych_wnioskodawcow($parametry_wyszukiwania);
			$dane['wnioskodawcy'] = $this->wnioskodawca_m->wyszukaj_wnioskodawcow($parametry_wyszukiwania, $config["per_page"], $strona);
			$this->load->view('zarzadzanie_sprawami/wyszukiwanie_wnioskodawcow_view', $dane);
		}

		

	}

	function wybierz_wnioskodawce(){
		session_start();
		$_SESSION["id_wnioskodawcy"] = $this->input->post("id");
		$id_wnioskodawcy = array("wnioskodawcy.id" => ($this->input->post("id")));
		$dane['wnioskodawca'] = $this->wnioskodawca_m->znajdz_wnioskodawce($id_wnioskodawcy);
		$dane['kraje'] = $this->kraj_m->pobierz_dane();
		$dane['typy'] = $this->typ_dok_m->pobierz_dane();
		$this->load->view('zarzadzanie_sprawami/dodawanie_sprawy_view', $dane);
	}
}
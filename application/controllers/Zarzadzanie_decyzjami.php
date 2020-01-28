<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zarzadzanie_decyzjami extends CI_Controller {

	function __construct() {
		parent::__construct();
		// $this->load->model('Dana_bazych_model', 'baza');

		$this->load->model('Decyzja_model', 'decyzja_m');
		$this->load->model('Sprawa_model', 'sprawa_m');

		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}

	public function index() {

	}

	
	function dodawanie_decyzji() {
		if ($this->input->post('reset') == "Anuluj"){
			session_start();
			$parametr_decyzji = array("decyzje.sprawa" => $_SESSION["id_lokalne"]);
			$parametr_sprawy = array( "sprawy.id_lokalne" => $_SESSION["id_lokalne"]);
			$dane['decyzje'] = $this->decyzja_m->pobierz_dane_lista($parametr_decyzji);
			$dane['czy_rozstrzygnieta'] = $this->sprawa_m->sprawdz_czy_rozstrzygnieta($parametr_sprawy);
			$this->load->view('zarzadzanie_decyzjami/zarzadzanie_decyzjami_view', $dane);
		} else if ($this->input->post('submit') == "Zatwierdź") {
			$this->form_validation->set_rules("decyzja","Decyzja","required");
			if($this->form_validation->run() == FALSE){
				$this->load->view('zarzadzanie_decyzjami/dodawanie_decyzji_view');
			} else {				
				$parametry = array("rodzaj", "uzasadnienie");
				$dane = array();

				foreach ($parametry as $param){
					if($this->input->post($param) != NULL){
						$dane += array($param => ($this->input->post($param)));
					}
				}

			}

		}
		
	}
	
}

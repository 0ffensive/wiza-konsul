<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zarzadzanie_sprawami extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Sprawa_model', 'sprawa_model');
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
		
		$wyniki['dane'] = $this->sprawa_model->wyszukaj_sprawy($parametry_wyszukiwania, $data_zalozenia);
		$this->load->view('zarzadzanie_sprawami_view', $wyniki);
	}

	function dodawanie_sprawy(){
		if ($this->input->post('reset') == "Anuluj"){
			$this->load->view('zarzadzanie_decyzjami_view');
		} else if ($this->input->post('submit') == "Dodaj") {
			echo "Dodaj";

			// substr($string, 0, -1);  --dla przodków
		}
	}
}

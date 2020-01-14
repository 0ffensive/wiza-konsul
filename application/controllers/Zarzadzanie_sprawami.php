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
		
		$inputs = array("id_lokalne", "id_globalne", "wnioskodawca", "nazwisko", "imie", "data_urodzenia", "data_zalozenia", "cel", "czy_rozstrzygnieta");
		$search_parameters = array();

		foreach ($inputs as $input){
			if($this->input->post($input) != NULL){
				$search_parameters += array($input => ($this->input->post($input)));
			}
		}
		
		$wyniki['dane'] = $this->sprawa_model->wyszukaj_sprawy($search_parameters);
		$this->load->view('zarzadzanie_sprawami_view', $wyniki);
	}

	function dodawanie_sprawy(){
		if ($this->input->post('reset') == "Anuluj"){
			$this->load->view('zarzadzanie_decyzjami_view');
		} else if ($this->input->post('submit') == "Dodaj") {
			echo "Dodaj";
		}
	}
}

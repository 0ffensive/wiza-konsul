<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linki extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Dana_bazych_model', 'baza');
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}

	public function index(){
	
	}
	
	public function do_strona_glowna(){
		$this->load->view('strona_glowna_view');
	}

	function do_zarzadzanie_sprawami(){
		$this->load->model('Sprawa_model', 'sprawa');

		$wyniki['dane'] = $this->sprawa->pobierz_dane_lista();
		$this->load->view('zarzadzanie_sprawami_view', $wyniki);
	}

	function do_generowanie_raportu(){
		$this->load->view('generowanie_raportu_view');
	}

	function do_dodawanie_sprawy_wybor(){
		$this->load->view('dodawanie_sprawy_wybor_view');
	}

	function do_wyszukiwanie_wnioskodawcy(){
		$this->load->view('wyszukiwanie_wnioskodawcy_view');
	}

	function do_dodawanie_sprawy(){
		$this->load->view('dodawanie_sprawy_view');
	}

	function do_zarzadzanie_dokumentami(){
		$this->load->view('zarzadzanie_dokumentami_view');
	}

	function do_dodawanie_dokumentu(){
		$this->load->view('dodawanie_dokumentu_view');
	}

	function do_zalaczanie_z_istniejacych(){
		$this->load->view('zalaczanie_z_istniejacych_view');
	}

	function do_zarzadzanie_decyzjami(){
		$this->load->view('zarzadzanie_decyzjami_view');
	}
	
	function do_dodawanie_decyzji(){
		$this->load->view('dodawanie_decyzji_view');
	}

	function do_przegladanie_sprawy(){
		$this->load->view('przegladanie_sprawy_view');
	}

	function do_edycja_sprawy(){

	}

	function usun_sprawe(){

	}
}

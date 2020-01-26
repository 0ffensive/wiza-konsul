<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zarzadzanie_decyzjami extends CI_Controller {

	function __construct() {
		parent::__construct();
		// $this->load->model('Dana_bazych_model', 'baza');

		$this->load->model('Decyzja_model', 'decyzja_m');

		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}

	public function index() {

	}

	function dodawanie_decyzji() {
		/*
		session_start();
		$dane['decyzje'] = $this->decyzja_m->pobierz_dane_lista();
		$_SESSION["id_lokalne"] = NULL;
		$this->load->view('zarzadzanie_decyzjami/zarzadzanie_decyzjami_view', $dane);
		*/
	}
}

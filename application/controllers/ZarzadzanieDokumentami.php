<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ZarzadzanieDokumentami extends CI_Controller {

	function __construct() {
		parent::__construct();
		// $this->load->model('Dana_bazych_model', 'baza');
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}

	public function index(){

	}

	function dodawanie_dokumentu(){
		if ($this->input->post('reset') == "Anuluj"){
			$this->load->view('zarzadzanie_dokumentami_view');
		} else if ($this->input->post('submit') == "Dodaj") {
			echo "Dodaj";
		}
	}
}

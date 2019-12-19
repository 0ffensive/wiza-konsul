<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Dana_bazych_model', 'baza');
		$this->load->helper(array('url', 'form'));
	}

	public function index()
	{
		//Libraries
		// $this->load->library('form_validation');
		// $this->form_validation->set_rule();

		//Helpers
		// $this->load->helper('html');
		// echo br(3); //-> <br> x3

		$this->load->library('form_validation');

		$this->form_validation->set_rules("nazwisko","Nazwisko","required|alpha");
		$this->form_validation->set_rules("imie","Imię","required|alpha");
		$this->form_validation->set_rules("nr_dokumentu","Numer dokumentu","required");

		if ($this->form_validation->run() == FALSE){
			$result['dataArray'] = $this->baza->getData();
			$this->load->view('home_view', $result);
		} else{
			//true
		}
	}

	function data_form(){
		$data = array(
			'nazwisko'	=> $this->input->post('nazwisko'),
			'imie'	=> $this->input->post('imie'),
			'nr_dokumentu'	=> $this->input->post('nr_dokumentu')
		);
		$this->baza->addData($data);
		$result['dataArray'] = $this->baza->getData();
		$this->load->view('home_view', $result);
	}
}

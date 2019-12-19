<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Dana_bazych_model', 'baza');
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		//Libraries
		// $this->load->library('form_validation');
		// $this->form_validation->set_rule();

		//Helpers
		// $this->load->helper('html');
		// echo br(3); //-> <br> x3	

		$result['dataArray'] = $this->baza->getData();
		$this->load->view('home_view', $result);
	}

	function data_form(){
		$this->form_validation->set_rules("nazwisko","Nazwisko","required");
		$this->form_validation->set_rules("imie","Imię","required");
		$this->form_validation->set_rules("nr_dokumentu","Numer dokumentu","required");


		if ($this->form_validation->run() == FALSE){
			$result['dataArray'] = $this->baza->getData();
			$this->load->view('home_view', $result);
		} else{
			$newData = array(
				'nazwisko'	=> $this->input->post('nazwisko'),
				'imie'	=> $this->input->post('imie'),
				'nr_dokumentu'	=> $this->input->post('nr_dokumentu')
			);
			$this->baza->addData($newData);
			$result['dataArray'] = $this->baza->getData();
			$this->load->view('home_view', $result);
		}
		
	}
}

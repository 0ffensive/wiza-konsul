<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testy_jednostkowe extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('Sprawa_model', 'sprawa_m');

		$this->load->library('unit_test');
	}

	public function index()
	{
		echo "<h2>Testy jednostkowe</h2>";
		echo $this->unit->run($this->sprawa_m->liczba_spraw(), 2, "Funkcja \"liczba_spraw\" test");

	}


}

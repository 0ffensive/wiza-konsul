<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Glowny extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('strona_glowna_wybor_view');
	}
}

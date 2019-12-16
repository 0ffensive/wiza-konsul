<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('Dana_bazych_model', 'baza');
		$result['userArray'] = $this->baza->users();

		$this->load->view('home_view', $result);
	}
}

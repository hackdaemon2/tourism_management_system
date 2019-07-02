<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function load_page()
	{
		$data['title'] = 'Delta State Tourism Board | Dashboard';

		$this->load->view('includes/dashboard/header', $data);
		$this->load->view('dashboard');
		$this->load->view('includes/dashboard/footer');
	}

	public function index()
	{
		$this->load_page();
	}
}

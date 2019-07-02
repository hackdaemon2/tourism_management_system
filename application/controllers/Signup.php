<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function clean_data($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	public function load_page()
	{
		$data['title'] = 'Delta State Tourism Board | Sign Up';

		$this->load->view('includes/header', $data);
		$this->load->view('register');
		$this->load->view('includes/footer');
	}

	public function create_account() 
	{
		$password = "";

		$this->session->set_userdata('isLoggedIn', '');
		$login_status = $this->session->userdata('isLoggedIn');

		$registration_start = $this->session->userdata('registration_start');
		$registration_finished = $this->session->userdata('registration_finished');

		
		if ($_SERVER['REQUEST_METHOD'] != 'POST')
		{
			redirect(site_url('register'));
		}


		$userDetails['email'] = $accountDetails['email'] = $this->clean_data(strtolower($this->input->post('email')));
		$userDetails['last_name'] = $this->clean_data(ucwords($this->input->post('last_name')));
		$userDetails['first_name'] = $this->clean_data(ucwords($this->input->post('first_name')));
		$userDetails['password'] = $this->input->post('password');
		
		$password = password_hash($this->clean_data($userDetails['password']), PASSWORD_DEFAULT);

		$email_error_msg = [
			'is_unique' => 'The email account address you provided already exists in our database. Please use another email account!', 
		];


		$this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[2]');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|is_unique[users.email]', $email_error_msg);
		$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[2]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[5]|max_length[255]|matches[password]');

		if ($this->form_validation->run())
		{
			$userDetails['password'] = $password;
			
			$user = $this->user_model->create_user($userDetails);

			if ($user)
			{
				$this->session->set_userdata('registration_start', 0);
				$this->session->set_userdata('registration_finished', 1);
				$message = "<div class='alert alert-success'><center>You have successfully signed up. Please login!</center></div>";
				$this->session->set_flashdata('error_message', $message);
				redirect(site_url('login'));
			} 
			else 
			{
				$message = "<div class='alert alert-danger'><center>You could not be signed up successfully. Try again! </center></div>";
				$this->session->set_flashdata('error_message', $message);
				redirect(base_url('login'));
			}
		} 
		else if (!$this->form_validation->run())
		{
			$data['message'] = "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><center>". validation_errors() ."</center></div>";
			$this->session->set_flashdata('error_message', $data['message']);
			$this->load_page();
		}
	}
}

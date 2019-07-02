<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}

	public function load_page()
	{

		$login_status = $this->session->userdata('isLoggedIn');
		
		if ($login_status)
		{
			redirect(site_url('dashboard'));
		}
		
		$data['title'] = 'Delta State Tourism Board | GIRS App';

		$this->load->view('includes/header', $data);
		$this->load->view('login');
		$this->load->view('includes/footer');
	}

	public function index()
	{
		$this->load_page();
	}

	public function login() 
	{
		$login_status = $this->session->userdata('isLoggedIn');
		
		if ($login_status)
		{
			redirect(site_url('dashboard'));
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$user['email'] = $this->input->post('email');
			$user['password'] = $this->input->post('password');

			$email_error_msg = [
									'required' => 'Email is required', 
									'min_length' => 'Minimum email length is 5',
									'max_length' => 'Maximum email length is 255',
									'email' => 'Enter a valid email',
								];

			$password_error_msg = [ 
									'required' => 'Password is required',
									'min_length' => 'Minimum password length is 5',
									'max_length' => 'Maximum password length is 255'
								  ];

			$this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|max_length[255]', $email_error_msg);
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[255]', $password_error_msg);

			if (!$this->form_validation->run())
			{
				$message = "<div class='alert alert-danger'><center>". validation_errors() ."</center></div>";
				$this->session->set_flashdata('error_message', $message);
				$this->load_page();
			} 
			else 
			{
				$valid_login = $this->auth_model->validate_user_login($user);
		
				if ($valid_login)
				{
					redirect(site_url('dashboard'));	
				} 
				else
				{
					$this->session->set_flashdata('error_message', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><center>You cannot login because you provided an invalid email or password!</center></div>');
					$this->load_page();
				}
			}
		} 
		else 
		{
			redirect(base_url());
		}
		
	}
}

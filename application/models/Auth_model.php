<?php

if (!defined('BASEPATH'))
{
	exit('No direct script access allowed');
}

class Auth_model extends CI_Model
{
	var $details;

	public function __construct()
	{
		parent::__construct();
	}

	public function clean_login_input($details)
	{
		$this->$details = htmlspecialchars(stripslashes(trim($details)));
    	return $this->$details;
	}

	public function validate_user_login($user)
	{
   		$email = $this->clean_login_input(strtolower($user['email']));
    	$password = $this->clean_login_input($user['password']);
    	$hash = $this->get_hashed_password($email);

    	if (!empty($hash))
    	{
	    	if (password_verify($password, $hash))
	    	{
				$result = $this->db->get_where('users', ['email' => $email])->result();

		    	if (is_array($result) && count($result) > 0 && !empty($result))
		    	{
		    		$this->details = $result[0];
		    		$this->set_session();

		    		return TRUE;
		    	}
		    	else
		    	{
		    		return FALSE;
		    	}
	    	}

	    	return FALSE;
	    }
	    
	    return FALSE; 
	}

	public function set_session()
	{
		$this->session->set_userdata(
			[
        		'fullname' => $this->details->first_name . ' ' . $this->details->last_name,
        		'email' => $this->details->email,
        		'first_name' => $this->details->first_name,
        		'last_name' => $this->details->last_name,
        		'isLoggedIn' => TRUE,
    		]
    	);
	}

	public function get_hashed_password($email)
 	{
      	$password = $this->db->limit(1)->get_where('users', ['email' => $email])->row()->password;

      	if (empty($password)) {
      		return NULL;
      	}

    	return $password;
	}
}
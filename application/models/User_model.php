<?php 

if (!defined('BASEPATH'))
{
 exit('No direct script access allowed');
}

class User_model extends CI_Model
{
 public function __construct()
 {
  parent::__construct();
  $this->load->database();
}

public function profile_update($table, $where, $data)
{
  return $this->db->where($where)->update($table, $data);
}

public function get_user($email)
{   
  $user_details = [];
  $user_details = $this->db->limit(1)->get_where('users', ['email' => $email])->result();

  if (count($user_details) == 1 && !empty($user_details) && is_array($user_details))
  {
    return $user_details;
  }

  return NULL;
}

public function update_password($userDetails)
{
  return $this->db->where(['email' => $userDetails['email']])->update('users', ['password' => $userDetails['password']]);
} 

public function create_user($user_details)
{
  return $this->db->insert('users', $user_details);
}

public function clean_password_input($details)
{
  $this->$details = htmlspecialchars(stripslashes(trim($details)));
  return $this->$details;
}

public function verify_password($email, $old_password)
{
  $hash = $this->get_hashed_password($email);
  $old_password = $this->clean_password_input($old_password);

  if (!empty($hash)) 
  {
    if (password_verify($old_password, $hash))
    {
      return TRUE;
    }
  }

  return FALSE; 
}

public function validate_email($email)
{
  $check_user_tbl = $this->db->limit(1)->get_where('users', ['email' => $email])->result();

  if (!empty($check_user_tbl) && count($check_user_tbl) == 1)
  {
    return TRUE;
  }

  return FALSE;
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
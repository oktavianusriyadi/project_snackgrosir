<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
  public function Login_admin($username, $password)
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where(array(
      'username' => $username,
      'password' => $password
    ));
    return $this->db->get()->row();
  }
}

/* End of file Auth_m.php */

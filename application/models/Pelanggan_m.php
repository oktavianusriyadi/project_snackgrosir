<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_m extends CI_Model
{

  public function register($data)
  {
    $this->db->insert('tb_pelanggan', $data);
  }
}

/* End of file Pelanggan_m.php */
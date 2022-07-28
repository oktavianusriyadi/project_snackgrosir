<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_m extends CI_Model
{

  public function register($data)
  {
    $this->db->insert('tb_pelanggan', $data);
  }

  public function tampil_akun()
  {
    $this->db->select('*');
    $this->db->from('tb_pelanggan');
    $this->db->order_by('id_pelanggan', 'desc');
    $this->db->get()->result();
  }
}

/* End of file Pelanggan_m.php */
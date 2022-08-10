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

  public function update($data)
  {
    $this->db->where('id_pelanggan', $data['id_pelanggan']);
    $this->db->update('tb_pelanggan', $data);
  }
}

/* End of file Pelanggan_m.php */
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_m extends CI_Model
{

  public function pesanan()
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->order_by('id_transaksi desc');
    return $this->db->get()->result();
  }
}

/* End of file Pesanan_m.php */

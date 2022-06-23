<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{
  public function total_produk()
  {
    return $this->db->get('tb_produk')->num_rows();
  }

  public function total_kategori()
  {
    return $this->db->get('tb_kategori')->num_rows();
  }
}

/* End of file Admin_m.php */

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

  public function data_setting()
  {
    $this->db->select('*');
    $this->db->from('tb_setting');
    $this->db->where('id', 1);
    return $this->db->get()->row();
  }

  public function update($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('tb_setting', $data);
  }
}

/* End of file Admin_m.php */

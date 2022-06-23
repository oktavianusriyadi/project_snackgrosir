<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_m extends CI_Model
{
  public function tampil_data()
  {
    $this->db->select('*');
    $this->db->from('tb_kategori');
    $this->db->order_by('id_kategori', 'desc');
    return $this->db->get()->result();
  }

  public function add($data)
  {
    $this->db->insert('tb_kategori', $data);
  }

  public function update($data)
  {
    $this->db->where('id_kategori', $data['id_kategori']);
    $this->db->update('tb_kategori', $data);
  }

  public function delete($data)
  {
    $this->db->where('id_kategori', $data['id_kategori']);
    $this->db->delete('tb_kategori', $data);
  }
}

/* End of file Kategori_m.php */

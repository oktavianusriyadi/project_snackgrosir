<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
  public function tampil_data()
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->order_by('id_user', 'desc');
    return $this->db->get()->result();
  }

  public function add($data)
  {
    $this->db->insert('tb_user', $data);
  }

  public function update($data)
  {
    $this->db->where('id_user', $data['id_user']);
    $this->db->update('tb_user', $data);
  }

  public function delete($data)
  {
    $this->db->where('id_user', $data['id_user']);
    $this->db->delete('tb_user', $data);
  }
}

/* End of file User_m.php */

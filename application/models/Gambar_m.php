<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambar_m extends CI_Model
{
  public function tampil_data()
  {
    $this->db->select('tb_produk.*,COUNT(tb_gambar.id_produk) as total_gambar');
    $this->db->from('tb_produk');
    $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
    $this->db->group_by('tb_produk.id_produk');
    $this->db->order_by('tb_produk.id_produk', 'desc');
    return $this->db->get()->result();
  }

  public function tampil_produk($id_gambar)
  {
    $this->db->select('*');
    $this->db->from('tb_gambar');
    $this->db->where('id_gambar', $id_gambar);
    return $this->db->get()->row();
  }

  public function tampil_gambar($id_produk)
  {
    $this->db->select('*');
    $this->db->from('tb_gambar');
    $this->db->where('id_produk', $id_produk);
    return $this->db->get()->result();
  }

  public function add($data)
  {
    $this->db->insert('tb_gambar', $data);
  }

  public function delete($data)
  {
    $this->db->where('id_gambar', $data['id_gambar']);
    $this->db->delete('tb_gambar', $data);
  }
}

/* End of file Gambar_m.php */

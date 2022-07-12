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

  public function total_pesanan()
  {
    return $this->db->get('tb_transaksi')->num_rows();
  }

  public function total_pelanggan()
  {
    return $this->db->get('tb_pelanggan')->num_rows();
  }

  public function total_user()
  {
    return $this->db->get('tb_user')->num_rows();
  }

  // Pelanggan
  // public function tampil_pelanggan()
  // {
  //   $this->db->select('*');
  //   $this->db->from('tb_pelanggan');
  //   $this->db->order_by('id_pelanggan', 'desc');
  //   $this->db->get()->result();
  // }
  // End Pelanggan

  // Setting
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
  // End Setting
}

/* End of file Admin_m.php */

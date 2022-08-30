<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_m extends CI_Model
{
  public function pesanan()
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->where('status_order=0');
    $this->db->order_by('id_transaksi', 'desc');
    return $this->db->get()->result();
  }

  public function pesanan_dikemas()
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->where('status_order=1');
    $this->db->order_by('id_transaksi', 'desc');
    return $this->db->get()->result();
  }

  public function pesanan_dikirim()
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->where('status_order=2');
    $this->db->order_by('id_transaksi', 'desc');
    return $this->db->get()->result();
  }

  public function pesanan_selesai()
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->where('status_order=3');
    $this->db->order_by('id_transaksi', 'desc');
    return $this->db->get()->result();
  }

  public function update_order($data)
  {
    $this->db->where('id_transaksi', $data['id_transaksi']);
    $this->db->update('tb_transaksi', $data);
  }
}

/* End of file Pesanan_m.php */

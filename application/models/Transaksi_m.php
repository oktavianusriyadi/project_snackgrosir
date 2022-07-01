<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_m extends CI_Model
{
  public function simpan_transaksi($data)
  {
    $this->db->insert('tb_transaksi', $data);
  }

  public function simpan_rinci($data_rinci)
  {
    $this->db->insert('tb_rinci_transaksi', $data_rinci);
  }

  public function belum_bayar()
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->where('status_bayar=0');
    $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan')); //untuk filter id_pelanggan saat di pesanan saya
    $this->db->order_by('id_transaksi', 'desc');
    return $this->db->get()->result();
  }
}

/* End of file Transaksi_m.php */

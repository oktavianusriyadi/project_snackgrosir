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
    $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan')); //untuk filter id_pelanggan saat di pesanan saya
    $this->db->where('status_order=0');
    $this->db->order_by('id_transaksi', 'desc');
    return $this->db->get()->result();
  }

  public function dikemas()
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan')); //untuk filter id_pelanggan saat di pesanan saya
    $this->db->where('status_order=1');
    $this->db->order_by('id_transaksi', 'desc');
    return $this->db->get()->result();
  }

  public function dikirim()
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan')); //untuk filter id_pelanggan saat di pesanan saya
    $this->db->where('status_order=2');
    $this->db->order_by('id_transaksi', 'desc');
    return $this->db->get()->result();
  }

  public function selesai()
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan')); //untuk filter id_pelanggan saat di pesanan saya
    $this->db->where('status_order=3');
    $this->db->order_by('id_transaksi', 'desc');
    return $this->db->get()->result();
  }

  public function detail_pesanan($id_transaksi)
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->where('id_transaksi', $id_transaksi);
    return $this->db->get()->row();
  }

  public function rekening()
  {
    $this->db->select('*');
    $this->db->from('tb_rekening');
    return $this->db->get()->result();
  }

  public function upload_bukti($data)
  {
    $this->db->where('id_transaksi', $data['id_transaksi']);
    $this->db->update('tb_transaksi', $data);
  }
}

/* End of file Transaksi_m.php */

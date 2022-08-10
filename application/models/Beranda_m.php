<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_m extends CI_Model
{
  // Mengambil Data Untuk Tampilkan Semua Produk
  public function tampil_data()
  {
    $this->db->select('*');
    $this->db->from('tb_produk');
    $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
    $this->db->order_by('id_produk', 'desc');
    return $this->db->get()->result();
  }
  // End

  // Mengambil Data Untuk Detail Produk
  public function detail_produk($id_produk)
  {
    $this->db->select('*');
    $this->db->from('tb_produk');
    $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
    $this->db->where('id_produk', $id_produk);
    return $this->db->get()->row();
  }

  public function gambar_produk($id_produk)
  {
    $this->db->select('*');
    $this->db->from('tb_gambar');
    $this->db->where('id_produk', $id_produk);
    return $this->db->get()->result();
  }
  // End

  // Mengambil Data Untuk Produk Per Kategori
  public function kategori($id_kategori)
  {
    $this->db->select('*');
    $this->db->from('tb_kategori');
    $this->db->where('id_kategori', $id_kategori);
    return $this->db->get()->row();
  }

  public function tampil_data_produk($id_kategori)
  {
    $this->db->select('*');
    $this->db->from('tb_produk');
    $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
    $this->db->where('tb_produk.id_kategori', $id_kategori);
    return $this->db->get()->result();
  }

  public function tampil_data_kategori()
  {
    $this->db->select('*');
    $this->db->from('tb_kategori');
    $this->db->order_by('id_kategori', 'desc');
    return $this->db->get()->result();
  }
  // End
}

/* End of file Beranda_m.php */

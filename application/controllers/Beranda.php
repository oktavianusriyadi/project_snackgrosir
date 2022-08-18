<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('Beranda_m');
  }

  // List all your items
  public function index()
  {
    $data = array(
      'produk' => $this->Beranda_m->tampil_data(),
    );
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Beranda_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }

  // Menampilkan Semua Produk
  public function AllProduk()
  {
    $data = array(
      'produk' => $this->Beranda_m->tampil_data(),
    );
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Beranda_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }
  // End

  //Menampilkan Produk Berdasarkan Kategori
  public function kategori($id_kategori)
  {
    $kategori = $this->Beranda_m->kategori($id_kategori);
    $data = array(
      'produk' => $this->Beranda_m->tampil_data_produk($id_kategori),
    );
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Beranda_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }
  // End

  // Menampilkan Detail Produk
  public function detail_produk($id_produk)
  {
    $data = array(
      'detail' => $this->Beranda_m->detail_produk($id_produk),
      'gambarP' => $this->Beranda_m->gambar_produk($id_produk),
    );
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Detail_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }

  // Pencarian
  public function cariProduk()
  {
    $config['base_url'] = '';

    if ($this->input->post('keyword')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->input->post('keyword');
    }

    $this->db->like('nama_produk', $data['keyword']);
    $this->db->from('tb_produk');

    $config['total_rows'] = $this->db->count_all_results();

    $data = array(
      'total_rows' => $config['total_rows'],
      'keyword' => $data['keyword'],
      'produk' => $this->Beranda_m->tampil_data($data['keyword']),
    );
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Search_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }
  // End Pencarian
}

/* End of file Beranda.php */

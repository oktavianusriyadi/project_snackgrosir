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
    $this->load->view('user/Kategori_v', $data, FALSE);
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
  // End
}

/* End of file Beranda.php */

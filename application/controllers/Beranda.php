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
    // Pagination
    $config['base_url'] = 'http://localhost/snack/beranda/index/';

    $config['total_rows'] = $this->Beranda_m->jumlah_data_produk(); // menghitung total produk 
    $config['per_page'] = 12; // jumlah data produk yang ditampilkan per halaman
    $data['start'] = $this->uri->segment(3);

    // Tampilan pagination
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['first_tag_close'] = '</span></li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['prev_tag_close'] = '</span></li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['next_tag_close'] = '</span></li>';
    $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['last_tag_close'] = '</span></li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close'] = '</span></li>';
    // End of tampilan pagination

    $this->pagination->initialize($config);
    // End of pagination

    $data = array(
      'title' => 'HALAMAN BERANDA',
      'total_rows' => $config['total_rows'],
      'produk' => $this->Beranda_m->tampil_data($config['per_page'], $data['start']),
    );

    $this->load->view('tampilanuser/header', $data);
    $this->load->view('user/Beranda_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }

  //Menampilkan Produk Berdasarkan Kategori
  public function kategori($id_kategori)
  {
    $kategori = $this->Beranda_m->kategori($id_kategori);
    $data = array(
      'title' => 'HALAMAN KATEGORI',
      'produk' => $this->Beranda_m->tampil_data_produk($id_kategori),
    );
    $this->load->view('tampilanuser/header', $data);
    $this->load->view('user/Beranda_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }
  // End

  // Menampilkan Detail Produk
  public function detail_produk($id_produk)
  {
    $data = array(
      'title' => 'DETAIL PRODUK',
      'detail' => $this->Beranda_m->detail_produk($id_produk),
      'gambarP' => $this->Beranda_m->gambar_produk($id_produk),
    );
    $this->load->view('tampilanuser/header', $data);
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
      'title' => 'HASIL PENCARIAN',
      'total_rows' => $config['total_rows'],
      'keyword' => $data['keyword'],
      'produk' => $this->Beranda_m->tampil_produk($data['keyword']),
    );
    $this->load->view('tampilanuser/header', $data);
    $this->load->view('user/Search_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }
  // End Pencarian
}

/* End of file Beranda.php */

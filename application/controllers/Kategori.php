<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('admin/Kategori_m');
  }

  // List all your items
  public function index()
  {
    $data = array(
      'kategori' => $this->Kategori_m->tampil_data(),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('admin/Kategori_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }

  // Add a new item
  public function add()
  {
    $data = array(
      'kategori' => $this->input->post('kategori'),
    );
    $this->Kategori_m->add($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
    redirect('Kategori');
  }

  //Update one item
  public function update($id_kategori = NULL)
  {
    $data = array(
      'id_kategori' => $id_kategori,
      'kategori' => $this->input->post('kategori'),
    );
    $this->Kategori_m->update($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Diupdate!');
    redirect('Kategori');
  }

  //Delete one item
  public function delete($id_kategori = NULL)
  {
    $data = array('id_kategori' => $id_kategori);
    $this->Kategori_m->delete($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
    redirect('Kategori');
  }
}

/* End of file Kategori.php */

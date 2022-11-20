<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('Produk_m');
    $this->load->model('Kategori_m');
  }

  // List all your items
  public function index()
  {
    $data = array(
      'produk' => $this->Produk_m->tampil_data(),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('produk/Produk_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }

  // Add a new item
  public function add()
  {
    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('berat', 'Berat', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('harga', 'Harga', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s Harus Diisi!'));

    if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './assets/imgcover';
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size']     = '2000';
      $this->upload->initialize($config);
      $field_name = "gambar";
      if (!$this->upload->do_upload($field_name)) {
        $this->session->set_flashdata('erorr_upload', 'Ukuran Gambar Terlalu Beesar Max. 2Mb!');
      } else {
        $upload_data = array('uploads' => $this->upload->data());
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/imgcover' . $upload_data['uploads']['file_name'];
        $this->load->library('image_lib', $config);
        $data = array(
          'nama_produk' => $this->input->post('nama_produk'),
          'id_kategori' => $this->input->post('id_kategori'),
          'berat' => $this->input->post('berat'),
          'harga' => $this->input->post('harga'),
          'deskripsi' => $this->input->post('deskripsi'),
          'gambar' => $upload_data['uploads']['file_name'],
        );
        $this->Produk_m->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
        redirect('Produk');
      }
    }

    $data = array(
      'kategori' => $this->Kategori_m->tampil_data(),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('produk/TambahP_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }

  //Update one item
  public function update($id_produk = NULL)
  {
    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('berat', 'Berat', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('harga', 'Harga', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s Harus Diisi!'));

    if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './assets/imgcover';
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size']     = '2000';
      $this->upload->initialize($config);
      $field_name = 'gambar';
      if (!$this->upload->do_upload($field_name)) {
        $this->session->set_flashdata('erorr_upload', 'Ukuran Gambar Terlalu Beesar Max. 2Mb!');
      } else {
        //Hapus Gambar
        $produk = $this->Produk_m->tampil_produk($id_produk);
        if ($produk->gambar != "") {
          unlink('./assets/imgcover/' . $produk->gambar);
        }
        // End
        $upload_data = array('uploads' => $this->upload->data());
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/imgcover' . $upload_data['uploads']['file_name'];
        $this->load->library('image_lib', $config);
        $data = array(
          'id_produk' => $id_produk,
          'nama_produk' => $this->input->post('nama_produk'),
          'id_kategori' => $this->input->post('id_kategori'),
          'berat' => $this->input->post('berat'),
          'harga' => $this->input->post('harga'),
          'deskripsi' => $this->input->post('deskripsi'),
          'gambar' => $upload_data['uploads']['file_name'],
        );
        $this->Produk_m->update($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diupdate!');
        redirect('Produk');
      }
      //Tanpa Ganti Gambar
      $data = array(
        'id_produk' => $id_produk,
        'nama_produk' => $this->input->post('nama_produk'),
        'id_kategori' => $this->input->post('id_kategori'),
        'berat' => $this->input->post('berat'),
        'harga' => $this->input->post('harga'),
        'deskripsi' => $this->input->post('deskripsi'),
      );
      $this->Produk_m->update($data);
      $this->session->set_flashdata('pesan', 'Data Berhasil Diupdate!');
      redirect('Produk');
    }

    $data = array(
      'kategori' => $this->Kategori_m->tampil_data(),
      'produk' => $this->Produk_m->tampil_produk($id_produk),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('produk/UpdateP_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }

  //Delete one item
  public function delete($id_produk = NULL)
  {
    //Hapus Gambar
    $produk = $this->Produk_m->tampil_produk($id_produk);
    if ($produk->gambar != "") {
      unlink('./assets/imgcover/' . $produk->gambar);
    }
    // End
    $data = array('id_produk' => $id_produk);
    $this->Produk_m->delete($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
    redirect('Produk');
  }
}

/* End of file Produk.php */

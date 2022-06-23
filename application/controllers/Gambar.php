<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Gambar extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('Gambar_m');
    $this->load->model('Produk_m');
  }

  // List all your items
  public function index()
  {
    $data = array(
      //gambarC = Gambar Cover
      'gambarC' => $this->Gambar_m->tampil_data(),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('gambar/Gambar_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }

  // Add a new item
  public function add($id_produk)
  {
    $this->form_validation->set_rules('ketgambar', 'Ket. Gambar', 'required', array('required' => '%s Harus Diisi!'));

    if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './assets/imgproduk/';
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size']     = '2000';
      $this->upload->initialize($config);
      $field_name = "gambar";
      if (!$this->upload->do_upload($field_name)) {
        $this->session->set_flashdata('erorr_upload', 'Ukuran Gambar Terlalu Beesar Max. 2Mb!');
      } else {
        $upload_data = array('uploads' => $this->upload->data());
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/imgproduk' . $upload_data['uploads']['file_name'];
        $this->load->library('image_lib', $config);
        $data = array(
          'id_produk' => $id_produk,
          'ketgambar' => $this->input->post('ketgambar'),
          'gambar' => $upload_data['uploads']['file_name'],
        );
        $this->Gambar_m->add($data);
        $this->session->set_flashdata('pesan', 'Gambar Produk Berhasil Ditambahkan!');
        redirect('Gambar/add/' . $id_produk);
      }
    }
    $data = array(
      //gambarP = Gambar Produk
      'produk' => $this->Produk_m->tampil_produk($id_produk),
      'gambarP' => $this->Gambar_m->tampil_gambar($id_produk),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('gambar/TambahG_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }

  //Update one item
  public function update($id = NULL)
  {
  }

  //Delete one item
  public function delete($id_produk, $id_gambar)
  {
    //Hapus Gambar
    $gambarP = $this->Gambar_m->tampil_produk($id_gambar);
    if ($gambarP->gambar != "") {
      unlink('./assets/imgproduk/' . $gambarP->gambar);
    }
    // End
    $data = array('id_gambar' => $id_gambar);
    $this->Gambar_m->delete($data);
    $this->session->set_flashdata('pesan', 'Gambar Berhasil Dihapus!');
    redirect('Gambar/add/' . $id_produk);
  }
}

/* End of file Gambar.php */

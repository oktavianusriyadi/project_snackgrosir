<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('admin/Admin_m');
  }

  // List all your items
  public function index()
  {
    $data = array(
      'total_produk' => $this->Admin_m->total_produk(),
      'total_kategori' => $this->Admin_m->total_kategori(),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('admin/Admin_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }

  public function setting()
  {
    $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required', array('required' => '%s Harus Diisi!'));

    if ($this->form_validation->run() == FALSE) {
      $data = array(
        'setting' => $this->Admin_m->data_setting(),
      );
      $this->load->view('tampilanadmin/sidebar');
      $this->load->view('tampilanadmin/header');
      $this->load->view('admin/Setting_v', $data, FALSE);
      $this->load->view('tampilanadmin/footer');
    } else {
      $data = array(
        'id' => 1,
        'lokasi' => $this->input->post('kota'),
        'nama_toko' => $this->input->post('nama_toko'),
        'alamat_toko' => $this->input->post('alamat_toko'),
        'no_tlp' => $this->input->post('no_tlp'),
      );
      $this->Admin_m->update($data);
      $this->session->set_flashdata('pesan', 'Setting Berhasil Di Ubah!');
      redirect('admin/Admin/setting');
    }
  }
}

/* End of file Admin.php */

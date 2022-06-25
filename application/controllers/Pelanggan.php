<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('Pelanggan_m');
  }

  // List all your items
  public function register()
  {
    $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules(
      'email',
      'E-mail',
      'required|is_unique[tb_pelanggan.email]',
      array(
        'required' => '%s Harus Diisi!',
        'is_unique' => '%s Ini Sudah Terdaftar!'
      )
    );
    $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules(
      'konfirmasi_password',
      'Konfirmasi Password',
      'required|matches[password]',
      array(
        'required' => '%s Harus Diisi!',
        'matches' => '%s Tidak Sama!'
      )
    );

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('tampilanuser/header');
      $this->load->view('user/Register_v');
      $this->load->view('tampilanuser/footer');
    } else {
      $data = array(
        'nama_pelanggan' => $this->input->post('nama_pelanggan'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
      );
      $this->Pelanggan_m->register($data);
      $this->session->set_flashdata('pesan', 'Selamat, Register Berhasil');
      redirect('Pelanggan/register');
    }
  }

  // Add a new item
  public function add()
  {
  }

  //Update one item
  public function update($id = NULL)
  {
  }

  //Delete one item
  public function delete($id = NULL)
  {
  }
}

/* End of file Pelanggan.php */

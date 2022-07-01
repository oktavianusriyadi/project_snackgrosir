<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{
  protected $ci;

  public function __construct()
  {
    $this->ci = &get_instance();
    $this->ci->load->model('admin/Auth_m');
  }

  public function login($email, $password)
  {
    $cek = $this->ci->Auth_m->login_pelanggan($email, $password);
    if ($cek) {
      $id_pelanggan = $cek->id_pelanggan;
      $nama_pelanggan = $cek->nama_pelanggan;
      $email = $cek->email;
      //session
      $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
      $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
      $this->ci->session->set_userdata('email', $email);
      redirect('Beranda');
    } else {
      $this->ci->session->set_flashdata('error', 'E-mail Atau Password Salah!');
      redirect('Pelanggan/login');
    }
  }

  public function proteksi_hal()
  {
    if ($this->ci->session->userdata('nama_pelanggan') == '') {
      $this->ci->session->set_flashdata('error', 'Anda Belum Login !');
      redirect('Pelanggan/login');
    }
  }

  public function logout()
  {
    $this->ci->session->unset_userdata('id_pelanggan');
    $this->ci->session->unset_userdata('nama_pelanggan');
    $this->ci->session->unset_userdata('email');
    $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !');
    redirect('Pelanggan/login');
  }
}

/* End of file LibraryName.php */

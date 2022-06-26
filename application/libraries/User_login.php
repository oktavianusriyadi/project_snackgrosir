<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
  protected $ci;

  public function __construct()
  {
    $this->ci = &get_instance();
    $this->ci->load->model('admin/Auth_m');
  }

  public function login($username, $password)
  {
    $cek = $this->ci->Auth_m->login_admin($username, $password);
    if ($cek) {
      $nama = $cek->nama;
      $username = $cek->username;
      $level_user = $cek->level_user;
      //session
      $this->ci->session->set_userdata('username', $username);
      $this->ci->session->set_userdata('nama', $nama);
      $this->ci->session->set_userdata('level_user', $level_user);
      redirect('admin/admin');
    } else {
      $this->ci->session->set_flashdata('error', 'Username Atau Password Salah!');
      redirect('admin/Auth/login_admin');
    }
  }

  public function proteksi_hal()
  {
    if ($this->ci->session->userdata('username') == '') {
      $this->ci->session->set_flashdata('error', 'Anda Belum Login !');
      redirect('admin/Auth/login_admin');
    }
  }

  public function logout()
  {
    $this->ci->session->unset_userdata('username');
    $this->ci->session->unset_userdata('nama');
    $this->ci->session->unset_userdata('level_user');
    $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !');
    redirect('admin/Auth/login_admin');
  }
}

/* End of file LibraryName.php */

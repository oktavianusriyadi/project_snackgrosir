<?php

class Login extends CI_Controller
{
  public function index()
  {

    $this->load->view('tampilanuser/header');
    $this->load->view('user/login');
    $this->load->view('tampilanuser/footer');
  }
  public function regis()
  {
    $this->load->view('tampilanuser/header');
    $this->load->view('user/regis');
    $this->load->view('tampilanuser/footer');
  }
}

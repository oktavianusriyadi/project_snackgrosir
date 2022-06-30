<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{

  public function index()
  {
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Pesanan_saya_v');
    $this->load->view('tampilanuser/footer');
  }
}

/* End of file Pesanan_saya.php */

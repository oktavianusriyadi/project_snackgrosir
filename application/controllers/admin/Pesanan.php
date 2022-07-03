<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('admin/Pesanan_m');
  }

  // List all your items
  public function index()
  {
    $data = array(
      'pesanan_masuk' => $this->Pesanan_m->pesanan(),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('admin/Pesanan_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }
}

/* End of file Pesanan.php */

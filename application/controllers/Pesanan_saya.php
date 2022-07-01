<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('Transaksi_m');
    
  }
  
  public function index()
  {
    $data = array(
      'belum_bayar' => $this->Transaksi_m->belum_bayar(), 
    );
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Pesanan_saya_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }
}

/* End of file Pesanan_saya.php */
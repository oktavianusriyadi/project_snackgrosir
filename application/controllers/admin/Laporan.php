<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('admin/Laporan_m');
  }


  public function index()
  {
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('admin/Laporan_v');
    $this->load->view('tampilanadmin/footer');
  }

  public function lap_harian()
  {
    $tanggal = $this->input->post('tanggal');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');

    $data = array(
      'tanggal' => $tanggal,
      'bulan' => $bulan,
      'tahun' => $tahun,
      'laporan' => $this->Laporan_m->lap_harian($tanggal, $bulan, $tahun),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('admin/LapHarian_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }
}

/* End of file Laporan.php */

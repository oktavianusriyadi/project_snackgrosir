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
      'pesanan_dikemas' => $this->Pesanan_m->pesanan_dikemas(),
      'pesanan_dikirim' => $this->Pesanan_m->pesanan_dikirim(),
      'pesanan_selesai' => $this->Pesanan_m->pesanan_selesai(),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('admin/Pesanan_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }

  public function dikemas($id_transaksi)
  {
    $data = array(
      'id_transaksi' => $id_transaksi,
      'status_order' => '1'
    );
    $this->Pesanan_m->update_order($data);
    $this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses Untuk Dikemas');
    redirect('Pesanan');
  }

  public function kirim($id_transaksi)
  {
    $data = array(
      'id_transaksi' => $id_transaksi,
      'no_resi' => $this->input->post('no_resi'),
      'status_order' => '2'
    );
    $this->Pesanan_m->update_order($data);
    $this->session->set_flashdata('pesan', 'Pesanan Berhasil Dikirim');
    redirect('Pesanan');
  }
}

/* End of file Pesanan.php */

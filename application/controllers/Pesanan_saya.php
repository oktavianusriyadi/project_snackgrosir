<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('Transaksi_m');
    $this->load->model('admin/Pesanan_m');
  }
  //Pesanan
  public function index()
  {
    $data = array(
      'pesanan' => $this->Transaksi_m->pesanan(),
      'dikemas' => $this->Transaksi_m->dikemas(),
      'dikirim' => $this->Transaksi_m->dikirim(),
      'selesai' => $this->Transaksi_m->selesai(),
      'detail' => $this->Transaksi_m->detail(),
    );
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Pesanan_saya_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }

  //Bayar
  public function bayar($id_transaksi)
  {
    $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', array('required' => '%s Harus Diisi!'));

    if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './assets/bukti_bayar/';
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size']     = '2000';
      $this->upload->initialize($config);
      $field_name = 'bukti_bayar';
      if (!$this->upload->do_upload($field_name)) {
        $this->session->set_flashdata('erorr_upload', 'Ukuran Gambar Terlalu Beesar Max. 2Mb!');
      } else {
        $upload_data = array('uploads' => $this->upload->data());
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/bukti_bayar/' . $upload_data['uploads']['file_name'];
        $this->load->library('image_lib', $config);
        $data = array(
          'id_transaksi' => $id_transaksi,
          'atas_nama' => $this->input->post('atas_nama'),
          'nama_bank' => $this->input->post('nama_bank'),
          'no_rek' => $this->input->post('no_rek'),
          'status_bayar' => '1',
          'bukti_bayar' => $upload_data['uploads']['file_name'],
        );
        $this->Transaksi_m->upload_bukti($data);
        $this->session->set_flashdata('pesan', 'Bukti Bayar Berhasil Diupload!');
        redirect('Pesanan_saya');
      }
    }
    //
    $data = array(
      'bayar' => $this->Transaksi_m->detail_pesanan($id_transaksi),
      'rekening' => $this->Transaksi_m->rekening(),
    );
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Bayar_v', $data, FALSE);
    $this->load->view('tampilanuser/footer');
  }

  //Selesai
  public function diterima($id_transaksi)
  {
    $data = array(
      'id_transaksi' => $id_transaksi,
      'status_order' => '3'
    );
    $this->Pesanan_m->update_order($data);
    $this->session->set_flashdata('pesan', 'Pesanan Sudah Diterima');
    redirect('Pesanan_saya');
  }

  //Detail Transaksi
  public function detail_transaksi()
  {
  }
}

/* End of file Pesanan_saya.php */
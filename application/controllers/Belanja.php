<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('Transaksi_m');
  }

  // List all your items
  public function index()
  {
    if (empty($this->cart->contents())) {
      redirect('Beranda');
    }
    $data = array(
      'title' => 'KERANJANG',
    );

    $this->load->view('tampilanuser/header', $data);
    $this->load->view('user/Belanja_v');
    $this->load->view('tampilanuser/footer');
  }

  // Add a new item
  public function add()
  {
    $redirect_page = $this->input->post('redirect_page');
    $data = array(
      'id'      => $this->input->post('id'),
      'qty'     => $this->input->post('qty'),
      'price'   => $this->input->post('price'),
      'name'    => $this->input->post('name'),
    );

    $this->cart->insert($data);
    redirect($redirect_page);
  }

  //Update one item
  public function update($id = NULL)
  {
    $i = 1;
    foreach ($this->cart->contents() as $items) {
      $data = array(
        'rowid' => $items['rowid'],
        'qty'   => $this->input->post($i . '[qty]'),
      );
      $this->cart->update($data);
      $i++;
    }
    redirect('Belanja');
  }

  //Delete one item
  public function delete($rowid)
  {
    $this->cart->remove($rowid);
    redirect('Belanja');
  }

  //Delete all items
  public function delete_all()
  {
    $this->cart->destroy();
    redirect('Belanja');
  }

  public function checkout()
  {
    //Proteksi Halaman
    $this->pelanggan_login->proteksi_hal();
    //
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('expedisi', 'Expedisi', 'required', array('required' => '%s Harus Diisi!'));
    $this->form_validation->set_rules('paket', 'Paket', 'required', array('required' => '%s Harus Diisi!'));
    if ($this->form_validation->run() == FALSE) {
      $data = array(
        'title' => 'HALAMAN CHECKOUT',
      );

      $this->load->view('tampilanuser/header', $data);
      $this->load->view('user/Checkout_v');
      $this->load->view('tampilanuser/footer');
    } else {
      //Simpan ke tb_transaksi
      $data = array(
        'id_pelanggan' => $this->session->userdata('id_pelanggan'),
        'no_order' => $this->input->post('no_order'),
        'tgl_order' => date('Y-m-d'),
        'nama_penerima' => $this->input->post('nama_penerima'),
        'no_tlp_penerima' => $this->input->post('no_tlp_penerima'),
        'provinsi' => $this->input->post('provinsi'),
        'kota' => $this->input->post('kota'),
        'alamat' => $this->input->post('alamat'),
        'kode_pos' => $this->input->post('kode_pos'),
        'expedisi' => $this->input->post('expedisi'),
        'paket' => $this->input->post('paket'),
        'estimasi' => $this->input->post('estimasi'),
        'berat' => $this->input->post('berat'),
        'ongkir' => $this->input->post('ongkir'),
        'grand_total' => $this->input->post('grand_total'),
        'total_bayar' => $this->input->post('total_bayar'),
        'status_bayar' => '0',
        'status_order' => '0',
      );
      $this->Transaksi_m->simpan_transaksi($data);
      //Simpan ke tb_rinci_transaksi
      $i = 1;
      foreach ($this->cart->contents() as $item) {
        $data_rinci = array(
          'no_order' => $this->input->post('no_order'),
          'id_produk' => $item['id'],
          'qty' => $this->input->post('qty' . $i++),
        );
        $this->Transaksi_m->simpan_rinci($data_rinci);
      }
      $this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
      $this->cart->destroy(); //Hapus cart saat co
      redirect('Pesanan_saya');
    }
  }
}

/* End of file Belanja.php */

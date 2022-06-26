<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies

  }

  // List all your items
  public function index()
  {
    if (empty($this->cart->contents())) {
      redirect('Beranda');
    }
    $this->load->view('tampilanuser/header');
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
    redirect($redirect_page, 'refresh');
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
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Checkout_v');
    $this->load->view('tampilanuser/footer');
  }
}

/* End of file Belanja.php */

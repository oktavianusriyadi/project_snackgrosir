<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies

  }

  // List all your items
  public function index()
  {
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Register_v');
    $this->load->view('tampilanuser/footer');
  }

  public function register()
  {
    $this->load->view('tampilanuser/header');
    $this->load->view('user/Register_v');
    $this->load->view('tampilanuser/footer');
  }

  // Add a new item
  public function add()
  {
  }

  //Update one item
  public function update($id = NULL)
  {
  }

  //Delete one item
  public function delete($id = NULL)
  {
  }
}

/* End of file Pelanggan.php */

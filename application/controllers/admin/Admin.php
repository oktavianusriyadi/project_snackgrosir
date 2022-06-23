<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('admin/Admin_m');
  }

  // List all your items
  public function index()
  {
    $data = array(
      'total_produk' => $this->Admin_m->total_produk(),
      'total_kategori' => $this->Admin_m->total_kategori(),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('admin/Admin_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }

  public function setting()
  {
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('admin/Setting_v');
    $this->load->view('tampilanadmin/footer');
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

/* End of file Admin.php */

<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('admin/User_m');
  }

  // List all your items
  public function index($offset = 0)
  {
    $data = array(
      'user' => $this->User_m->tampil_data(),
    );
    $this->load->view('tampilanadmin/sidebar');
    $this->load->view('tampilanadmin/header');
    $this->load->view('admin/User_v', $data, FALSE);
    $this->load->view('tampilanadmin/footer');
  }

  // Add a new item
  public function add()
  {
    $data = array(
      'nama' => $this->input->post('nama'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
    );
    $this->User_m->add($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
    redirect('admin/User');
  }

  //Update one item
  public function update($id_user = NULL)
  {
    $data = array(
      'id_user' => $id_user,
      'nama' => $this->input->post('nama'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
    );
    $this->User_m->update($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Diupdate!');
    redirect('admin/User');
  }

  //Delete one item
  public function delete($id_user = NULL)
  {
    $data = array('id_user' => $id_user);
    $this->User_m->delete($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
    redirect('admin/User');
  }
}

/* End of file Data_user.php */

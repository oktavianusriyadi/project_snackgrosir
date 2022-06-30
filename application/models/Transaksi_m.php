<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_m extends CI_Model
{
  public function simpan_transaksi($data)
  {
    $this->db->insert('tb_transaksi', $data);
  }

  public function simpan_rinci($data_rinci)
  {
    $this->db->insert('tb_rinci_transaksi', $data_rinci);
  }
}

/* End of file Transaksi_m.php */

<div class="container-fluid mt-4">
  <div class="container-fluid">
    <div class="card">
      <h5 class="card-header bg-info text-black">Pesanan Saya</h5>
      <div class="card-body">
        <?php
        if ($this->session->flashdata('pesan')) {
          echo '<div class="alert alert-dark alert-dismissible mb-4" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
          echo $this->session->flashdata('pesan');
          echo '</div>';
        }
        ?>
        <!-- Tabs -->
        <div class="row">
          <div class="col-sm-12">
            <div class="nav-align-top mb-4">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <button type="button" class="nav-link active btntab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-blmbayar" aria-controls="navs-top-home" aria-selected="true">
                    Pesanan
                  </button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link btntab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-dikemas" aria-controls="navs-top-profile" aria-selected="false">
                    Dikemas
                  </button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link btntab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-kirim" aria-controls="navs-top-messages" aria-selected="false">
                    Dikirim
                  </button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link btntab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-selesai" aria-controls="navs-top-messages" aria-selected="false">
                    Selesai
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-top-blmbayar" role="tabpanel">
                  <table class="table">
                    <tr>
                      <th>No. Order</th>
                      <th>Tanggal</th>
                      <th>Expedisi</th>
                      <th>Total Bayar</th>
                      <th>Action</th>
                    </tr>
                    <?php foreach ($belum_bayar as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value->no_order ?></td>
                        <td><?php echo $value->tgl_order ?></td>
                        <td>
                          <b class="text-uppercase">
                            <?php echo $value->expedisi ?>
                          </b>
                          (<?php echo $value->paket ?>) <br>
                          <b>
                            Rp <?php echo number_format($value->ongkir, 0) ?>
                          </b>
                        </td>
                        <td>
                          <b>
                            Rp <?php echo number_format($value->total_bayar, 0) ?> <br>
                            <?php if ($value->status_bayar == 1) { ?>
                              <span class="badge bg-warning text-uppercase">Menunggu Konfirmasi</span>
                            <?php } ?>
                          </b>
                        </td>
                        <td>
                          <?php if ($value->status_bayar == 0) { ?>
                            <a href="<?php echo base_url('Pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-danger">Bayar</a>
                          <?php } else { ?>
                            <span class="badge bg-info text-uppercase">Sudah Bayar</span>
                          <?php } ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
                <div class="tab-pane fade" id="navs-top-dikemas" role="tabpanel">
                  <table class="table">
                    <tr>
                      <th>No. Order</th>
                      <th>Tanggal</th>
                      <th>Expedisi</th>
                      <th>Total Bayar</th>
                    </tr>
                    <?php foreach ($dikemas as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value->no_order ?></td>
                        <td><?php echo $value->tgl_order ?></td>
                        <td>
                          <b class="text-uppercase">
                            <?php echo $value->expedisi ?>
                          </b>
                          (<?php echo $value->paket ?>) <br>
                          <b>
                            Rp <?php echo number_format($value->ongkir, 0) ?>
                          </b>
                        </td>
                        <td>
                          <b>
                            Rp <?php echo number_format($value->total_bayar, 0) ?> <br>
                            <span class="badge bg-warning text-uppercase">Sedang Dikemas</span>
                          </b>
                        </td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
                <div class="tab-pane fade" id="navs-top-kirim" role="tabpanel">
                  <table class="table">
                    <tr>
                      <th>No. Order</th>
                      <th>Tanggal</th>
                      <th>Expedisi</th>
                      <th>Total Bayar</th>
                      <th>Nomor Resi</th>
                      <th>Action</th>
                    </tr>
                    <?php foreach ($dikirim as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value->no_order ?></td>
                        <td><?php echo $value->tgl_order ?></td>
                        <td>
                          <b class="text-uppercase">
                            <?php echo $value->expedisi ?>
                          </b>
                          (<?php echo $value->paket ?>) <br>
                          <b>Rp <?php echo number_format($value->ongkir, 0) ?></b>
                        </td>
                        <td>
                          <b>Rp <?php echo number_format($value->total_bayar, 0) ?> <br>
                          </b>
                        </td>
                        <td>
                          <b><?php echo $value->no_resi ?></b> <br>
                          <span class="badge bg-success text-black">Pesanan Dikirim</span>
                        </td>
                        <td>
                          <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#diterima<?php echo $value->id_transaksi ?>">Diterima</button>
                        </td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
                <div class="tab-pane fade" id="navs-top-selesai" role="tabpanel">
                  <table class="table">
                    <tr>
                      <th>No. Order</th>
                      <th>Tanggal</th>
                      <th>Expedisi</th>
                      <th>Total Bayar</th>
                      <th>Nomor Resi</th>
                      <th>Action</th>
                    </tr>
                    <?php foreach ($selesai as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value->no_order ?></td>
                        <td><?php echo $value->tgl_order ?></td>
                        <td>
                          <b class="text-uppercase">
                            <?php echo $value->expedisi ?>
                          </b>
                          (<?php echo $value->paket ?>) <br>
                          <b>Rp <?php echo number_format($value->ongkir, 0) ?></b>
                        </td>
                        <td>
                          <b>Rp <?php echo number_format($value->total_bayar, 0) ?> <br>
                          </b>
                        </td>
                        <td>
                          <b><?php echo $value->no_resi ?></b> <br>
                        </td>
                        <td>
                          <a href="<?php echo base_url() ?>" class="btn btn-primary btn-sm">Belanja Lagi</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Tabs -->
      </div>
    </div>
  </div>
</div>

<?php foreach ($dikirim as $key => $value) { ?>
  <!-- Modal Diterima -->
  <div class="modal fade" id="diterima<?php echo $value->id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->no_order ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6 class="text-center">Pesanan Sudah Diterima?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="<?php echo base_url('Pesanan_saya/diterima/' . $value->id_transaksi); ?>" class="btn btn-primary">Pesanan Diterima</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Diterima -->
<?php } ?>
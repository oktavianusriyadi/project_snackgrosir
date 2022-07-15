<div class="container-fluid mt-4">
  <div class="container-fluid">
    <div class="card">
      <h5 class="card-header bg-light" text-black">Pesanan Saya</h5>
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
                  <button type="button" class="nav-link btntab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-pesanan" aria-controls="navs-top-home" aria-selected="true">
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
                <!-- Pesanan -->
                <div class="tab-pane fade show active" id="navs-top-pesanan" role="tabpanel">
                  <div class="row justify-content-center">
                    <?php foreach ($pesanan as $key => $value) {
                    } ?>
                    <?php if (empty($pesanan)) { ?>
                      <div class="row justify-content-center">
                        <div class="col-md-6">
                          <div class="card mt-5">
                            <div class="card-body">
                              <h4 class="text-center">Tidak ada Transaksi!</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } else { ?>
                      <?php foreach ($pesanan as $key => $value) { ?>
                        <div class="col-md-4">
                          <div class="card mt-2">
                            <h5 class="card-header bg-light"><?php echo $value->no_order ?>
                              <small class="float-end"><?php echo $value->tgl_order ?></small>
                            </h5>
                            <div class="card-body">
                              Expdisi
                              <div class="float-end">
                                <b class="text-uppercase">
                                  <?php echo $value->expedisi ?>
                                </b>
                                (<?php echo $value->paket ?>) <br>
                                <b>
                                  Rp <?php echo number_format($value->ongkir, 0) ?>
                                </b>
                              </div>
                            </div>
                            <div class="card-body">
                              Total Belanja
                              <div class="float-end">
                                <b>
                                  Rp <?php echo number_format($value->total_bayar, 0) ?> <br>
                                  <?php if ($value->status_bayar == 1) { ?>
                                    <span class="badge bg-warning text-uppercase">Menunggu Konfirmasi</span>
                                  <?php } ?>
                                </b>
                              </div>
                            </div>
                            <div class="card-footer">
                              <?php if ($value->status_bayar == 0) { ?>
                                <a href="<?php echo base_url('Pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-danger float-end">Bayar</a>
                              <?php } else { ?>
                                <span class="badge bg-info text-uppercase">Sudah Bayar</span>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
                <!-- //Pesanan -->

                <!-- Dikemas -->
                <div class="tab-pane fade" id="navs-top-dikemas" role="tabpanel">
                  <div class="row justify-content-center">
                    <?php foreach ($dikemas as $key => $value) {
                    } ?>
                    <?php if (empty($dikemas)) { ?>
                      <div class="row justify-content-center">
                        <div class="col-md-6">
                          <div class="card mt-5">
                            <div class="card-body">
                              <h4 class="text-center">Tidak ada Transaksi!</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } else { ?>
                      <?php foreach ($dikemas as $key => $value) { ?>
                        <div class="col-md-4">
                          <div class="card mt-2">
                            <h5 class="card-header bg-light"><?php echo $value->no_order ?>
                              <small class="float-end"><?php echo $value->tgl_order ?></small>
                            </h5>
                            <div class="card-body">
                              Expedisi
                              <div class="float-end">
                                <b class="text-uppercase">
                                  <?php echo $value->expedisi ?>
                                </b>
                                (<?php echo $value->paket ?>) <br>
                                <b>
                                  Rp <?php echo number_format($value->ongkir, 0) ?>
                                </b>
                              </div>
                            </div>
                            <div class="card-body">
                              Total Belanja
                              <div class="float-end">
                                <b>
                                  Rp <?php echo number_format($value->total_bayar, 0) ?> <br>
                                </b>
                              </div>
                            </div>
                            <div class="card-footer">
                              <span class="badge bg-warning text-uppercase float-end">Sedang Dikemas</span>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
                <!-- //Dikemas -->

                <!-- Dikirim -->
                <div class="tab-pane fade" id="navs-top-kirim" role="tabpanel">
                  <div class="row justify-content-center">
                    <?php foreach ($dikirim as $key => $value) {
                    } ?>
                    <?php if (empty($dikirim)) { ?>
                      <div class="row justify-content-center">
                        <div class="col-md-6">
                          <div class="card mt-5">
                            <div class="card-body">
                              <h4 class="text-center">Tidak ada Transaksi!</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } else { ?>
                      <?php foreach ($dikirim as $key => $value) { ?>
                        <div class="col-md-4">
                          <div class="card mt-2">
                            <h5 class="card-header bg-light"><?php echo $value->no_order ?>
                              <small class="float-end"><?php echo $value->tgl_order ?></small>
                            </h5>
                            <div class="card-body">
                              Expedisi
                              <div class="float-end">
                                <b class="text-uppercase">
                                  <?php echo $value->expedisi ?>
                                </b>
                                (<?php echo $value->paket ?>) <br>
                                <b>
                                  Rp <?php echo number_format($value->ongkir, 0) ?>
                                </b>
                              </div>
                            </div>
                            <div class="card-body">
                              Total Belanja
                              <div class="float-end">
                                <b>
                                  Rp <?php echo number_format($value->total_bayar, 0) ?> <br>
                                </b>
                              </div>
                            </div>
                            <div class="card-body">
                              Nomor Resi
                              <div class="float-end">
                                <b><?php echo $value->no_resi ?></b> <br>
                                <span class="badge bg-success text-black">Pesanan Dikirim</span>
                              </div>
                            </div>
                            <div class="card-footer">
                              <button class="btn btn-sm btn-danger float-end" data-bs-toggle="modal" data-bs-target="#diterima<?php echo $value->id_transaksi ?>">Diterima</button>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
                <!-- //Dikirim -->

                <!-- Selesai -->
                <div class="tab-pane fade" id="navs-top-selesai" role="tabpanel">
                  <div class="row justify-content-center">
                    <?php foreach ($selesai as $key => $value) {
                    } ?>
                    <?php if (empty($selesai)) { ?>
                      <div class="row justify-content-center">
                        <div class="col-md-6">
                          <div class="card mt-5">
                            <div class="card-body">
                              <h4 class="text-center">Tidak ada Transaksi!</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } else { ?>
                      <?php foreach ($selesai as $key => $value) { ?>
                        <div class="col-md-4">
                          <div class="card mt-2">
                            <h5 class="card-header bg-light"><?php echo $value->no_order ?>
                              <small class="float-end"><?php echo $value->tgl_order ?></small>
                            </h5>
                            <div class="card-body">
                              Expedisi
                              <div class="float-end">
                                <b class="text-uppercase">
                                  <?php echo $value->expedisi ?>
                                </b>
                                (<?php echo $value->paket ?>) <br>
                                <b>
                                  Rp <?php echo number_format($value->ongkir, 0) ?>
                                </b>
                              </div>
                            </div>
                            <div class="card-body">
                              Total Belanja
                              <div class="float-end">
                                <b>
                                  Rp <?php echo number_format($value->total_bayar, 0) ?> <br>
                                </b>
                              </div>
                            </div>
                            <div class="card-body">
                              Nomor Resi
                              <div class="float-end">
                                <b><?php echo $value->no_resi ?></b> <br>
                              </div>
                            </div>
                            <div class="card-footer">
                              <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#detail<?php echo $value->id_transaksi ?>">Detail Pesanan</button>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
                <!-- //Selesai -->
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

<?php foreach ($detail as $key => $value) { ?>
  <!-- Detail Transaksi -->
  <div class="modal fade" id="detail<?php echo $value->id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body shadow-rounded">
              No. Order
              <div class="float-end"><b><?php echo $value->no_order ?></b></div>
              <p></p>
              Tanggal Transaksi
              <div class="float-end"><?php echo $value->tgl_order ?></div>
            </div>
          </div>
          <div class="card mt-2">
            <div class="card-body shadow-rounded">
              <div class="card-title">Info Pengiriman</div>
              Expedisi
              <div class="float-end">
                <b class="text-uppercase"><?php echo $value->expedisi ?></b> (<?php echo $value->paket ?>)
              </div>
              <p></p>
              No. Resi
              <div class="float-end"><?php echo $value->no_resi ?></div>
              <p></p>
              Alamat
              <div class="float-end"><?php echo $value->tgl_order ?></div>
            </div>
          </div>

          <div class="card mt-2">
            <div class="card-body shadow-rounded">
              <div class="card-title">Info Pembayaran</div>
              Metode Pembayaran
              <div class="float-end"><?php echo $value->nama_bank ?></div>
              <p></p>
              <b>Total Harga</b>
              <h5 class="float-end"><b>Rp <?php echo number_format($value->total_bayar, 0) ?></b></h5>
            </div>
          </div>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <!-- End Detail Transaksi -->
<?php } ?>
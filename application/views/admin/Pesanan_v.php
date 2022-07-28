          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <?php
              if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-dark alert-dismissible mt-4" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
              }
              ?>
              <div class="card">
                <h5 class="card-header bg-primary text-white"><i class="fa fa-shopping-bag tf-icon menu-icon"></i>Pesanan</h5>
                <div class="card-body">
                  <!-- Content -->
                  <!-- Tabs -->
                  <div class="row mt-4">
                    <div class="col-md-12">
                      <div class="nav-align-top mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <button type="button" class="nav-link active btntab" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-blmbayar" aria-controls="navs-top-home" aria-selected="true">
                              Belum Bayar
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
                          <!-- Pesanan Masuk -->
                          <div class="tab-pane fade show active" id="navs-top-blmbayar" role="tabpanel">
                            <?php foreach ($pesanan_masuk as $key => $value) {
                            } ?>
                            <?php if (empty($pesanan_masuk)) { ?>
                              <div class="row justify-content-center">
                                <div class="col-md-6">
                                  <div class="card-body">
                                    <h4 class="text-center">Tidak ada Transaksi!</h4>
                                  </div>
                                </div>
                              </div>
                            <?php } else { ?>
                              <table class="table">
                                <tr>
                                  <th>No. Order</th>
                                  <th>Tanggal</th>
                                  <th>Expedisi</th>
                                  <th>Total Bayar</th>
                                  <th>Action</th>
                                </tr>
                                <?php foreach ($pesanan_masuk as $key => $value) { ?>
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
                                        <?php if ($value->status_bayar == 0) { ?>
                                          <span class="badge bg-label-danger">Belum Bayar</span>
                                        <?php } ?>
                                      </b>
                                    </td>
                                    <td>
                                      <?php if ($value->status_bayar == 1) { ?>
                                        <Button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#cek<?php echo $value->id_transaksi ?>">Bukti</Button>
                                        <a href="<?php echo base_url('admin/Pesanan/dikemas/' . $value->id_transaksi) ?>" class="btn btn-sm btn-danger">Kemas</a>
                                      <?php } ?>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </table>
                            <?php } ?>
                          </div>
                          <!-- //Pesanan Masuk -->

                          <!-- Dikemas -->
                          <div class="tab-pane fade" id="navs-top-dikemas" role="tabpanel">
                            <?php foreach ($pesanan_dikemas as $key => $value) {
                            } ?>
                            <?php if (empty($pesanan_dikemas)) { ?>
                              <div class="row justify-content-center">
                                <div class="col-md-6">
                                  <div class="card-body">
                                    <h4 class="text-center">Tidak ada Transaksi!</h4>
                                  </div>
                                </div>
                              </div>
                            <?php } else { ?>
                              <table class="table">
                                <tr>
                                  <th>No. Order</th>
                                  <th>Tanggal</th>
                                  <th>Expedisi</th>
                                  <th>Total Bayar</th>
                                  <th>Action</th>
                                </tr>
                                <?php foreach ($pesanan_dikemas as $key => $value) { ?>
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
                                      <b>
                                        Rp <?php echo number_format($value->total_bayar, 0) ?>
                                      </b>
                                    </td>
                                    <td>
                                      <?php if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#kirim<?php echo $value->id_transaksi ?>">Kirim</button>
                                      <?php } ?>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </table>
                            <?php } ?>
                          </div>
                          <!-- //Dikemas -->

                          <!-- Kirim -->
                          <div class="tab-pane fade" id="navs-top-kirim" role="tabpanel">
                            <?php foreach ($pesanan_dikirim as $key => $value) {
                            } ?>
                            <?php if (empty($pesanan_dikirim)) { ?>
                              <div class="row justify-content-center">
                                <div class="col-md-6">
                                  <div class="card-body">
                                    <h4 class="text-center">Tidak ada Transaksi!</h4>
                                  </div>
                                </div>
                              </div>
                            <?php } else { ?>
                              <table class="table">
                                <tr>
                                  <th>No. Order</th>
                                  <th>Tanggal</th>
                                  <th>Expedisi</th>
                                  <th>Total Bayar</th>
                                  <th>Nomor Resi</th>
                                </tr>
                                <?php foreach ($pesanan_dikirim as $key => $value) { ?>
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
                                      <b><?php echo $value->no_resi ?></b>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </table>
                            <?php } ?>
                          </div>
                          <!-- //Dikirim -->

                          <!-- Selesai -->
                          <div class="tab-pane fade" id="navs-top-selesai" role="tabpanel">
                            <?php foreach ($pesanan_selesai as $key => $value) {
                            } ?>
                            <?php if (empty($pesanan_selesai)) { ?>
                              <div class="row justify-content-center">
                                <div class="col-md-6">
                                  <div class="card-body">
                                    <h4 class="text-center">Tidak ada Transaksi!</h4>
                                  </div>
                                </div>
                              </div>
                            <?php } else { ?>
                              <table class="table">
                                <tr>
                                  <th>No. Order</th>
                                  <th>Tanggal</th>
                                  <th>Expedisi</th>
                                  <th>Total Bayar</th>
                                  <th>Nomor Resi</th>
                                  <th>Action</th>
                                </tr>
                                <?php foreach ($pesanan_selesai as $key => $value) { ?>
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
                                      <b><?php echo $value->no_resi ?></b><br>
                                    </td>
                                    <td>
                                      <span class="badge bg-success">Sudah Diterima</span>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </table>
                            <?php } ?>
                          </div>
                          <!-- //Selesai -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Tabs -->
                  <!-- //Content -->
                </div>
              </div>
            </div>
            <!-- / Content -->

            <?php foreach ($pesanan_masuk as $key => $value) { ?>
              <!-- Modal Bukti Bayar -->
              <div class="modal fade" id="cek<?php echo $value->id_transaksi ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel1"><?php echo $value->no_order ?></h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="card mb-3">
                        <div class="card-body">
                          <table class="table">
                            <tr>
                              <th>Nama</th>
                              <th>:</th>
                              <th><?php echo $value->atas_nama ?></th>
                            </tr>
                            <tr>
                              <th>Bank</th>
                              <th>:</th>
                              <th><?php echo $value->nama_bank ?></th>
                            </tr>
                            <tr>
                              <th>No. Rek</th>
                              <th>:</th>
                              <th><?php echo $value->no_rek ?></th>
                            </tr>
                            <tr>
                              <th>Total Bayar</th>
                              <th>:</th>
                              <th><?php echo number_format($value->total_bayar, 0) ?></th>
                            </tr>
                          </table>
                        </div>
                        <img class="card-img-bottom" src="<?php echo base_url('assets/bukti_bayar/' . $value->bukti_bayar); ?>" alt="Card image cap" />
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Tutup
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- //Modal Bukti Bayar -->
            <?php } ?>

            <?php foreach ($pesanan_dikemas as $key => $value) { ?>
              <!-- Modal Kirim -->
              <div class="modal fade" id="kirim<?php echo $value->id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->no_order ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <?php echo form_open('admin/Pesanan/kirim/' . $value->id_transaksi) ?>
                      <table class="table">
                        <tr>
                          <th>Nama Penerima</th>
                          <th>Expedisi</th>
                        </tr>
                        <tr>
                          <td><?php echo $value->nama_penerima ?></td>
                          <td>
                            <b class="text-uppercase"><?php echo $value->expedisi ?></b> (<?php echo $value->paket ?>)<br>
                            Rp <?php echo number_format($value->ongkir, 0) ?>
                          </td>
                        </tr>
                      </table>
                      <input name="no_resi" class="form-control" placeholder="Nomor Resi" required>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
              <!-- End Modal Kirim -->
            <?php } ?>